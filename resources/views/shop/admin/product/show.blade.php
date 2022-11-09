@extends('../../../welcome')

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
            <th scope="col">description_ru</th>
            <th scope="col">description_en</th>
            <th scope="col">category</th>
            <th scope="col">properties</th>
            <th scope="col">created/<br/>updated</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name_ru }} / {{ $product->name_en }}</td>
            <td>{{ $product->description_ru }}</td>
            <td>{{ $product->description_en }}</td>
            <td>{{ $product->category->name_ru }}/{{ $product->category->name_en }}</td>
            <td>
                @foreach ($product->properties as $property)
                    {{ $property->name_ru }} / {{ $property->name_en }}<br/>
                @endforeach
            </td>
            <td>{{ $product->created_at }}<br/>{{ $product->updated_at }}</td>
            <td>
                <form action="{{ route('product.destroy', $product->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection