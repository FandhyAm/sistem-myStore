@extends('layouts.auth')

@section('content')
<!-- login -->
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-4 mt-2">
                    <h2>Memulai untuk jual beli <br>
                        dengan cara terbaru</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" v-model="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- EMAIL ADDRESS --}}
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" id="email" v-model="email" @change="checkEmail()"
                                class="form-control @error('email') is-invalid @enderror"
                                :class="{ 'is-invalid' :  this.email_unavailable}" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- PASSWORD --}}
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="store_name">Store</label>
                            <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue"
                                    v-model="is_store_open" :value="true">
                                <label for="openStoreTrue" class="custom-control-label">
                                    Iya, boleh
                                </label>
                            </div>
                            <div class="custom-control custom-control-inline custom-radio">
                                <input type="radio" class="custom-control-input" name="is_store_open"
                                    id="openStoreFalse" v-model="is_store_open" :value="false">
                                <label for="openStoreFalse" class="custom-control-label">
                                    Enggak, makasih
                                </label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label for="store_name">Nama toko</label>
                            <input type="text" class="form-control" id="store_name" v-model="store_name"
                                name="store_name" required autocomplete autofocus />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Kategori</label>
                            <select name="categories_id" class="form-control">
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4"
                            :disable="this.email_unavailable">Sign Up Now</button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">Back to Sign In</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();
            },
            methods: {
                checkEmail: function() {
                    var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                })
                .then(function (response) {
                    if(response.data == 'Available'){
                        self.$toasted.show(
                        "Email anda tersedia! Silahkan lanjut ke langkah selanjutnya", {
                        position: 'top-center',
                        className: "rounded",
                        duration: 1000
                        }
                        );
                        self.email_unavailable = false;
                    }else{
                        self.$toasted.error(
                            "Maaf, tampaknya email sudah terdatar pada sistem kami.", {
                            position: 'top-center',
                            className: "rounded",
                            duration: 1000
                            }
                            );
                        self.email_unavailable = true;
                    }
                // handle success
                console.log(response);
                });
                }
            },
            data() {
                return {
                    name: 'Angga Hazza Sett ',
                    email: 'kamujagoan@bwa.id',
                    is_store_open: true,
                    store_name: '',
                    email_unavailable: false,
                }
            }
        })
</script>
@endpush