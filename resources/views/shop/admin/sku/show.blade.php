@extends('../../../dashboard')

@section('title') skus @endsection

@section('content')
<h1>sku</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('sku.index') }}"> Back</a>
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
            <th scope="col">product</th>
            <th scope="col">options</th>
            <th scope="col">price</th>
            <th scope="col">count</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $sku->id }}</td>
            <td>{{ $sku->product->name }}</td>
            <td>
                @foreach ($sku->options as $option)
                    {{ $option->name }}<br/>
                @endforeach
            </td>
            <td>{{ $sku->price }}BYN</td>
            <td>{{ $sku->count }}</td>
            <td>{{ $sku->created_at }}<br/>{{ $sku->updated_at }}</td>
            <td>
                <form action="{{ route('sku.destroy', $sku->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('sku.edit', $sku->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection