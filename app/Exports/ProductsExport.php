<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ProductsExport implements FromCollection, WithHeadings
{
    protected $type;

    public function __construct($type = 'all')
    {
        $this->type = $type;
    }

    public function collection()
    {
        $today = Carbon::today();

        return match ($this->type) {
            'near' => Product::whereBetween('end_date', [$today, $today->copy()->addDays(7)])->get(),
            'expired' => Product::where('end_date', '<', $today)->get(),
            default => Product::all()
        };
    }

    public function headings(): array
    {
        return ['#', 'صاحب الإعلان', 'نوع الإعلان', 'رقم الرخصة', 'تاريخ البداية', 'تاريخ النهاية'];
    }
}
