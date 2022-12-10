@extends('../../../dashboard')

@section('title') products @endsection

@section('content')
<h1>product</h1>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
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
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">properties</th>
            <th scope="col">skus</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
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
            <td>{{ $product->created_at }}<br/>{{ $product->updated_at }}</td>
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
    </tbody>
</table>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">images</th>
            <th scope="col" class="w-25"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                @foreach ($product->images as $image)
                    <div class="d-inline-block border border-primary border-2 p-1">
                        <img src="{{ $image->file_for_view }}" alt="изображение не добавлено" class="d-inline-block" style="width: 200px;">
                        <form action="{{ route('daleteOneImg', [$product->id, $image->id]) }}" method="Post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-circle">X</button>
                        </form>
                    </div>
                @endforeach
            </td>
            <td>
                <form action="{{ route('daleteAllImg', $product->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete all images</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection