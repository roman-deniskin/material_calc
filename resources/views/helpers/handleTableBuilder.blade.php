<pre>
<?php
var_dump($data);
?>
</pre>
@section('handleTableBuilder')
<table class="table table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>Наименование</th>
        <th>Список используемых материалов</th>
        <th>Наценка</th>
        <th>Цена</th>
        <th>Добавлена</th>
        <th>Изменена</th>
        <th>Изменить</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $detailData)
        <tr>
            <td>{{ $detailData->material_id }}</td>
            <td>{{ $detailData->detail_id }}</td>
            <td>{{ $detailData->amount }}</td>
            <td>{{ $detailData->detailName }}</td>
            <td>{{ $detailData->extraCharge }}</td>
            <td>{{ $detailData->price }}</td>
            <td>{{ $detailData->materialName }}</td>
            <td>{{ $detailData->unit }}</td>
            <td>{{ $detailData->unitAlias }}</td>
            <td>{{ $detailData->unitWeight }}</td>
            <td>{{ $detailData->unitPrice }}</td>
            <td><button type="button" class="btn btn-primary btn-xs"><i class="fas fa-exchange-alt"></i></button></td>
            <td><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
