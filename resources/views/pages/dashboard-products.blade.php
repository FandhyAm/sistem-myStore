@extends('layouts.dashboard')

@section('title')
Store Dashboard Product
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">My Products</h2>
      <p class="dashboard-subtittle">
        Manage it well and get money
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <a href="{{ route('dashboard-product-create') }}" class="btn btn-success">Add New Product</a>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/dashboard-products-details.html" class="card card-dashboard-product d-block">
            <div class="card-body">
              <img class="w-100 mb-2" src="/images/products-details/product 1.png" alt="">
              <div class="product-tittle">Shirup marjan </div>
              <div class="product-category">
                Foods
              </div>
            </div>
          </a>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/dashboard-products-details.html" class="card card-dashboard-product d-block">
            <div class="card-body">
              <img class="w-100 mb-2" src="/images/products-details/product 2.png" alt="">
              <div class="product-tittle">Shirup marjan </div>
              <div class="product-category">
                Foods
              </div>
            </div>
          </a>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/dashboard-products-details.html" class="card card-dashboard-product d-block">
            <div class="card-body">
              <img class="w-100 mb-2" src="/images/products-details/product 3.png" alt="">
              <div class="product-tittle">Shirup marjan </div>
              <div class="product-category">
                Foods
              </div>
            </div>
          </a>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/dashboard-products-details.html" class="card card-dashboard-product d-block">
            <div class="card-body">
              <img class="w-100 mb-2" src="/images/products-details/product 4.png" alt="">
              <div class="product-tittle">Shirup marjan </div>
              <div class="product-category">
                Foods
              </div>
            </div>
          </a>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <a href="/dashboard-products-details.html" class="card card-dashboard-product d-block">
            <div class="card-body">
              <img class="w-100 mb-2" src="/images/products-details/product 5.png" alt="">
              <div class="product-tittle">Shirup marjan </div>
              <div class="product-category">
                Foods
              </div>
            </div>
          </a>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
