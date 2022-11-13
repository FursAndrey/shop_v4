@extends('../../../dashboard')

@section('title') Edit option @endsection

@section('content')
<h1>Edit option</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('option.index') }}"> Back</a>
</div>
<form action="{{ route('option.update', $option->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option name_ru:</strong>
                <input type="text" name="name_ru" value="@if(null !== old('name_ru')){{ old('name_ru') }}@else{{ $option->name_ru }}@endif" class="form-control" placeholder="option name_ru">
                @error('name_ru')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $option->name_en }}@endif" class="form-control" placeholder="option name_en">
                @error('name_en')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="property_id" class="form-label">Property</label>
            <select name="property_id" class="form-select" id="property_id">
                @foreach ($properties as $property)
                <option value="{{ $property->id }}" @if(null !== old('property_id')) @selected(old('property_id') == $property->id) @else @selected($option->property_id == $property->id) @endif>
                    {{ $property->id }} - {{ $property->name_ru }}/{{ $property->name_en }}
                </option>
                @endforeach
            </select>
            @error('property_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>
</form>
@endsection