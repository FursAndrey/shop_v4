@extends('../../../welcome')

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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($options as $option)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('option.show', $option->id) }}">
                    {{ $option->name_ru }} / {{ $option->name_en }}
                </a>
            </td>
            <td>{{ $option->property->name_ru }} / {{ $option->property->name_en }}</td>
            <td>
                <form action="{{ route('option.destroy', $option->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('option.edit', $option->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $options->links() !!}

@endsection