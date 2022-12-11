@extends('../../../dashboard')

@section('title') currencies @endsection

@section('content')
<h1>currencies</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('currency.create') }}"> Create currencies</a>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>code</x-my.table.th>
            <x-my.table.th>rate</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($currencies as $currency)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $currency)
                    <a class="btn btn-primary" href="{{ route('currency.show', $currency->id) }}">
                        {{ $currency->code }}
                    </a>
                @else
                    {{ $currency->code }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>{{ $currency->rate }}</x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('currency.destroy', $currency->id) }}" method="Post">
                    @can('update', $currency)
                        <a class="btn btn-primary" href="{{ route('currency.edit', $currency->id) }}">Edit</a>
                    @endcan
                    @can('delete', $currency)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $currencies->links() !!}

@endsection