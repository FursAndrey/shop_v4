@extends('../../../welcome')

@section('title') Edit property @endsection

@section('content')
<h1>Edit property</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('property.index') }}"> Back</a>
</div>
<form action="{{ route('property.update', $property->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>property name_ru:</strong>
                <input type="text" name="name_ru" value="@if(null !== old('name_ru')){{ old('name_ru') }}@else{{ $property->name_ru }}@endif" class="form-control" placeholder="property name_ru">
                @error('name_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>property name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $property->name_en }}@endif" class="form-control" placeholder="property name_en">
                @error('name_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection