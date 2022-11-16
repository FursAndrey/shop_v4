@extends('../../../welcome')

@section('title') products @endsection

@section('content')
<div class="bg-white border p-6 row">
    @foreach ($products as $product)
        <div class="col-3 p-2">
            <img src="{{ $product->images[0]->file_for_view }}" alt="изображение не добавлено" class="d-inline-block w-100">
            <h4><a href="{{ route('productPage', $product->id) }}" class="mt-2 btn btn-info w-100">{{ $product->name_ru }}/{{ $product->name_en }}</a></h4>
        </div>
    @endforeach
</div>
@endsection
