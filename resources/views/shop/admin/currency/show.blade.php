@extends('../../../dashboard')

@section('title') currencies @endsection

@section('content')
<h1>currency</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('currency.index') }}"> Back</a>
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
            <th scope="col">code</th>
            <th scope="col">rate</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $currency->id }}</td>
            <td>{{ $currency->code }}</td>
            <td>{{ $currency->rate }}</td>
            <td>{{ $currency->created_at }}<br/>{{ $currency->updated_at }}</td>
            <td>
                <form action="{{ route('currency.destroy', $currency->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('currency.edit', $currency->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection