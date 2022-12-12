@extends('../../../dashboard')

@section('title') Edit sku @endsection

@section('content')
<h1>Edit sku</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('sku.index') }}">Back</x-my.a.primary>
</div>
<form action="{{ route('sku.update', $sku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku price:</strong>
                <input type="text" name="price" value="@if(null !== old('price')){{ old('price') }}@else{{ $sku->price }}@endif" class="form-control" placeholder="sku price">
                @error('price')
                    <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku count:</strong>
                <input type="text" name="count" value="@if(null !== old('count')){{ old('count') }}@else{{ $sku->count }}@endif" class="form-control" placeholder="sku count">
                @error('count')
                    <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">product</label>
            @php
                if (null !== old('product_id')) {
                    $oldValue = old('product_id');
                } else {
                    $oldValue = $sku->product_id;
                }
            @endphp
            <x-my.form.select :oldSelected="$oldValue" :options="$products" id="product_id" name="product_id"/>
            @error('product_id')
                <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        @foreach ($sku->product->properties as $property)
            <div class="mb-3">
                <label for="option_id" class="form-label">property {{ $property->name }}</label>
                @php
                    if (null !== old('option_id')) {
                        $oldValue = old('option_id');
                    } else {
                        $oldValue = $sku->options->map->id->toArray();
                    }
                @endphp
                <x-my.form.select :oldSelected="$oldValue" :options="$property->options" id="option_id" name="option_id[]"/>
                @error('option_id')
                    <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        @endforeach
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection