@extends('../../../welcome')

@section('title') Add product @endsection

@section('content')
<h1>Add product</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product name_ru:</strong>
                <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control" placeholder="product name_ru">
                @error('name_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product name_en:</strong>
                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="product name_en">
                @error('name_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_ru:</strong>
                <textarea class="form-control" id="description_ru" name="description_ru" rows="3">{{ old('description_ru') }}</textarea>
                @error('description_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>product description_en:</strong>
                <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en') }}</textarea>
                @error('description_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" class="form-select" id="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                    {{ $category->id }} - {{ $category->name_ru }}/{{ $category->name_en }}
                </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection