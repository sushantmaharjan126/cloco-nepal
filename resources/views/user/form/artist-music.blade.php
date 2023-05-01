@extends('user.layout.master')

    @section('content')

         <!-- Bordered Table -->
        <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">{{ $artist[0]->name }} Musics List</h5>
                @if(isset($music))
                <div class="page-title-actions">
                    <a href="{{route('user.artists.musics', ['artist' => $artist[0]->id])}}" class="btn btn-dark">
                        Musics List
                    </a>
                </div>
            @endif
              </div>
                <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Album Name</th>
                        <th>Genre</th>
                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $z = 0; ?>
                        @foreach($musics as $row)
                            <tr>
                                <td>{{((($musics->currentPage()-1) * $musics->perPage() )+1) + $z}}</td>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucwords($row->title) }}</strong>
                            </td>
                            <td>{{ $row->album_name }}</td>
                            <td>{{ $row->genre }}</td>
                            <td>
                            
                                <a href="{{ route('user.artists.musics.edit', ['artist' => $artist[0]->id, 'music' => $row->id]) }}" title="Edit"><i class="bx bx-edit-alt me-1"></i></a>
                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('user.artists.musics.destory', ['id' => $row->id]) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                            </td>
                            </tr>
                            <?php $z++; ?>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer">
                    {{ $musics->links() }}
                </div>
            </div>
            <?php
              if(isset($music)) {
                $action = route('user.artists.musics.update', ['artist' => $artist[0]->id, 'music' => $music[0]->id]);
              } else {
                $action = route('user.artists.musics.store', ['artist' => $artist[0]->id]);
              }
            ?>
            <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    @include('user.layout.alert')
                    <div class="card-body">
                      <form action="{{ $action }}" method="POST">
                        @csrf
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
      
                        
                        <button type="submit" class="btn btn-primary">@if(isset($music)) Update @else Submit @endif</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
        </div>
          <!--/ Bordered Table -->



    @endsection