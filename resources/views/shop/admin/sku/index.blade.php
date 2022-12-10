@extends('../../../dashboard')

@section('title') skus @endsection

@section('content')
<h1>skus</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('sku.create') }}"> Create skus</a>
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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($skus as $sku)
        <tr>
            <td>
                @can('view', $sku)
                    <a class="btn btn-primary" href="{{ route('sku.show', $sku->id) }}">
                        {{ $sku->id }}
                    </a>
                @else
                    {{ $sku->id }}
                @endcan
            </td>
            <td>{{ $sku->product->name }}</td>
            <td>
                @foreach ($sku->options as $option)
                    {{ $option->name }}<br/>
                @endforeach
            </td>
            <td>{{ $sku->price }} {{ $sku->CurrencyCode }}</td>
            <td>{{ $sku->count }}</td>
            <td>
                <form action="{{ route('sku.destroy', $sku->id) }}" method="Post">
                    @can('update', $sku)
                        <a class="btn btn-primary" href="{{ route('sku.edit', $sku->id) }}">Edit</a>
                    @endcan
                    @can('delete', $sku)
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
{!! $skus->links() !!}

@endsection