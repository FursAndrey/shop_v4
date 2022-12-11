@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>category</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
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
                    <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                @endcan
                @can('delete', $category)
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection