@extends('../../../dashboard')

@section('title') Add option @endsection

@section('content')
<h1>Add option</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('option.index') }}"> Back</a>
</div>
<form action="{{ route('option.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option name_ru:</strong>
                <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control" placeholder="option name_ru">
                @error('name_ru')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option name_en:</strong>
                <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="option name_en">
                @error('name_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="property_id" class="form-label">Property</label>
            <select name="property_id" class="form-select" id="property_id">
                @foreach ($properties as $property)
                <option value="{{ $property->id }}" @selected(old('property_id') == $property->id)>
                    {{ $property->id }} - {{ $property->name_ru }}/{{ $property->name_en }}
                </option>
                @endforeach
            </select>
            @error('property_id')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection