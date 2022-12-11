@extends('../../../dashboard')

@section('title') properties @endsection

@section('content')
<h1>properties</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('property.create') }}"> Create properties</a>
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
            <x-my.table.th>products</x-my.table.th>
            <x-my.table.th>options</x-my.table.th>
            <x-my.table.th></x-my.table.th>
        </x-my.table.tr>
    </x-slot>
    @foreach ($properties as $property)
        <x-my.table.tr>
            <x-my.table.td>
                @can('view', $property)
                    <a class="btn btn-primary" href="{{ route('property.show', $property->id) }}">
                        {{ $property->name }}
                    </a>
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
                        <a class="btn btn-primary" href="{{ route('property.edit', $property->id) }}">Edit</a>
                    @endcan
                    @can('delete', $property)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </x-my.table.td>
        </x-my.table.tr>
    @endforeach
</x-my.table>
{!! $properties->links() !!}

@endsection