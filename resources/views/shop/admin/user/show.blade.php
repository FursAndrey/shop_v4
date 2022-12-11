@extends('../../../dashboard')

@section('title') user @endsection

@section('content')
    <h2>user {{ $user->name }}</h2>
    <a class="btn btn-success mt-2 mb-2" href="{{ route('user.index') }}">return_to_users</a>
    <x-my.table>
        <x-slot name="thead">
            <x-my.table.tr>
                <x-my.table.th>login</x-my.table.th>
                <x-my.table.th>email</x-my.table.th>
                <x-my.table.th>roles</x-my.table.th>
                <x-my.table.th></x-my.table.th>
            </x-my.table.tr>
        </x-slot>
        <x-my.table.tr>
            <x-my.table.td>{{ $user->name }}</x-my.table.td>
            <x-my.table.td>{{ $user->email }}</x-my.table.td>
            <x-my.table.td>
                @foreach ($user->roles as $role)
                    {{ $role->name }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('user.destroy', $user) }}" method="Post">
                    @can('update', $user)
                        <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit roles</a>
                    @endcan
                    @can('delete', $user)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    </x-my.table>
@endsection