@extends('../../../dashboard')

@section('title') properties @endsection

@section('content')
<h1>properties</h1>
<div class="pull-right mb-2">
    <x-my.a.success href="{{ route('property.create') }}">Create property</x-my.a.success>
</div>

@if ($message = Session::get('success'))
    <x-my.alert.success>{{ $message }}</x-my.alert.success>
@endif

<x-my.table>
    <x-slot name="thead">
        <x-my.table.tr>
            <x-my.table.th>name</x-my.table.th>
            <x-my.table.th>products</x-my.table.th>
            <x-my.table.th>options</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($properties as $property)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $property)
                    <x-my.a.primary href="{{ route('property.show', $property->id) }}">
                        {{ $property->name }}
                    </x-my.a.primary>
                @else
                    {{ $property->name }}
                @endcan
            </x-my.table.td>
            <x-my.table.td>
                @foreach ($property->products as $product)
                    {{ $product->name }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                @foreach ($property->options as $option)
                    {{ $option->name }}<br/>
                @endforeach
            </x-my.table.td>
            <x-my.table.td>
                <form action="{{ route('property.destroy', $property->id) }}" method="Post">
                    @can('update', $property)
                        <x-my.a.primary href="{{ route('property.edit', $property->id) }}">Edit</x-my.a.primary>
                    @endcan
                    @can('delete', $property)
                        @csrf
                        @method('DELETE')
                        <x-my.btn.danger>Delete</x-my.btn.danger>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $properties->links() !!}

@endsection