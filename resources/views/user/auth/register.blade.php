@extends('user.auth.layout.app')
@section('title')Admin | Login @endsection


    @section('content')

      <!-- Content -->

      <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  
                </div>
                <!-- /Logo -->
                

                <form id="formAuthentication" class="mb-3" action="{{ url('user/register') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="username" class="form-label">Frist Name *</label>
                    <input
                      type="text"
                      class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                      id="first_name"
                      name="first_name"
                      value="{{ old('first_name') }}"
                      placeholder="Enter your username"
                      autofocus
                    />
                    @error('first_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Last Name *</label>
                    <input
                      type="text"
                      class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                      id="last_name"
                      name="last_name"
                      value="{{ old('last_name') }}"
                      placeholder="Enter your username"
                      autofocus
                    />
                    @error('last_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label {{ $errors->has('password') ? 'is-invalid' : '' }}" for="password">Password *</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3 form-password-toggle">
                    <label class="form-label {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" for="password_confirmation"> Confirm Password *</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password_confirmation"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password_confirmation')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" />
                  </div>

                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Enter your address" />
                  </div>

                  <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-label">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="O">Other</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth *</label>
                    <input type="date" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" id="dob" name="dob" value="{{ old('dob') }}" placeholder="Enter your DOB" />
                    @error('dob')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  
                  <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
                </form>

                <p class="text-center">
                  <span>Already have an account?</span>
                  <a href="{{ route('user.login') }}">
                    <span>Sign in instead</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>

      <!-- / Content -->
    @endsection

    