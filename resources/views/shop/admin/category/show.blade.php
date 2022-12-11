@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>category</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('category.index') }}">Back</x-my.a.primary>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th>&nbsp;</x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $category->id }}</x-my.table.td>
        <x-my.table.td>{{ $category->name }}</x-my.table.td>
        <x-my.table.td>{{ $category->created_at }}<br/>{{ $category->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('category.destroy', $category->id) }}" method="Post">
                @can('update', $category)
                    <x-my.a.primary href="{{ route('category.edit', $category->id) }}">Edit</x-my.a.primary>
                @endcan
                @can('delete', $category)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection