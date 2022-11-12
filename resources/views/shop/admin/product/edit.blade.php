@extends('../../../welcome')

@section('title') Edit product @endsection

@section('content')
<h1>Edit product</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>
<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product name_ru:</strong>
                <input type="text" name="name_ru" value="@if(null !== old('name_ru')){{ old('name_ru') }}@else{{ $product->name_ru }}@endif" class="form-control" placeholder="product name_ru">
                @error('name_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $product->name_en }}@endif" class="form-control" placeholder="product name_en">
                @error('name_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_ru:</strong>
                <textarea class="form-control" id="description_ru" name="description_ru" rows="3">@if(null !== old('description_ru')){{ old('description_ru') }}@else{{ $product->description_ru }}@endif</textarea>
                @error('description_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_en:</strong>
                <textarea class="form-control" id="description_en" name="description_en" rows="3">@if(null !== old('description_en')){{ old('description_en') }}@else{{ $product->description_en }}@endif</textarea>
                @error('description_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" class="form-select" id="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(null !== old('category_id')) @selected(old('category_id') == $category->id) @else @selected($product->category_id == $category->id) @endif>
                    {{ $category->id }} - {{ $category->name_ru }}/{{ $category->name_en }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="property_id" class="form-label">Property</label>
            @php
                $product_properties = $product->properties->map->id->toArray();
            @endphp
            <select name="property_id[]" class="form-select" id="property_id" multiple size="5">
                @foreach ($properties as $property)
                <option value="{{ $property->id }}" @if(null !== old('property_id')) @selected(old('property_id') == $property->id) @else @selected(in_array($property->id, $product_properties)) @endif>
                    {{ $property->id }} - {{ $property->name_ru }}/{{ $property->name_en }}
                </option>
                @endforeach
            </select>
            @error('property_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product image:</strong>
                <input multiple="multiple" name="image[]" type="file" class="form-control">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection