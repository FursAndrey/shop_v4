@extends('../../../dashboard')

@section('title') options @endsection

@section('content')
<h1>options</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('option.create') }}">Create option</x-my.a.success>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>properties</x-my.table.th>
            <x-my.table.th>skus</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($options as $option)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $option)
                    <x-my.a.primary href="{{ route('option.show', $option->id) }}">
                        {{ $option->name }}
                    </x-my.a.primary>
                @else
                    {{ $option->name }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>{{ $option->property->name }}</x-my.table.td>
            <x-my.table.td>
                @foreach ($option->skus as $sku)
                    {{ $sku->id }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('option.destroy', $option->id) }}" method="Post">
                    @can('update', $option)
                        <x-my.a.primary href="{{ route('option.edit', $option->id) }}">Edit</x-my.a.primary>
                    @endcan
                    @can('delete', $option)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $options->links() !!}

@endsection