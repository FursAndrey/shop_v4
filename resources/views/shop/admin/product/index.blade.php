@extends('../../../dashboard')

@section('title') products @endsection

@section('content')
<h1>products</h1>
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{ route('product.create') }}"> Create products</a>
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
            <th scope="col">category</th>
            <th scope="col">properties</th>
            <th scope="col">skus</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('product.show', $product->id) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                @foreach ($product->properties as $property)
                    {{ $property->name }}<br/>
                @endforeach
            </td>
            <td>
                @foreach ($product->skus as $sku)
                    #{{ $sku->id }} / {{ $sku->price }} {{ $sku->CurrencyCode }} / count:{{ $sku->count }}<br/>
                @endforeach
            </td>
            <td>
                <form action="{{ route('product.destroy', $product->id) }}" method="Post">
                    @can('update', $product)
                        <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                    @endcan
                    @can('delete', $product)
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
{!! $products->links() !!}

@endsection