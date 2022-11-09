@extends('../../../welcome')

@section('title') Edit currency @endsection

@section('content')
<h1>Edit currency</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('currency.index') }}"> Back</a>
</div>
<form action="{{ route('currency.update', $currency->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency code:</strong>
                <input type="text" name="code" value="@if(null !== old('code')){{ old('code') }}@else{{ $currency->code }}@endif" class="form-control" placeholder="currency code">
                @error('code')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency rate:</strong>
                <input type="text" name="rate" value="@if(null !== old('rate')){{ old('rate') }}@else{{ $currency->rate }}@endif" class="form-control" placeholder="currency rate">
                @error('rate')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection