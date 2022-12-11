<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('productList') }}">Shop</a>
            @can('viewAny', \App\Models\Category::class)
                <a href="{{ route('category.index') }}">category</a>
            @endcan
            @can('viewAny', \App\Models\Currency::class)
                <a href="{{ route('currency.index') }}">currency</a>
            @endcan
            @can('viewAny', \App\Models\Product::class)
                <a href="{{ route('product.index') }}">product</a>
            @endcan
            @can('viewAny', \App\Models\Property::class)
                <a href="{{ route('property.index') }}">property</a>
            @endcan
            @can('viewAny', \App\Models\Option::class)
                <a href="{{ route('option.index') }}">option</a>
            @endcan
            @can('viewAny', \App\Models\Sku::class)
                <a href="{{ route('sku.index') }}">sku</a>
            @endcan
            @can('viewAny', \App\Models\User::class)
                <a href="{{ route('user.index') }}">user</a>
            @endcan
            @can('viewAny', \App\Models\Role::class)
                <a href="{{ route('role.index') }}">role</a>
            @endcan
            @can('reset-project', \App\Models\Image::class)
                <a href="{{ route('resetProject') }}">reset project</a>
            @endcan
            <x-my.a.info href="{{ route('setLocale', 'ru') }}">RU</x-my.a.info>
            <x-my.a.info href="{{ route('setLocale', 'en') }}">EN</x-my.a.info>
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
