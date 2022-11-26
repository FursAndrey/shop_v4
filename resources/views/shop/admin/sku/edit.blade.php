@extends('../../../dashboard')

@section('title') Edit sku @endsection

@section('content')
<h1>Edit sku</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('sku.index') }}"> Back</a>
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
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku count:</strong>
                <input type="text" name="count" value="@if(null !== old('count')){{ old('count') }}@else{{ $sku->count }}@endif" class="form-control" placeholder="sku count">
                @error('count')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">product</label>
            <select name="product_id" class="form-select" id="product_id">
                @foreach ($products as $product)
                <option value="{{ $product->id }}" @if(null !== old('product_id')) @selected(old('product_id') == $product->id) @else @selected($sku->product_id == $product->id) @endif>
                    {{ $product->id }} - {{ $product->name }}
                </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @php
            $sku_options = $sku->options->map->id->toArray();
        @endphp
        @foreach ($sku->product->properties as $property)
            <div class="mb-3">
                <label for="option_id" class="form-label">property {{ $property->name }}</label>
                <select name="option_id[]" class="form-select" id="option_id">
                    @foreach ($property->options as $option)
                        <option value="{{ $option->id }}" @if(null !== old('option_id')) @selected(old('option_id') == $option->id) @else @selected(in_array($option->id, $sku_options)) @endif>
                            {{ $option->name }}
                        </option>
                    @endforeach
                </select>
                @error('option_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection