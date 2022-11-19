@extends('../../../welcome')

@section('title') products @endsection

@section('content')
<table class="table table-striped table-hover">
    <tr>
        <th>id_sku</th>
        <th>product</th>
        <th>price_for_once</th>
        <th>price</th>
        <th>count_in_order</th>
        <th>count_in_stoke</th>
        <th>parameters</th>
        <th></th>
    </tr>
    @php
        $totalPrice = 0;
    @endphp
    @foreach ($basket as $sku)
        @php
            $priceInBasket = $sku->price*$sku->countInBasket;
            $totalPrice += $priceInBasket;
        @endphp
        <tr>
            <td>{{ $sku->id }}</td>
            <td>
                <p><a href="{{ route('productPage', $sku->product) }}"><img src="{{ $sku->product->oneImage->file_for_view }}" alt="изображение не добавлено" style="max-width: 100px;"></a></p>
                <p><a href="{{ route('productPage', $sku->product) }}" class="btn btn-info">{{ $sku->product->name_ru }}/{{ $sku->product->name_en }}</a></p>
            </td>
            <td>{{ $sku->price }} BYN</td>
            <td>{{ $priceInBasket }} BYN</td>
            <td>
                @if ($sku->countInBasket < $sku->count)
                    <form action="{{ route('intoBasket', $sku) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-success" title="btn.add_to_basket">+</button>
                    </form>
                @else
                    <span class="d-inline-block btn btn-secondary" title="btn.not_available">+</span>
                @endif
                <span class="ms-3 me-3">{{ $sku->countInBasket }}</span>
                <form action="{{ route('fromBasket', $sku) }}" method="POST" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-warning" title="btn.remove_from_basket">
                        -
                    </button>
                </form>
            </td>
            <td>tables.no_more_than {{ $sku->count }}</td>
            <td>
                @foreach ($sku->product->properties as $property)
                    {{ $property->name_ru }}/{{ $property->name_en }}:
                    @if(isset($sku->options))
                        @foreach ($sku->options as $option)
                            @if ($option->property->id == $property->id)
                                {{ $option->name_ru }}/{{ $option->name_en }}<br/>
                            @endif
                        @endforeach
                    @else
                        -
                    @endif
                @endforeach
            </td>
            <td>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="btn.remove_from_basket">Х</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<p><b>tables.total_price</b> {{ $totalPrice }}BYN</p>
<a href="#" class="btn btn-success">btn.create_order</a>
<form action="#" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="btn.clear_basket">
        btn.clear_basket
    </button>
</form>
@endsection
