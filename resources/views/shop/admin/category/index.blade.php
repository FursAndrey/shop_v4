@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>categories</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('category.create') }}">Create categories</x-my.a.success>
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
                    <x-my.a.primary href="{{ route('category.show', $category->id) }}">
                        {{ $category->name }}
                    </x-my.a.primary>
                @else
                    {{ $category->name }}
                @endcan
            </x-my.table.td>
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
    @endforeach
</x-my.table>
{!! $categories->links() !!}

@endsection