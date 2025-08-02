@extends('layout')

@section('content')
<h2 class="mb-4 text-center">كل الإعلانات</h2>

<!-- نموذج البحث -->
<form method="GET" action="{{ route('products.all') }}" class="mb-4 d-flex gap-2 justify-content-center">
    <input type="text" name="owner" value="{{ request('owner') }}" class="form-control" placeholder="بحث باسم صاحب الإعلان" style="max-width: 250px;">
    <input type="text" name="license_number" value="{{ request('license_number') }}" class="form-control" placeholder="بحث برقم الرخصة" style="max-width: 250px;">
    <button type="submit" class="btn btn-primary">بحث</button>
    <a href="{{ route('products.all') }}" class="btn btn-secondary">إلغاء</a>
</form>

<table class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>صاحب الإعلان</th>
            <th>نوع الإعلان</th>
            <th>رقم الرخصة</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->owner }}</td>
                <td>{{ $product->type }}</td>
                <td>{{ $product->license_number }}</td>
                <td>{{ $product->start_date }}</td>
                <td>{{ $product->end_date }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">لا توجد بيانات حالياً</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
