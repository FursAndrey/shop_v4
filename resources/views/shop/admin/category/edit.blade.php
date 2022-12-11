@extends('../../../dashboard')

@section('title') Edit category @endsection

@section('content')
<h1>Edit category</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('category.index') }}">Back</x-my.a.primary>
</div>
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category name_ru:</strong>
                <input type="text" name="name_ru" value="@if(null !== old('name_ru')){{ old('name_ru') }}@else{{ $category->name_ru }}@endif" class="form-control" placeholder="category name_ru">
                @error('name_ru')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $category->name_en }}@endif" class="form-control" placeholder="category name_en">
                @error('name_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection