@extends('../../../dashboard')

@section('title') Edit user @endsection

@section('content')
<h1>Edit user</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
</div>
<form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="mb-3">
            @php
                $user_roles = $user->roles->map->id->toArray();
            @endphp
            <label for="role_id" class="form-label">role</label>
            <select name="role_id[]" class="form-select" id="role_id">
                <option value="0">Не выбрано</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if(null !== old('role_id')) @selected(old('role_id') == $role->id) @else @selected(in_array($role->id, $user_roles)) @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @error('role_id')
                <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection