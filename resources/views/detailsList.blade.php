@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Детали</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Наименование</th>
                                <th>Список используемых материалов</th>
                                <th>Количество материалов</th>
                                <th>Единицы измерения</th>
                                <th>Наценка</th>
                                <th>Цена</th>
                                <th>Вес</th>
                                <th>Цена за единицу</th>
                                <th>Изменить</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $previousDetailId = null;
                                    $i = 0;
                                    foreach ($data as $detailData) {
                                        $details->detailId = $detailData->detail_id;
                                        $details->detailName = $detailData->detailName;
                                        $details->materials .= '<a href="/material?id=' . $detailData->material_id . '">' . $detailData->materialName . '</a><br>';
                                        $details->amount .= $detailData->amount;
                                        $details->unit .= '<p>' . $detailData->unit . '(' . $detailData->unitAlias . ')</p><br>';
                                        $details->extraCharge .= $detailData->extraCharge;
                                        $details->price .= $detailData->price;
                                        $details->unitWeight .= $detailData->unitWeight;
                                        $details->unitPrice .= $detailData->unitPrice;
                                        $i++;
                                    }
                            ?>
                            {{ $previousDetailId = null }}
                            @foreach ($data as $detailData)
                                @if (@$previousDetailId != $detailData->detail_id)
                                    $detailId =. $detailData->detail_id;
                                    $detailName =. $detailData->detailName;
                                    $materials =. '<td><a href="/material?id=' . $detailData->material_id . '">' . $detailData->materialName . '</a></td>';
                                    $materialId =. $detailData->materialName;
                                    $amount =. $detailData->amount;
                                    $unit =. $detailData->unit;
                                    $unitAlias =. $detailData->unitAlias;
                                @else
                                @endif
                                <tr>
                                    @if (@$previousDetailId != $detailData->detail_id)
                                    <td>{{ $detailData->detail_id }}</td>
                                    <td><a href="/material?{{ $detailData->detail_id }}">{{ $detailData->detailName }}</a></td>
                                    <td><a href="/material?{{ $detailData->material_id }}">{{ $detailData->materialName }}</a></td>
                                    <td> {{ $detailData->amount }} </td>
                                    <td>{{ $detailData->unit }} ({{ $detailData->unitAlias }})</td>
                                    @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @endif
                                    <td>{{ $detailData->extraCharge }}</td>
                                    <td>{{ $detailData->price }}</td>
                                    <td>{{ $detailData->unitWeight }}</td>
                                    <td>{{ $detailData->unitPrice }}</td>
                                    <td><button type="button" class="btn btn-primary btn-xs"><i class="fas fa-exchange-alt"></i></button></td>
                                    <td><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button></td>
                                    {{ $previousDetailId = $detailData->detail_id }}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
