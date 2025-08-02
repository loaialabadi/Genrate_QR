@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4 text-secondary">الإعلانات المنتهية</h2>

    @if($products->count())
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>صاحب الإعلان</th>
                <th>نوع الإعلان</th>
                <th>رقم الرخصة</th>
                <th>تاريخ الانتهاء</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr class="table-secondary">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->owner }}</td>
                <td>{{ $p->type }}</td>
                <td>{{ $p->license_number }}</td>
                <td><strong>{{ $p->end_date }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-success">لا توجد إعلانات منتهية حالياً.</div>
    @endif
</div>
<a href="{{ route('products.export', 'expired') }}" class="btn btn-success mb-3">تحميل كـ Excel</a>
@endsection
