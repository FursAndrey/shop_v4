@extends('../../../dashboard')

@section('title') user @endsection

@section('content')
    <h2>user {{ $user->name }}</h2>
    <a class="btn btn-success mt-2 mb-2" href="{{ route('user.index') }}">return_to_users</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>login</th>
            <th>email</th>
            <th>roles</th>
            <th></th>
        </tr>
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach ($user->roles as $role)
                    {{ $role->name }}<br/>
                @endforeach
            </td>
            <td>
                <form action="{{ route('user.destroy', $user) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit roles</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </table>
@endsection