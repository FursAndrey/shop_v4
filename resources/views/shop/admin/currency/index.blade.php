@extends('../../../welcome')

@section('title') currencies @endsection

@section('content')
<h1>currencies</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('currency.create') }}"> Create currencies</a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">code</th>
            <th scope="col">rate</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currencies as $currency)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('currency.show', $currency->id) }}">
                    {{ $currency->code }}
                </a>
            </td>
            <td>{{ $currency->rate }}</td>
            <td>
                <form action="{{ route('currency.destroy', $currency->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('currency.edit', $currency->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $currencies->links() !!}

@endsection