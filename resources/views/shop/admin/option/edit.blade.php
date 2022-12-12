@extends('../../../dashboard')

@section('title') Edit option @endsection

@section('content')
<h1>Edit option</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('option.index') }}">Back</x-my.a.primary>
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
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option name_en:</strong>
                <input type="text" name="name_en" value="@if(null !== old('name_en')){{ old('name_en') }}@else{{ $option->name_en }}@endif" class="form-control" placeholder="option name_en">
                @error('name_en')
                    <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="property_id" class="form-label">Property</label>
            @php
                if (null !== old('property_id')) {
                    $oldValue = old('property_id');
                } else {
                    $oldValue = $option->property_id;
                }
            @endphp
            <x-my.form.select :options="$properties" :oldSelected="old('property_id')" id="property_id" name="property_id"/>
            @error('property_id')
                <x-my.alert.danger class="my-1">{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection