<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

// إنشاء وحفظ إعلان جديد
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// لوحة التحكم
Route::get('/products/dashboard', [ProductController::class, 'dashboard'])->name('products.dashboard');

// تصفية وبحث
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

// عرض الإعلانات حسب الحالة
Route::get('/products/expired', [ProductController::class, 'expired'])->name('products.expired'); // المنتهية
Route::get('/products/near-expiry', [ProductController::class, 'nearExpiry'])->name('products.near'); // المقتربة
Route::get('/products/all', [ProductController::class, 'all'])->name('products.all'); // الكل

// تحميل Excel حسب النوع
Route::get('/products/export/{type}', [ProductController::class, 'export'])->name('products.export');