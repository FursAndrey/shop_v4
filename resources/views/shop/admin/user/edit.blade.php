@extends('../../../dashboard')

@section('title') Edit user @endsection

@section('content')
<h1>Edit user</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('user.index') }}">Back</x-my.a.primary>
</div>
<form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="mb-3">
            <label for="role_id" class="form-label">role</label>
            @php
                if (null !== old('role_id')) {
                    $oldValue = old('role_id');
                } else {
                    $oldValue = $user->roles->map->id->toArray();
                }
            @endphp
            <x-my.form.select :oldSelected="$oldValue" :options="$roles" id="role_id" name="role_id[]"/>
            @error('role_id')
                <x-my.alert.danger>{{ $message }}</x-my.alert.danger>
            @enderror
        </div>
        <x-my.btn.primary class="mt-3">Submit</x-my.btn.primary>
    </div>
</form>
@endsection