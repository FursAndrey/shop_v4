@extends('../../../dashboard')

@section('title') products @endsection

@section('content')
<h1>products</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('product.create') }}"> Create products</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
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
                    <a class="btn btn-primary" href="{{ route('product.show', $product->id) }}">
                        {{ $product->name }}
                    </a>
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
                        <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                    @endcan
                    @can('delete', $product)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $products->links() !!}

@endsection