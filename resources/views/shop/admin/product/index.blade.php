@extends('../../../dashboard')

@section('title') products @endsection

@section('content')
<h1>products</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('product.create') }}">Create product</x-my.a.success>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>description</x-my.table.th>
            <x-my.table.th>category</x-my.table.th>
            <x-my.table.th>properties</x-my.table.th>
            <x-my.table.th>skus</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($products as $product)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $product)
                    <x-my.a.primary href="{{ route('product.show', $product->id) }}">
                        {{ $product->name }}
                    </x-my.a.primary>
                @else
                    {{ $product->name }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>{{ $product->description }}</x-my.table.td>
            <x-my.table.td>{{ $product->category->name }}</x-my.table.td>
            <x-my.table.td>
                @foreach ($product->properties as $property)
                    {{ $property->name }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                @foreach ($product->skus as $sku)
                    #{{ $sku->id }} / {{ $sku->price }} {{ $sku->CurrencyCode }} / count:{{ $sku->count }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('product.destroy', $product->id) }}" method="Post">
                    @can('update', $product)
                        <x-my.a.primary href="{{ route('product.edit', $product->id) }}">Edit</x-my.a.primary>
                    @endcan
                    @can('delete', $product)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $products->links() !!}

@endsection