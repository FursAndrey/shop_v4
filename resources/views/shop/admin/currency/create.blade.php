@extends('../../../dashboard')

@section('title') Add currency @endsection

@section('content')
<h1>Add currency</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('currency.index') }}"> Back</a>
</div>
<form action="{{ route('currency.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency code:</strong>
                <input type="text" name="code" value="{{ old('name_ru') }}" class="form-control" placeholder="currency code">
                @error('code')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency rate:</strong>
                <input type="text" name="rate" value="{{ old('rate') }}" class="form-control" placeholder="currency rate">
                @error('rate')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection