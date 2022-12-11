@extends('../../../dashboard')

@section('title') skus @endsection

@section('content')
<h1>sku</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('sku.index') }}"> Back</a>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>product</x-my.table.th>
            <x-my.table.th>options</x-my.table.th>
            <x-my.table.th>price</x-my.table.th>
            <x-my.table.th>count</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $sku->id }}</x-my.table.td>
        <x-my.table.td>{{ $sku->product->name }}</x-my.table.td>
        <x-my.table.td>
            @foreach ($sku->options as $option)
                {{ $option->name }}<br/>
            @endforeach
        </x-my.table.td>
        <x-my.table.td>{{ $sku->price }} {{ $sku->CurrencyCode }}</x-my.table.td>
        <x-my.table.td>{{ $sku->count }}</x-my.table.td>
        <x-my.table.td>{{ $sku->created_at }}<br/>{{ $sku->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('sku.destroy', $sku->id) }}" method="Post">
                @can('update', $sku)
                    <a class="btn btn-primary" href="{{ route('sku.edit', $sku->id) }}">Edit</a>
                @endcan
                @can('delete', $sku)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection