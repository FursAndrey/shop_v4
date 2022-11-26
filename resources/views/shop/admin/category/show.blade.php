@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>category</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
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
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at }}<br/>{{ $category->updated_at }}</td>
            <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection