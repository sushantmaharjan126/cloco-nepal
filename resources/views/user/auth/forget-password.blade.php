@extends('admin.auth.layout.app')
@section('title')Admin | Forget Password @endsection


    @section('content')
        <!-- Content -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                    
                    </div>
                    <!-- /Logo -->
                   
                    @include('admin.layout.alert')
                    <form id="formAuthentication" class="mb-3" action="{{ route('admin.password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email"
                            placeholder="Enter your email" value="{{ old('email') }}" autofocus/>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                </div>
                <!-- /Register -->
            </div>
            </div>
        </div>

        <!-- / Content -->
    @endsection