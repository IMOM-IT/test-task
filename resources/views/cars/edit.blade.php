<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Laravel 8 Datatable CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cars.index') }}"
                   enctype="multipart/form-data"> {{__('messages.back')}}</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('car.update',$car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('messages.car_brand')}}:</strong>
                    <input type="text" value="{{$car->car_brand}}" name="car_brand" class="form-control">
                    @error('car_brand')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('messages.car_model')}}:</strong>
                    <input type="text" name="car_model" value="{{$car->car_model}}" class="form-control">
                    @error('car_model')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('messages.number')}}:</strong>
                    <input type="text" name="number" value="{{$car->number}}" class="form-control"
                           placeholder="A 007 AA | 197">
                    @error('number')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('messages.color')}}:</strong>
                    <input type="color" name="color" value="{{$car->color}}" class="form-control">
                    @error('color')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <strong>{{__('messages.is_paid')}}:</strong>
                <input type="checkbox" onchange="ChangeText()" value="{{$car->is_paid}}" id="is_paid" name="is_paid"
                       class="form-control">
                <span id="text">{{app()->getLocale()==='ru' ? 'Не оплачено' : 'Not paid'}}</span>
                @error('is_paid')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{__('messages.comment')}}:</strong>
                    <input type='text' name="comment" value="{{$car->comment}}" class="form-control">
                    @error('comment')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">{{__('messages.submit')}}</button>
        </div>
    </form>
</div>
<script>
    function ChangeText() {
        if ($('#is_paid').is(':checked')) {
            $('#text').html('{{app()->getLocale()==='ru' ? 'Оплачено' : 'Paid'}}');
            $("#is_paid").attr('value', '1');
        } else {
            $('#text').html('{{app()->getLocale()==='ru' ? 'Нe оплачено' : 'Not paid'}}');
            $("#is_paid").attr('value', '0');
        }
    }</script>
</body>
</html>
