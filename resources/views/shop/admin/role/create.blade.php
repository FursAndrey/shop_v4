@extends('../../../dashboard')

@section('title') Add role @endsection

@section('content')
<h1>Add role</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
</div>
<form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>role name_ru:</strong>
                <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control" placeholder="role name_ru">
                @error('name_ru')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>role name_en:</strong>
                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="role name_en">
                @error('name_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="description_ru" class="form-label">description_ru</label>
            @error('description_ru')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
            <textarea class="form-control" id="description_ru" name="description_ru" rows="3">{{ old('description_ru') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description_en" class="form-label">description_en</label>
            @error('description_en')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
            <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection