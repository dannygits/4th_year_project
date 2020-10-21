@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css')}}">
@endsection

@section('content')

@component('components.breadcrumbs')
    <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span>Shop</span>
@endcomponent

<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

    <div class="products-section container">
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>
                @foreach ($categories as $category)
                <li class="{{ setActiveCategory($category->slug)}}"><a href="{{ route('shop', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
                <!-- <li><a href="#">laptops</a></li>
                <li><a href="#">desktops</a></li>
                <li><a href="#">mobiles</a></li>
                <li><a href="#">tablets</a></li>
                <li><a href="#">tvs</a></li>
                <li><a href="#">digital cameras</a></li>
                <li><a href="#">appliances</a></li> 
            </ul>

            <h3>By Price</h3>
            <ul>
                <li><a href="#">sh0 - sh50000</a></li>
                <li><a href="#">sh50001 - sh100000</a></li>
                <li><a href="#">sh100001+</a></li>
            </ul> -->
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong class="bold">Price:</strong>
                    <a href="{{ route ('shop', ['category' => request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route ('shop', ['category' => request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                </div>
            </div>
            <div class="products text-center">

                @forelse ($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">{{$product->presentPrice()}}</div>
                    </div>
                    
                @empty
                    <div style="text-align:left">No Items Found</div>
                @endforelse
            </div> <!-- end products -->
            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>
@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection