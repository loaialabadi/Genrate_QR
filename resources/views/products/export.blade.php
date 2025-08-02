<table>
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
        @foreach($products as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->owner }}</td>
            <td>{{ $p->type }}</td>
            <td>{{ $p->license_number }}</td>
            <td>{{ $p->start_date }}</td>
            <td>{{ $p->end_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
