@extends('layouts.admin')

@section('title')
Store Admin
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">Admin Dashboard</h2>
      <p class="dashboard-subtittle">
        This is BWAStore adminisator panel
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-tittle">Customer</div>
              <div class="dashboard-card-subtittle">
                {{ $customer }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-tittle">Revenue</div>
              <div class="dashboard-card-subtittle">
                ${{ $revenue }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-2">
            <div class="card-body">
              <div class="dashboard-card-tittle">Transaction</div>
              <div class="dashboard-card-subtittle">
                {{ $transactions }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
