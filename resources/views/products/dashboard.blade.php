@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">لوحة تحكم الإعلانات</h2>
    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>صاحب الإعلان</th>
                <th>نوع الإعلان</th>
                <th>رقم الرخصة</th>
                <th>بداية الرخصة</th>
                <th>انتهاء الرخصة</th>
                <th>QR كود</th>
                <th>التحكم</th>
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
                <td>
                    @if($product->qr_code)
                        <img src="{{ asset('storage/' . $product->qr_code) }}" alt="QR Code" width="80" />
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    @if($product->qr_code)
                        <a href="{{ asset('storage/' . $product->qr_code) }}" target="_blank" class="btn btn-primary btn-sm mb-1">عرض</a><br>
                        <button onclick="printImage('{{ asset('storage/' . $product->qr_code) }}')" class="btn btn-success btn-sm">طباعة</button>
                    @else
                        لا توجد صورة
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">لا توجد بيانات حالياً</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
function printImage(imageUrl) {
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html lang="ar" dir="rtl">
            <head>
                <meta charset="UTF-8" />
                <title>طباعة QR Code بحجم A4</title>
                <style>
                    @page {
                        size: A4 portrait;
                        margin: 20mm;
                    }
                    body {
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 297mm;
                        width: 210mm;
                    }
                    img {
                        max-width: 180mm;
                        max-height: 180mm;
                        width: auto;
                        height: auto;
                        image-rendering: crisp-edges;
                    }
                </style>
            </head>
            <body>
                <img src="${imageUrl}" alt="QR Code" />
                <script>
                    window.onload = function() {
                        window.print();
                        window.onafterprint = function() {
                            window.close();
                        }
                    };
                <\/script>
            </body>
        </html>
    `);
    printWindow.document.close();
}
</script>
@endsection
