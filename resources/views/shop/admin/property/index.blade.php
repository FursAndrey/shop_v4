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

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">name</th>
            <th scope="col">products</th>
            <th scope="col">options</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('property.show', $property->id) }}">
                    {{ $property->name }}
                </a>
            </td>
            <td>
                @foreach ($property->products as $product)
                    {{ $product->name }}<br/>
                @endforeach
            </td>
            <td>
                @foreach ($property->options as $option)
                    {{ $option->name }}<br/>
                @endforeach
            </td>
            <td>
                <form action="{{ route('property.destroy', $property->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('property.edit', $property->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $properties->links() !!}

@endsection