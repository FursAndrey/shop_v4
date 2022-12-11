@extends('../../../dashboard')

@section('title') products @endsection

@section('content')
<h1>product</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>description</x-my.table.th>
            <x-my.table.th>category</x-my.table.th>
            <x-my.table.th>properties</x-my.table.th>
            <x-my.table.th>skus</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $product->id }}</x-my.table.td>
        <x-my.table.td>{{ $product->name }}</x-my.table.td>
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
        <x-my.table.td>{{ $product->created_at }}<br/>{{ $product->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('product.destroy', $product->id) }}" method="Post">
                @can('update', $product)
                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                @endcan
                @can('delete', $product)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>
<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>images</x-my.table.th>
            <x-my.table.th class="w-25"></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>
            @foreach ($product->images as $image)
                <div class="d-inline-block border border-primary border-2 p-1">
                    <img src="{{ $image->file_for_view }}" alt="изображение не добавлено" class="d-inline-block" style="width: 200px;">
                    @can('delete-image', $image)
                        <form action="{{ route('daleteOneImg', [$product->id, $image->id]) }}" method="Post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <x-my.btn.danger class="rounded-circle">X</x-my.btn.danger>
                        </form>
                    @endcan
                </div>
            @endforeach
        </x-my.table.td>
        <x-my.table.td>
            @can('delete-image', $image)
                <form action="{{ route('daleteAllImg', $product->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete all images</x-my.btn.danger>
                </form>
            @endcan
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection