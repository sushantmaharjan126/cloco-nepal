@extends('user.auth.layout.app')
@section('title')User | Forget Password @endsection


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
                   
                    @include('user.layout.alert')
                    <form id="formAuthentication" class="mb-3" action="{{ route('user.password.email') }}" method="POST">
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