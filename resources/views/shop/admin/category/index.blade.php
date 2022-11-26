@extends('../../../dashboard')

@section('title') categories @endsection

@section('content')
<h1>categories</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('category.create') }}"> Create categories</a>
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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('category.show', $category->id) }}">
                    {{ $category->name }}
                </a>
            </td>
            <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $categories->links() !!}

@endsection