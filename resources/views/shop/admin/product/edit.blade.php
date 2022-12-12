@extends('../../../dashboard')

@section('title') Edit product @endsection

@section('content')
<h1>Edit product</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('product.index') }}">Back</x-my.a.primary>
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
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $product->name_en }}@endif" class="form-control" placeholder="product name_en">
                @error('name_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_ru:</strong>
                <textarea class="form-control" id="description_ru" name="description_ru" rows="3">@if(null !== old('description_ru')){{ old('description_ru') }}@else{{ $product->description_ru }}@endif</textarea>
                @error('description_ru')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_en:</strong>
                <textarea class="form-control" id="description_en" name="description_en" rows="3">@if(null !== old('description_en')){{ old('description_en') }}@else{{ $product->description_en }}@endif</textarea>
                @error('description_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            @php
                if (null !== old('category_id')) {
                    $oldValue = old('category_id');
                } else {
                    $oldValue = $product->category_id;
                }
            @endphp
            <x-my.form.select :oldSelected="$oldValue" :options="$categories" id="category_id" name="category_id"/>
            @error('category_id')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <div class="mb-3">
            <label for="property_id" class="form-label">Property</label>
            @php
                if (null !== old('property_id')) {
                    $oldValue = old('property_id');
                } else {
                    $oldValue = $product->properties->map->id->toArray();
                }
            @endphp
            <x-my.form.select :oldSelected="$oldValue" :options="$properties" id="property_id" name="property_id[]" multiple size="5"/>
            @error('property_id')
            <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product image:</strong>
                <input multiple="multiple" name="image[]" type="file" class="form-control">
                @error('image')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection