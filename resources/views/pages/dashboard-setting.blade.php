@extends('layouts.dashboard')

@section('title')
Store Dashboard Setting
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">Store Settings</h2>
      <p class="dashboard-subtittle">
        Make store that profitable
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" v-if="is_store_open">
                      <label for="toko">Nama toko</label>
                      <input type="text" class="form-control" id="toko" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" v-if="is_store_open">
                      <label for="kategori">Kategori</label>
                      <select name="category" class="form-control">
                        <option value="" disabled>Pilih kategori</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="store_name">Store Status</label>
                      <p class="text-muted">Apakah anda juga ingin membuka toko?
                      </p>
                      <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue" value="true">
                        <label for="openStoreTrue" class="custom-control-label">
                          Buka
                        </label>
                      </div>
                      <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreFalse" value="false">
                        <label for="openStoreFalse" class="custom-control-label">
                          Sementara Tutup
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button type="submit" class="btn btn-success px-5">Save
                      Now</button>
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
@endsection


