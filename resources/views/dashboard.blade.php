<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('productList') }}">Shop</a>
            <a href="{{ route('category.index') }}">category</a>
            <a href="{{ route('currency.index') }}">currency</a>
            <a href="{{ route('product.index') }}">product</a>
            <a href="{{ route('property.index') }}">property</a>
            <a href="{{ route('option.index') }}">option</a>
            <a href="{{ route('sku.index') }}">sku</a>
            <a href="{{ route('resetProject') }}">reset project</a>
            <a class="btn btn-info" href="{{ route('setLocale', 'ru') }}">RU</a>
            <a class="btn btn-info" href="{{ route('setLocale', 'en') }}">EN</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-100 p-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('footer_script')
</x-app-layout>
