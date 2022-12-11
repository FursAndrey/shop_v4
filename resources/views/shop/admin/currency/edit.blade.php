@extends('../../../dashboard')

@section('title') Edit currency @endsection

@section('content')
<h1>Edit currency</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('currency.index') }}">Back</x-my.a.primary>
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
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency rate:</strong>
                <input type="text" name="rate" value="@if(null !== old('rate')){{ old('rate') }}@else{{ $currency->rate }}@endif" class="form-control" placeholder="currency rate">
                @error('rate')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection