@extends('../../../dashboard')

@section('title') role @endsection

@section('content')
<h1>role</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>description</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $role->id }}</x-my.table.td>
        <x-my.table.td>{{ $role->name }}</x-my.table.td>
        <x-my.table.td>{{ $role->description }}</x-my.table.td>
        <x-my.table.td>{{ $role->created_at }}<br/>{{ $role->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('role.destroy', $role->id) }}" method="Post">
                @can('update', $role)
                    <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                @endcan
                @can('delete', $role)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection