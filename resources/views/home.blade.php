@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Заполнение производственными данными</div>

                <div class="card-body row">
                    <div class="col-md-6">
                        <form method="POST" class="product-form" action="{{ route('material_post') }}">
                            @csrf
                            <h3>Добавить продукт</h3>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Наименование</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">Вес</label>

                                <div class="col-md-8">
                                    <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="width" class="col-md-4 col-form-label text-md-right">Ширина</label>

                                <div class="col-md-8">
                                    <input id="width" type="text" class="form-control{{ $errors->has('width') ? ' is-invalid' : '' }}" name="width" value="{{ old('width') }}" required autofocus>

                                    @if ($errors->has('width'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('width') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">Высота</label>

                                <div class="col-md-8">
                                    <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required autofocus>

                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="depth" class="col-md-4 col-form-label text-md-right">Толщина</label>

                                <div class="col-md-8">
                                    <input id="depth" type="text" class="form-control{{ $errors->has('depth') ? ' is-invalid' : '' }}" name="depth" value="{{ old('depth') }}" required autofocus>

                                    @if ($errors->has('depth'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('depth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Тип</label>

                                <div class="col-md-8">
                                    <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="material-product" class="col-md-4 col-form-label text-md-right">Материал</label>

                                <div class="col-md-8">
                                    <select class="form-control" name="material" id="material-product">
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }} - {{ $material->unitPrice }} руб. за {{ $material->unit }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('material-product'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('material-product') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="detail-product" class="col-md-4 col-form-label text-md-right">Деталь</label>

                                <div class="col-md-8">
                                    <select class="form-control" name="material" id="detail-product">
                                        @foreach ($details as $detail)
                                            <option value="{{ $detail->id }}">{{ $detail->name }} - {{ $detail->ammount }} шт.</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('detail-product'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priceCostProduct" class="col-md-4 col-form-label text-md-right">Себестоимость</label>

                                <div class="col-md-8">
                                    <input id="priceCostProduct" type="text" class="form-control" name="priceCost" value="0 руб." disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Цена</label>

                                <div class="col-md-8">
                                    <input id="price" type="text" class="form-control" name="price" value="0 руб." disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" class="detail-form" action="{{ route('detail_post') }}">
                            @csrf
                            <h3>Добавить деталь</h3>
                            <div class="form-group row">
                                <label for="detailName" class="col-md-4 col-form-label text-md-right">Наименование</label>

                                <div class="col-md-8">
                                    <input id="detailName" type="text" class="form-control{{ $errors->has('detailName') ? ' is-invalid' : '' }}" name="detailName" value="{{ old('detailName') }}" required autofocus>

                                    @if ($errors->has('detailName'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('detailName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <fieldset class="material">
                                <div class="form-group row detail-wrapper elem1">
                                    <label for="material-detail" class="col-md-4 col-form-label text-md-right">Материал</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="materialDetailId[]" id="material-detail">
                                            @foreach ($materials as $material)
                                                <option data-weight="{{ $material->unitWeight }}" value="{{ $material->id }}">{{ $material->name }} - {{ $material->unitPrice }} руб. за {{ $material->unit }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('materialDetail[]'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('materialDetail[]') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-2 btn-combined-group">
                                        <input id="materialAmount" type="text" value="1" class="form-control{{ $errors->has('materialDetailAmount[]') ? ' is-invalid' : '' }} btn-combined-elem" name="materialDetailAmount[]" value="{{ old('materialDetailAmount[]') }}" required>

                                        @if ($errors->has('materialDetailAmount[]'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('materialDetailAmount[]') }}</strong>
                                        </span>
                                        @endif
                                        <button onclick="Form.remoteMaterial(this);" type="button" class="btn btn-success btn-combined">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <label for="extraCharge" class="col-md-4 col-form-label text-md-right">Наценка в %</label>

                                <div class="col-md-8">
                                    <input id="extraCharge" type="text" class="form-control{{ $errors->has('extraCharge') ? ' is-invalid' : '' }}" name="extraCharge" value="{{ old('extraCharge') }}" required autofocus>

                                    @if ($errors->has('extraCharge'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('extraCharge') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">Вес</label>

                                <div class="col-md-8">
                                    <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priceCostDetail" class="col-md-4 col-form-label text-md-right">Себестоимость</label>

                                <div class="col-md-8">
                                    <input id="priceCostDetail" type="text" class="form-control{{ $errors->has('priceCostDetail') ? ' is-invalid' : '' }}" name="priceCostDetail" value="{{ old('priceCostDetail') }}" required autofocus>

                                    @if ($errors->has('priceCostDetail'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('priceCostDetail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priceDetail" class="col-md-4 col-form-label text-md-right">Цена</label>

                                <div class="col-md-8">
                                    <input id="priceDetail" type="text" class="form-control" name="priceDetail" value="700" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить
                                    </button>
                                    <button onclick="Form.addDetailFieldset(this)" type="button" class="btn btn-success">
                                        <i class="fas fa-cube"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form method="POST" class="material-form" action="{{ route('material_post') }}">
                            @csrf
                            <h3>Добавить материал</h3>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Наименование</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit" class="col-md-4 col-form-label text-md-right">Единица измерения</label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i rel="tooltip" data-placement="left" data-toggle="unit" title="Полное наименование. Например: килограмм" class="fas fa-info-circle"></i></div>
                                        </div>
                                        <input id="name" type="text" class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" value="{{ old('unit') }}" required autofocus>
                                    </div>

                                    @if ($errors->has('unit'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unitAlias" class="col-md-4 col-form-label text-md-right">Краткое обозначение</label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i rel="tooltip" data-placement="left" data-toggle="aliasUnitName" title="Например: кг" class="fas fa-info-circle"></i></div>
                                        </div>
                                        <input id="name" type="text" class="form-control{{ $errors->has('unitAlias') ? ' is-invalid' : '' }}" name="unitAlias" value="{{ old('unitAlias') }}" required autofocus>
                                    </div>

                                    @if ($errors->has('unitAlias'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unitAlias') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unitWeight" class="col-md-4 col-form-label text-md-right">Вес на единицу</label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i rel="tooltip" data-placement="left" data-toggle="unitWeight" title="Вес в килограммах на еденицу измерения" class="fas fa-info-circle"></i></div>
                                        </div>
                                        <input id="weightUnit" type="text" class="form-control{{ $errors->has('unitWeight') ? ' is-invalid' : '' }}" name="unitWeight" value="{{ old('unitWeight') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('unitWeight'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unitWeight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unitPrice" class="col-md-4 col-form-label text-md-right">Цена за единицу</label>

                                <div class="col-md-8">
                                    <input id="unitPrice" type="text" class="form-control{{ $errors->has('unitPrice') ? ' is-invalid' : '' }}" name="unitPrice" value="{{ old('unitPrice') }}" required autofocus>

                                    @if ($errors->has('unitPrice'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unitPrice') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
