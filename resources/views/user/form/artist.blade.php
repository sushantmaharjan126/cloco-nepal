@extends('user.layout.master')

    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">@if(isset($artist)) Edit @else Add @endif artist</h4>
        <?php
          if(isset($artist)) {
            $action = route('user.artists.update', ['artist' => $artist[0]->id]);
          } else {
            $action = route('user.artists.store');
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
                    <label class="form-label" for="first-name">Name</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="first-name" name="name" placeholder="John Doe" value="<?php if(isset($artist)) { echo $artist[0]->name; } else { echo old('name'); } ?>" />
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  
                  <div class="mb-3">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-contro {{ $errors->has('dob') ? 'is-invalid' : '' }}" placeholder="01/01/2023" value="<?php if(isset($artist)) { echo $artist[0]->dob; } else { echo old('dob'); } ?>"/>
                    @error('dob')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="221B Baker Street, Marylebone, London, UK" value="<?php if(isset($artist)) { echo $artist[0]->address; } else { echo old('address'); } ?>"/>
                  </div>

                  <div class="mb-3">
                    <label for="Select1" class="form-label">Gender</label>
                    <select class="form-select  {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="Select1" name="gender" aria-label="Default select">
                      <option selected disabled>Select Gender</option>
                      <option value="M" <?php if(isset($artist) && $artist[0]->gender == 'M') { echo 'selected'; } ?>>Male</option>
                      <option value="F" <?php if(isset($artist) && $artist[0]->gender == 'F') { echo 'selected'; } ?>>Female</option>
                      <option value="O" <?php if(isset($artist) && $artist[0]->gender == 'O') { echo 'selected'; } ?>>Other</option>
                    </select>
                    @error('gender')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="first_release_year">Date of First Release</label>
                    <input type="date" id="first_release_year" name="first_release_year" class="form-contro {{ $errors->has('first_release_year') ? 'is-invalid' : '' }}" placeholder="01/01/2023" value="<?php if(isset($artist)) { echo $artist[0]->first_release_year; } else { echo old('first_release_year'); } ?>"/>
                    @error('dob')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="no_of_album_release">No. of Album Released</label>
                    <input type="number" id="no_of_album_release" name="no_of_album_release" class="form-control {{ $errors->has('no_of_album_release') ? 'is-invalid' : '' }}" placeholder="0" value="<?php if(isset($artist)) { echo $artist[0]->no_of_album_release; } else { echo old('no_of_album_release'); } ?>" min="0"/>
                    @error('no_of_album_release')
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
                  <a href="{{ route('user.artists.get') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary">@if(isset($artist)) Update @else Submit @endif</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
    </div>
    @endsection