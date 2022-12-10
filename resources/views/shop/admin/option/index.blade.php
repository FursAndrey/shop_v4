@extends('../../../dashboard')

@section('title') options @endsection

@section('content')
<h1>options</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('option.create') }}"> Create options</a>
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
            <th scope="col">properties</th>
            <th scope="col">skus</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($options as $option)
        <tr>
            <td>
                @can('view', $option)
                    <a class="btn btn-primary" href="{{ route('option.show', $option->id) }}">
                        {{ $option->name }}
                    </a>
                @else
                    {{ $option->name }}
                @endcan
            </td>
            <td>{{ $option->property->name }}</td>
            <td>
                @foreach ($option->skus as $sku)
                    {{ $sku->id }}<br/>
                @endforeach
            </td>
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
        @endforeach
    </tbody>
</table>
{!! $options->links() !!}

@endsection