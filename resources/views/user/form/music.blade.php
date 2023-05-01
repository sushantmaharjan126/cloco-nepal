@extends('user.layout.master')

    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">@if(isset($music)) Edit @else Add @endif Music</h4>
        <?php
          if(isset($music)) {
            $action = route('user.musics.update', ['music' => $music[0]->id]);
          } else {
            $action = route('user.musics.store');
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
                    <label for="Selectartist" class="form-label">Artist</label>
                    <select class="form-select  {{ $errors->has('artist') ? 'is-invalid' : '' }}" id="Selectartist" name="artist" aria-label="Default select">
                      <option selected disabled>Select Artist</option>
                      @foreach($artists as $row)
                        <option value="{{ $row->id }}" <?php if(isset($music) && $music[0]->artist_id == $row->id) { echo 'selected'; } ?>>{{ ucwords($row->name) }}</option>
                      @endforeach
                    </select>
                    @error('artist')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="<?php if(isset($music)) { echo $music[0]->title; } else { echo old('title'); } ?>" />
                    @error('title')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="album_name">Album Name</label>
                      <input type="text" class="form-control {{ $errors->has('album_name') ? 'is-invalid' : '' }}" id="album_name" name="album_name" value="<?php if(isset($music)) { echo $music[0]->album_name; } else { echo old('album_name'); } ?>" />
                      @error('album_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label for="Select1" class="form-label">Genre</label>
                    <select class="form-select  {{ $errors->has('genre') ? 'is-invalid' : '' }}" id="Select1" name="genre" aria-label="Default select">
                      <option selected disabled>Select Genre</option>
                      <option value="MB" <?php if(isset($music) && $music[0]->genre == 'MB') { echo 'selected'; } ?>>MB</option>
                      <option value="Country" <?php if(isset($music) && $music[0]->genre == 'Country') { echo 'selected'; } ?>>Country</option>
                      <option value="Classic" <?php if(isset($music) && $music[0]->genre == 'Classic') { echo 'selected'; } ?>>Classic</option>
                      <option value="Rock" <?php if(isset($music) && $music[0]->genre == 'Rock') { echo 'selected'; } ?>>Rock</option>
                      <option value="Jazz" <?php if(isset($music) && $music[0]->genre == 'Jazz') { echo 'selected'; } ?>>Jazz</option>
                    </select>
                    @error('genre')
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
                  <a href="{{ route('user.musics.get') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary">@if(isset($music)) Update @else Submit @endif</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
    </div>
    @endsection