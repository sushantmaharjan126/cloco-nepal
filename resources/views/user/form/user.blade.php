@extends('user.layout.master')

    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">@if(isset($user)) Edit @else Add @endif User</h4>
        <?php
          if(isset($user)) {
            $action = route('user.users.update', ['user' => $user[0]->id]);
          } else {
            $action = route('user.users.store');
          }
        ?>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
          <div class="col-xl">
            <div class="card mb-4">
              @include('user.layout.alert')
              <div class="card-body">
                <form action="{{ $action }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label" for="first-name">First Name</label>
                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first-name" name="first_name" placeholder="John" value="<?php if(isset($user)) { echo $user[0]->first_name; } else { echo old('first_name'); } ?>" />
                    @error('first_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="last-name">Last Name</label>
                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last-name" name="last_name" placeholder="Doe" value="<?php if(isset($user)) { echo $user[0]->last_name; } else { echo old('last_name'); } ?>" />
                    @error('last_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  
                  <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group input-group-merge">
                      <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="john.doe" aria-label="john.doe" aria-describedby="email2" value="<?php if(isset($user)) { echo $user[0]->email; } else { echo old('email'); } ?>"/>
                      <span class="input-group-text" id="email2">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
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
                    </div>
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
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
                    </div>
                    @error('password_confirmation')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input type="text" id="phone" name="phone" class="form-control phone-mask" placeholder="658 799 8941" value="<?php if(isset($user)) { echo $user[0]->phone; } else { echo old('phone'); } ?>"/>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-contro {{ $errors->has('dob') ? 'is-invalid' : '' }}" placeholder="01/01/2023" value="<?php if(isset($user)) { echo $user[0]->dob; } else { echo old('dob'); } ?>"/>
                    @error('dob')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="221B Baker Street, Marylebone, London, UK" value="<?php if(isset($user)) { echo $user[0]->address; } else { echo old('address'); } ?>"/>
                  </div>

                  <div class="mb-3">
                    <label for="Select1" class="form-label">Gender</label>
                    <select class="form-select  {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="Select1" name="gender" aria-label="Default select">
                      <option selected disabled>Select Gender</option>
                      <option value="M" <?php if(isset($user) && $user[0]->gender == 'M') { echo 'selected'; } ?>>Male</option>
                      <option value="F" <?php if(isset($user) && $user[0]->gender == 'F') { echo 'selected'; } ?>>Female</option>
                      <option value="O" <?php if(isset($user) && $user[0]->gender == 'O') { echo 'selected'; } ?>>Other</option>
                    </select>
                    @error('gender')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- <div class="mb-3">
                    <label class="form-label" for="basic-default-message">Message</label>
                    <textarea
                      id="basic-default-message"
                      class="form-control"
                      placeholder="Hi, Do you have a moment to talk Joe?"
                    ></textarea>
                  </div> --}}
                  <a href="{{ route('user.users.get') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary">@if(isset($user)) Update @else Submit @endif</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
    </div>
    @endsection