@extends('../../../dashboard')

@section('title') users @endsection

@section('content')
    <h2>users</h2>
        
    @if ($message = Session::get('success'))
        <x-my.alert.success>{{ $message }}</x-my.alert.success>
    @endif

    <x-my.table>
        <x-slot name="thead">
            <x-my.table.tr>
                <x-my.table.th>login</x-my.table.th>
                <x-my.table.th>email</x-my.table.th>
                <x-my.table.th>roles</x-my.table.th>
                <x-my.table.th></x-my.table.th>
            </x-my.table.tr>
        </x-slot>
        @foreach ($users as $user)
            <x-my.table.tr>
                <x-my.table.td>
                    @can('view', $user)
                        <a href="{{ route('user.show', $user) }}" class="btn btn-info">{{ $user->name }}</a>
                    @else
                        {{ $user->name }}
                    @endcan
                </x-my.table.td>
                <x-my.table.td>{{ $user->email }}</x-my.table.td>
                <x-my.table.td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }}<br/>
                    @endforeach
                </x-my.table.td>
                <x-my.table.td>
                    <form action="{{ route('user.destroy', $user) }}" method="Post">
                        @can('update', $user)
                            <x-my.a.primary href="{{ route('user.edit', $user->id) }}">Edit roles</x-my.a.primary>
                        @endcan
                        @can('delete', $user)
                            @csrf
                            @method('DELETE')
                            <x-my.btn.danger>Delete</x-my.btn.danger>
                        @endcan
                    </form>
                </x-my.table.td>
            </x-my.table.tr>
        @endforeach
    </x-my.table>
    {{ $users->links() }}
@endsection