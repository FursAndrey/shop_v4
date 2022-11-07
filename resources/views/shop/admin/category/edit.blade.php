@extends('../../../welcome')

@section('title') Edit category @endsection

@section('content')
<h1>Edit category</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
</div>
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category name_ru:</strong>
                <input type="text" name="name_ru" value="{{ $category->name_ru }}" class="form-control" placeholder="category name_ru">
                @error('name_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category name_en:</strong>
                <input type="text" name="name_en" value="{{ $category->name_en }}" class="form-control" placeholder="category name_en">
                @error('name_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection