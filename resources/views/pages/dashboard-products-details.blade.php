@extends('layouts.dashboard')

@section('title')
Store Dashboard Product Detail
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-tittle">Shirup Marzan</h2>
      <p class="dashboard-subtittle">
        Product Details
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
                      <label for="product">Product Name</label>
                      <input type="text" class="form-control" id="product" value="Papel La Casa" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" v-if="is_store_open">
                      <label for="number">Price</label>
                      <input type="text" class="form-control" id="number" value="$100.00" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" v-if="is_store_open">
                      <label for="category">Category</label>
                      <select name="category" class="form-control" id="category">
                        <option value="">
                          Shipping
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" v-if="is_store_open">
                      <label for="describe">Description</label>
                      <textarea class="form-control" name="editor" id="editor" cols="30" rows="10">
                                  </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-success px-5 btn-block">Create New
                      Product</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="gallery-container">
                    <img src="/images/products-details/product 1.png" alt="" class="w-100">
                    <a href="#" class="gallery-delete">
                      <img src="/images/products-details/icon-delete.svg" alt="">
                    </a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="gallery-container">
                    <img src="/images/products-details/product 2.png" alt="" class="w-100">
                    <a href="#" class="gallery-delete">
                      <img src="/images/products-details/icon-delete.svg" alt="">
                    </a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="gallery-container">
                    <img src="/images/products-details/product 3.png" alt="" class="w-100">
                    <a href="#" class="gallery-delete">
                      <img src="/images/products-details/icon-delete.svg" alt="">
                    </a>
                  </div>
                </div>
                <div class="col-12">
                  <input type="file" id="file" style="display: none;" multiple>
                  <button class="btn btn-secondary btn-block mt-3" onclick="uploadThisFile()">Add Photo</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
  function uploadThisFile() {
    document.getElementById('file').click();
  }

</script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });

</script>
@endpush
