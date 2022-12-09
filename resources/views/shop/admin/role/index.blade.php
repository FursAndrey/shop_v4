@extends('../../../dashboard')

@section('title') roles @endsection

@section('content')
<h1>roles</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('role.create') }}"> Create roles</a>
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
            <th scope="col">description</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('role.show', $role->id) }}">
                    {{ $role->name }}
                </a>
            </td>
            <td>
                {{ $role->description }}
            </td>
            <td>
                <form action="{{ route('role.destroy', $role->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $roles->links() !!}

@endsection