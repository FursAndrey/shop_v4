@extends('../../../welcome')

@section('title') Basket @endsection

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
                <p><a href="{{ route('productPage', $sku->product) }}" class="btn btn-info">{{ $sku->product->name }}</a></p>
            </td>
            <td>{{ $sku->price }} {{ $sku->CurrencyCode }}</td>
            <td>{{ $priceInBasket }} {{ $sku->CurrencyCode }}</td>
            <td>
                @if ($sku->countInBasket < $sku->count)
                    <form action="{{ route('intoBasket', $sku) }}" method="POST" class="d-inline-block">
                        @csrf
                        <x-my.btn.success title="add_to_basket">+</x-my.btn.success>
                    </form>
                @else
                    <span class="d-inline-block btn btn-secondary" title="btn.not_available">+</span>
                @endif
                <span class="ms-3 me-3">{{ $sku->countInBasket }}</span>
                <form action="{{ route('fromBasket', $sku) }}" method="POST" class="d-inline-block">
                    @csrf
                    <x-my.btn.warning title="remove_from_basket">-</x-my.btn.warning>
                </form>
            </td>
            <td>tables.no_more_than {{ $sku->count }}</td>
            <td>
                @foreach ($sku->product->properties as $property)
                    {{ $property->name }}:
                    @if(isset($sku->options))
                        @foreach ($sku->options as $option)
                            @if ($option->property->id == $property->id)
                                {{ $option->name }}<br/>
                            @endif
                        @endforeach
                    @else
                        -
                    @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('removeItFromBasket', $sku) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-my.btn.danger title="btn.remove_from_basket">X</x-my.btn.danger>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<p><b>tables.total_price</b> {{ $totalPrice }} {{ $sku->CurrencyCode }}</p>
<a href="{{ route('confirmForm') }}" class="btn btn-success">btn.create_order</a>
<form action="{{ route('clearBasket') }}" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <x-my.btn.danger title="btn.clear_basket">btn.clear_basket</x-my.btn.danger>
</form>
@endsection
