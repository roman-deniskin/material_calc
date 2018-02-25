@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Материалы</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Наименование</th>
                                <th>Единица измерения</th>
                                <th>Цена за единицу</th>
                                <th>Добавлено</th>
                                <th>Последнее изменение</th>
                                <th>Изменить</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($materials as $material)
                                <tr>
                                    <td>{{ $material->id }}</td>
                                    <td>{{ $material->name }}</td>
                                    <td>{{ $material->unit }}</td>
                                    <td>{{ $material->unitPrice }}</td>
                                    <td>{{ $material->created_at }}</td>
                                    <td>{{ $material->updated_at }}</td>
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
