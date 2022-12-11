@extends('../../../dashboard')

@section('title') options @endsection

@section('content')
<h1>option</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('option.index') }}"> Back</a>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>properties</x-my.table.th>
            <x-my.table.th>skus</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $option->id }}</x-my.table.td>
        <x-my.table.td>{{ $option->name }}</x-my.table.td>
        <x-my.table.td>{{ $option->property->name }}</x-my.table.td>
        <x-my.table.td>
            @foreach ($option->skus as $sku)
                {{ $sku->id }}<br/>
            @endforeach
        </x-my.table.td>
        <x-my.table.td>{{ $option->created_at }}<br/>{{ $option->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('option.destroy', $option->id) }}" method="Post">
                @can('update', $option)
                    <a class="btn btn-primary" href="{{ route('option.edit', $option->id) }}">Edit</a>
                @endcan
                @can('delete', $option)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection