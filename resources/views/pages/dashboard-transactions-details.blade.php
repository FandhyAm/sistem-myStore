@extends('layouts.dashboard')

@section('title')
Store Dashboard Transactions Details
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">#{{ $transaction->code }}</h2>
      <p class="dashboard-subtittle">
        Transactions Details
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card mt-4">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img src="{{ Storage::url($transaction->product->galleries->first()->photo ?? '') }}" alt=""
                    class="w-100 mb-3">
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Customer Name
                      </div>
                      <div class="product-subtittle">
                        {{ $transaction->transaction->user->name }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Product Name
                      </div>
                      <div class="product-subtittle">
                        {{$transaction->product->name}}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Date of Transaction
                      </div>
                      <div class="product-subtittle">
                        {{ $transaction->transaction->created_at->format('d M Y') }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Payment Status
                      </div>
                      <div class="product-subtittle text-danger">
                        {{$transaction->transaction->transactions_status}}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Total Amount
                      </div>
                      <div class="product-subtittle">
                        Rp{{ number_format($transaction->transaction->total_price) }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-tittle">
                        Mobile
                      </div>
                      <div class="product-subtittle">
                        {{ $transaction->transaction->user->phone_number }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <form action="{{ route('dashboard-transactions-update', $transaction->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-tittle">
                          Address II
                        </div>
                        <div class="product-subtittle">
                          {{ $transaction->transaction->user->address_two }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-tittle">
                          Province
                        </div>
                        <div class="product-subtittle">
                          {{App\Models\Province::find($transaction->transaction->user->provinces_id)->name}}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-tittle">
                          City
                        </div>
                        <div class="product-subtittle">
                          {{App\Models\Regency::find($transaction->transaction->user->regencies_id)->name}}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-tittle">
                          Postal Code
                        </div>
                        <div class="product-subtittle">
                          {{$transaction->transaction->user->zip_code}}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-tittle">
                          Country
                        </div>
                        <div class="product-subtittle">
                          {{$transaction->transaction->user->country}}
                        </div>
                      </div>
                      <div class="col-12 col-md-3">
                        <div class="product-tittle">
                          Shipping status
                        </div>
                        <select name="shipping_status" id="status" class="form-control" v-model="status">
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
              </form>
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
        status: '{{ $transaction->shiping_status }}'
        , resi: '{{ $transaction->resi }}'
      , }
    , });

</script>
@endpush