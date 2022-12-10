@extends('../../../dashboard')

@section('title') users @endsection

@section('content')
    <h2>users</h2>
        
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-striped table-hover">
        <tr>
            <th>login</th>
            <th>email</th>
            <th>roles</th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>
                    @can('view', $user)
                        <a href="{{ route('user.show', $user) }}" class="btn btn-info">{{ $user->name }}</a>
                    @else
                        {{ $user->name }}
                    @endcan
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }}<br/>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('user.destroy', $user) }}" method="Post">
                        @can('update', $user)
                            <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit roles</a>
                        @endcan
                        @can('delete', $user)
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection