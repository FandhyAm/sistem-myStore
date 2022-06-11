@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@section('content')
<div class="page-content page-home">
    <!-- trend categories -->
    <section class="store-trend-categories ">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementCategory = 0;
                @endphp
                @forelse ($categories as $category)
                <div class="col-6 col-md3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+= 100 }}">
                    <a href="{{ route('category-detail', $category->slug) }}" class="component-categories d-block">
                        <div class="categorie-image">
                            <img src="{{ Storage::url($category->photo) }}" alt="gadget" class="w-100">
                        </div>
                        <p class="categories-text">
                            {{ $category->name }}
                        </p>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    <h5>No Categories Available</h5>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- new product -->
    <section class="store-new-product">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Products</h5>
                </div>
            </div>
            <div class="row">
                @php
                $incrementProduct = 0;
                @endphp
                @forelse ($products as $product )
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+= 100 }}">
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="@if($product->galleries->count())
                                                    background-image: url('{{ Storage::url($product->galleries->first()->photo) }}')
                                                @else
                                                background-color: #eee
                                                @endif">
                            </div>
                        </div>
                        <div class="products-text">
                            {{ $product->name }}
                        </div>
                        <div class="products-price">
                            Rp{{ $product->price }}
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                    <h5>No Products Available</h5>
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 mt-4 d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection