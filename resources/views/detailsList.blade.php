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
                            $details = [];
                            foreach ($data as $detailData) {
                                $details[$i]['detailId'] = $detailData->detail_id;
                                $details[$i]['detailName'] = $detailData->detailName;
                                @$details[$i]['materials'] .= '<a href="/material?id=' . $detailData->material_id . '">' . $detailData->materialName . '</a><br>';// Множ
                                @$details[$i]['amount'] .= '<p>' . $detailData->amount . '</p>'; //Множ
                                @$details[$i]['unit'] .= '<p>' . $detailData->unit . '(' . $detailData->unitAlias . ')</p><br>'; // Множ
                                $details[$i]['extraCharge'] = $detailData->extraCharge;
                                $details[$i]['price'] = $detailData->price;
                                @$details[$i]['unitWeight'] .= '<p>' . $detailData->unitWeight . '</p>'; // Множ
                                @$details[$i]['unitPrice'] .= '<p>' . $detailData->unitPrice . '</p>'; // Множ
                                if ($previousDetailId != $detailData->detail_id && $previousDetailId != null) {
                                    $i++;
                                    $previousDetailId = $detailData->detail_id;
                                }
                            }
                            ?>
                            @foreach ($details as $detailData)
                                <tr>
                                    <td>{{ $detailData['detailId'] }}</td>
                                    <td><a href="/material?{{ $detailData['detailId'] }}">{{ $detailData['detailName'] }}</a></td>
                                    <td>{!! $detailData['materials'] !!}</td>
                                    <td>{!! $detailData['amount'] !!}</td>
                                    <td>{!! $detailData['unit'] !!}</td>
                                    <td>{{ $detailData['extraCharge'] }}</td>
                                    <td>{{ $detailData['price'] }}</td>
                                    <td>{!! $detailData['unitWeight'] !!}</td>
                                    <td>{!! $detailData['unitPrice'] !!}</td>
                                    <td><button type="button" class="btn btn-primary btn-xs"><i class="fas fa-exchange-alt"></i></button></td>
                                    <td><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button></td>
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
