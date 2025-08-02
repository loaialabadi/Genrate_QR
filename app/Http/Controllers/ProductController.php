<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    /**
     * عرض صفحة إنشاء إعلان جديد
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * عرض لوحة التحكم مع جميع الإعلانات
     */
    public function dashboard()
    {
        $products = Product::all();
        return view('products.dashboard', compact('products'));
    }

    /**
     * حفظ إعلان جديد مع توليد QR Code وحفظه
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner' => 'required|string',
            'type' => 'required|string',
            'size' => 'required|string',
            'license_number' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'coordinates' => 'required|string',
        ]);

        // إعداد نص الـ QR Code
        $qrText = "صاحب الإعلان: {$request->owner}\n"
                . "نوع الإعلان: {$request->type}\n"
                . "المقاسات: {$request->size}\n"
                . "رقم الرخصة: {$request->license_number}\n"
                . "تاريخ البداية: {$request->start_date}\n"
                . "تاريخ النهاية: {$request->end_date}\n"
                . "الإحداثيات: {$request->coordinates}";

        // إعداد اسم ملف نظيف وآمن
        $name = trim($request->owner);
        $name = preg_replace('/\s+/', '_', $name);
        $name = preg_replace('/[^\p{L}\p{N}_-]/u', '', $name);
        $name = trim($name, '_-');

        $filename = 'qrcodes/' . $name . '_' . time() . '.png';

        // توليد صورة QR Code وتخزينها
        $qrImage = QrCode::encoding('UTF-8')
                        ->format('png')
                        ->size(800)
                        ->generate($qrText);

        Storage::disk('public')->put($filename, $qrImage);

        // حفظ البيانات في قاعدة البيانات
        Product::create([
            'owner' => $request->owner,
            'type' => $request->type,
            'size' => $request->size,
            'license_number' => $request->license_number,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coordinates' => $request->coordinates,
            'qr_code' => $filename,
        ]);

        return redirect()->route('products.dashboard')->with('success', 'تم إضافة المنتج بنجاح!');
    }

    /**
     * تصدير الإعلانات إلى ملف Excel حسب النوع (قريب الانتهاء، منتهي، أو الكل)
     */
    public function export($type)
    {
        $filename = match ($type) {
            'near' => 'قرب_انتهاء_الاعلانات.xlsx',
            'expired' => 'الاعلانات_المنتهية.xlsx',
            'all' => 'كل_الاعلانات.xlsx',
            default => 'الاعلانات.xlsx',
        };

        return Excel::download(new ProductsExport($type), $filename);
    }

    /**
     * عرض الإعلانات المنتهية (تاريخ الانتهاء أقل من اليوم)
     */
    public function expired()
    {
        $products = Product::where('end_date', '<', now())
                           ->orderByDesc('end_date')
                           ->get();

        return view('products.expired', compact('products'));
    }

    /**
     * عرض الإعلانات التي ستنتهي خلال 7 أيام من اليوم
     */
    public function nearExpiry()
    {
        $products = Product::whereBetween('end_date', [now(), now()->copy()->addDays(7)])
                           ->orderBy('end_date')
                           ->get();

        return view('products.near_expiry', compact('products'));
    }

    /**
     * عرض كل الإعلانات مع إمكانية البحث بالاسم أو رقم الرخصة
     */
    public function all(Request $request)
    {
        $query = Product::query();

        if ($request->filled('owner')) {
            $query->where('owner', 'like', '%' . $request->owner . '%');
        }

        if ($request->filled('license_number')) {
            $query->where('license_number', 'like', '%' . $request->license_number . '%');
        }

        $products = $query->orderByDesc('id')->get();

        return view('products.all', compact('products'));
    }




    public function viewQr(Product $product)
{
    return view('products.qr_view', compact('product'));
}

}
