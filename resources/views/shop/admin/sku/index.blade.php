@extends('../../../dashboard')

@section('title') skus @endsection

@section('content')
<h1>skus</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('sku.create') }}"> Create skus</a>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>product</x-my.table.th>
            <x-my.table.th>options</x-my.table.th>
            <x-my.table.th>price</x-my.table.th>
            <x-my.table.th>count</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($skus as $sku)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $sku)
                    <a class="btn btn-primary" href="{{ route('sku.show', $sku->id) }}">
                        {{ $sku->id }}
                    </a>
                @else
                    {{ $sku->id }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>{{ $sku->product->name }}</x-my.table.td>
            <x-my.table.td>
                @foreach ($sku->options as $option)
                    {{ $option->name }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>{{ $sku->price }} {{ $sku->CurrencyCode }}</x-my.table.td>
            <x-my.table.td>{{ $sku->count }}</x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('sku.destroy', $sku->id) }}" method="Post">
                    @can('update', $sku)
                        <a class="btn btn-primary" href="{{ route('sku.edit', $sku->id) }}">Edit</a>
                    @endcan
                    @can('delete', $sku)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $skus->links() !!}

@endsection