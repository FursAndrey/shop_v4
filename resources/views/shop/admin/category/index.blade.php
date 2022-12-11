@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>categories</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('category.create') }}"> Create categories</a>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif
<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>&nbsp;</x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($categories as $category)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $category)
                    <a class="btn btn-primary" href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                @else
                    {{ $category->name }}
                @endcan
            </x-my.table.td>
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
    @endforeach
</x-my.table>
{!! $categories->links() !!}

@endsection