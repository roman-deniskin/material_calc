@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Заполнение производственными данными</div>

                <div class="card-body row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('material_post') }}">
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">Вес</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ширина</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('width') ? ' is-invalid' : '' }}" name="width" value="{{ old('width') }}" required autofocus>

                                    @if ($errors->has('width'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('width') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Высота</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" required autofocus>

                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Толщина</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('depth') ? ' is-invalid' : '' }}" name="depth" value="{{ old('depth') }}" required autofocus>

                                    @if ($errors->has('depth'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('depth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Тип</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Материал</label>

                                <div class="col-md-8">
                                    <select class="form-control" name="material" id="">
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }} - {{ $material->unitPrice }} руб. за {{ $material->unit }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('unit'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Деталь</label>

                                <div class="col-md-8">
                                    <select class="form-control" name="material" id="">
                                        @foreach ($details as $detail)
                                            <option value="{{ $detail->id }}">{{ $detail->name }} - {{ $detail->ammount }} шт.</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('unit'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Себестоимость</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="priceCost" value="0 руб." disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Цена</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="price" value="0 руб." disabled>
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
                        <form method="POST" action="{{ route('material_post') }}">
                            @csrf
                            <h3>Добавить деталь</h3>
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

                            <fieldset class="material">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Материал</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="material[1]" id="">
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">{{ $material->name }} - {{ $material->unitPrice }} руб. за {{ $material->unit }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('unit[1]'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unit[1]') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-2 btn-combined-group">
                                        <input type="text" value="1" class="form-control{{ $errors->has('unitAmmount[1]') ? ' is-invalid' : '' }} btn-combined-elem" name="unitAmmount[1]" value="{{ old('unitAmmount[1]') }}" required>

                                        @if ($errors->has('unitAmmount[1]'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unitAmmount[1]') }}</strong>
                                        </span>
                                        @endif
                                        <button type="button" class="btn btn-success btn-combined">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Наценка в %</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('markup') ? ' is-invalid' : '' }}" name="name" value="{{ old('markup') }}" required autofocus>

                                    @if ($errors->has('markup'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('markup') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Цена</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="name" value="{{ old('price') }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить
                                    </button>
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-cube"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                        <div class="col-md-6">
                            <form method="POST" action="{{ route('material_post') }}">
                                @csrf
                                <h3>Добавить материал</h3>
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
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Единица измерения</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unit" value="{{ old('unit') }}" required autofocus>

                                        @if ($errors->has('unit'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('unit') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Цена за единицу</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unitPrice" value="{{ old('unitPrice') }}" required autofocus>

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
