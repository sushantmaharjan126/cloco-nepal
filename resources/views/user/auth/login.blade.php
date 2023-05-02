@extends('user.auth.layout.app')
@section('title')User | Login @endsection


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

                    <form id="formAuthentication" class="mb-3" action="{{ url('user/login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email"
                            placeholder="Enter your email" value="{{ old('email') }}" autofocus/>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="{{ route('user.password.request') }}">
                                    <small>Forgot Password?</small>
                                </a>
                                </div>
                                <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            
                        </div>
                        
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <span>Sign Up</span>
                        <a href="{{ route('user.register') }}">
                          <span>Create an account</span>
                        </a>
                    </p>
                </div>
                </div>
                <!-- /Register -->
                
            </div>
            </div>
        </div>

        <!-- / Content -->
    @endsection