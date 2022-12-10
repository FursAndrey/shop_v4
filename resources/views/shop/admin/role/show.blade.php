@extends('../../../dashboard')

@section('title') role @endsection

@section('content')
<h1>role</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('role.index') }}"> Back</a>
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
            <th scope="col">description</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>{{ $role->created_at }}<br/>{{ $role->updated_at }}</td>
            <td>
                <form action="{{ route('role.destroy', $role->id) }}" method="Post">
                    @can('update', $role)
                        <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('delete', $role)
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection