@extends('../../../dashboard')

@section('title') roles @endsection

@section('content')
<h1>roles</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('role.create') }}">Create role</x-my.a.success>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>description</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($roles as $role)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $role)
                    <x-my.a.primary href="{{ route('role.show', $role->id) }}">
                        {{ $role->name }}
                    </x-my.a.primary>
                @else
                    {{ $role->name }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>
                {{ $role->description }}
            </x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('role.destroy', $role->id) }}" method="Post">
                    @can('update', $role)
                        <x-my.a.primary href="{{ route('role.edit', $role->id) }}">Edit</x-my.a.primary>
                    @endcan
                    @can('delete', $role)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $roles->links() !!}

@endsection