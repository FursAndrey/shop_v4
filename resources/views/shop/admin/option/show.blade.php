@extends('../../../dashboard')

@section('title') options @endsection

@section('content')
<h1>option</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('option.index') }}"> Back</a>
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
            <th scope="col">properties</th>
            <th scope="col">skus</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $option->id }}</td>
            <td>{{ $option->name }}</td>
            <td>{{ $option->property->name }}</td>
            <td>
                @foreach ($option->skus as $sku)
                    {{ $sku->id }}<br/>
                @endforeach
            </td>
            <td>{{ $option->created_at }}<br/>{{ $option->updated_at }}</td>
            <td>
                <form action="{{ route('option.destroy', $option->id) }}" method="Post">
                    @can('update', $option)
                        <a class="btn btn-primary" href="{{ route('option.edit', $option->id) }}">Edit</a>
                    @endcan
                    @can('delete', $option)
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