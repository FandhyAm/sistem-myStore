@extends('layouts.dashboard')

@section('title')
Store Dashboard Transactions Details
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">#STORE0839</h2>
      <p class="dashboard-subtittle">
        Transactions / Details
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img src="/images/products-details/porduct-details-dashboard.png" alt="" class="w-100 mb-3">
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Customer Name
                      </div>
                      <div class="product-subtittle">
                        Angga Risky
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Product Name
                      </div>
                      <div class="product-subtittle">
                        Shirup Marzzan
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Date of Transaction
                      </div>
                      <div class="product-subtittle">
                        12 Januari, 2020
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Payment Status
                      </div>
                      <div class="product-subtittle text-danger">
                        Pending
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Total Amount
                      </div>
                      <div class="product-subtittle">
                        $280,409
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Mobile
                      </div>
                      <div class="product-subtittle">
                        +628 2020 11111
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-4 mb-4">
                <h5>Shipping Information</h5>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      Address I
                    </div>
                    <div class="product-subtittle">
                      Setra Duta Cemara
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      Address II
                    </div>
                    <div class="product-subtittle">
                      Blok B2 No. 34
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      Province
                    </div>
                    <div class="product-subtittle">
                      West Java
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      City
                    </div>
                    <div class="product-subtittle">
                      Bandung
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      Postal Code
                    </div>
                    <div class="product-subtittle">
                      123999
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="product-tittle">
                      Country
                    </div>
                    <div class="product-subtittle">
                      Indonesia
                    </div>
                  </div>
                  <div class="col-12 col-md-3">
                    <div class="product-tittle">
                      Shipping status
                    </div>
                    <select name="status" id="status" class="form-control" v-model="status">
                      <option value="PENDING">Pending</option>
                      <option value="SHIPPING">Shipping</option>
                      <option value="SUCCESS">Success</option>
                    </select>
                  </div>
                  <template v-if="status === 'SHIPPING' ">
                    <div class="col-md-3">
                      <div class="product-tittle">Input Resi</div>
                      <input type="text" class="form-control" name="resi" v-model="resi">
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-success btn-block mt-4 px-3">Update Resi</button>
                    </div>
                  </template>
                </div>
                <div class="row">
                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success mt-5 btn-lg">Save Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js">
  </script>
  <script>
    var transactionDetails = new Vue({
      el: '#transactionDetails'
      , data: {
        status: 'SHIPPING'
        , resi: 'JNE20839149021029301231'
      , }
    , });

  </script>
@endpush  
