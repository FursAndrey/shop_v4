@extends('../../../welcome')

@section('title') product @endsection

@section('content')
<div class="bg-white border p-6 row">
    <div class="col-4 p-2">
        <img src="{{ $product->images[0]->file_for_view }}" alt="изображение не добавлено" class="d-inline-block w-100 current-img">
        <div>
            @foreach ($product->images as $image)
                <div class="d-inline-block mt-2" style="width: 32.5%">
                    <img src="{{ $image->file_for_view }}" alt="изображение не добавлено" class="w-100 collection-img">
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-8 p-2">
        <h4 class="mt-2 text-center">{{ $product->name_ru }}/{{ $product->name_en }}</h4>
        <p>{{ $product->description_ru }}/{{ $product->description_en }}</p>
        <p><b>SKUS</b></p>
        <table class="w-100">
        @foreach($product->skus as $sku)
            <tr>
                <td class="p-2">{{ $sku->id }}</td>
                <td class="p-2"><b>price:</b>{{ $sku->price }}BYN</td>
                <td class="p-2">
                @foreach ($product->properties as $property)
                    <b>{{ $property->name_ru }}/{{ $property->name_en }}:</b>
                    @foreach ($sku->options as $option)
                        @if ($option->property->id == $property->id)
                            {{ $option->name_ru }}/{{ $option->name_en }}
                        @endif
                    @endforeach
                    <br/>
                @endforeach
                </td>
                <td class="p-2"><b>In stock:</b>{{ $sku->count }}</td>
                <td class="p-2"><a href="#" class="btn btn-success">Add in basket</a></td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection

@section('footer_script')
<script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    let images = $('.collection-img');
    for (let i = 0; i < images.length; i++) {
        $(images[i]).click(function() {
            $('.current-img').attr('src', $(images[i]).attr('src'));
        });
    }
});
</script>
@endsection