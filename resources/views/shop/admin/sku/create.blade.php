@extends('../../../dashboard')

@section('title') Add sku @endsection

@section('content')
<h1>Add sku</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('sku.index') }}"> Back</a>
</div>
<form action="{{ route('sku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku price:</strong>
                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="sku price">
                @error('price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sku count:</strong>
                <input type="text" name="count" value="{{ old('count') }}" class="form-control" placeholder="sku count">
                @error('count')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">product</label>
            <select name="product_id" class="form-select" id="product_id">
                @foreach ($products as $product)
                <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                    {{ $product->id }} - {{ $product->name_ru }}/{{ $product->name_en }}
                </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection