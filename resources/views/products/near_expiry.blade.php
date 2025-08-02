@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4 text-danger">الإعلانات المقتربة من تاريخ الانتهاء (خلال 7 أيام)</h2>

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
            <tr style="background-color: #f8d7da;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->owner }}</td>
                <td>{{ $p->type }}</td>
                <td>{{ $p->license_number }}</td>
                <td><strong class="text-danger">{{ $p->end_date }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-success">لا توجد إعلانات على وشك الانتهاء.</div>
    @endif
</div>
<a href="{{ route('products.export', 'near') }}" class="btn btn-success mb-3">تحميل كـ Excel</a>

@endsection
