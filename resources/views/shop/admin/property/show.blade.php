@extends('../../../dashboard')

@section('title') properties @endsection

@section('content')
<h1>property</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('property.index') }}"> Back</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">products</th>
            <th scope="col">options</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $property->id }}</td>
            <td>{{ $property->name }}</td>
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
            <td>{{ $property->created_at }}<br/>{{ $property->updated_at }}</td>
            <td>
                <form action="{{ route('property.destroy', $property->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('property.edit', $property->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection