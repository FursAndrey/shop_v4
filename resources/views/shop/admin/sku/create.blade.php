@extends('../../../dashboard')

@section('title') Add sku @endsection

@section('content')
<h1>Add sku</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('sku.index') }}">Back</x-my.a.primary>
</div>
<form action="{{ route('sku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku price:</strong>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="sku price">
                @error('price')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku count:</strong>
                <input type="text" name="count" value="{{ old('count') }}" class="form-control" placeholder="sku count">
                @error('count')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">product</label>
            <x-my.form.select :options="$products" :oldSelected="old('product_id')" id="product_id" name="product_id"/>
            @error('product_id')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection