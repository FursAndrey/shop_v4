@extends('../../../dashboard')

@section('title') currencies @endsection

@section('content')
<h1>currency</h1>
<div class="pull-right">
    <x-my.a.primary href="{{ route('currency.index') }}">Back</x-my.a.primary>
</div>

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>id</x-my.table.th>
            <x-my.table.th>code</x-my.table.th>
            <x-my.table.th>rate</x-my.table.th>
            <x-my.table.th>created/<br/>updated</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    <x-my.table.tr>
        <x-my.table.td>{{ $currency->id }}</x-my.table.td>
        <x-my.table.td>{{ $currency->code }}</x-my.table.td>
        <x-my.table.td>{{ $currency->rate }}</x-my.table.td>
        <x-my.table.td>{{ $currency->created_at }}<br/>{{ $currency->updated_at }}</x-my.table.td>
        <x-my.table.td>
            <form action="{{ route('currency.destroy', $currency->id) }}" method="Post">
                @can('update', $currency)
                    <x-my.a.primary href="{{ route('currency.edit', $currency->id) }}">Edit</x-my.a.primary>
                @endcan
                @can('delete', $currency)
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger>Delete</x-my.btn.danger>
                @endcan
            </form>
        </x-my.table.td>
    </x-my.table.tr>
</x-my.table>

@endsection