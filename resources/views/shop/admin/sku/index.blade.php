@extends('../../../dashboard')

@section('title') skus @endsection

@section('content')
<h1>skus</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('sku.create') }}">Create sku</x-my.a.success>
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
                    <x-my.a.primary href="{{ route('sku.show', $sku->id) }}">
                        {{ $sku->id }}
                    </x-my.a.primary>
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
                        <x-my.a.primary href="{{ route('sku.edit', $sku->id) }}">Edit</x-my.a.primary>
                    @endcan
                    @can('delete', $sku)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $skus->links() !!}

@endsection