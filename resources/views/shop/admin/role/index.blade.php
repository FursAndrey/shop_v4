@extends('../../../dashboard')

@section('title') roles @endsection

@section('content')
<h1>roles</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('role.create') }}"> Create roles</a>
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
                    <a class="btn btn-primary" href="{{ route('role.show', $role->id) }}">
                        {{ $role->name }}
                    </a>
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
                        <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('delete', $role)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $roles->links() !!}

@endsection