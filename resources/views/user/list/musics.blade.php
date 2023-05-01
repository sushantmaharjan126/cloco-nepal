@extends('user.layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Artist List</h5>
                <a href="{{ route('user.musics.create') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Add Music</a>
     
              </div>
              @include('user.layout.alert')
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Artist Name</th>
                      <th>Title</th>
                      <th>Album Name</th>
                      <th>Genre</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($musics as $music)
                        <tr>
                            <td>{{((($musics->currentPage()-1) * $musics->perPage() )+1) + $z}}</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucwords($music->artist_name) }}</strong>
                        </td>
                        <td>{{ ucwords($music->title) }}</td>
                        <td>{{ $music->album_name }}</td>
                        <td>{{ $music->genre }}</td>
                        <td>
                          
                            <a href="{{ route('user.musics.edit', ['music' => $music->id]) }}" title="Edit"><i class="bx bx-edit-alt me-1"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('user.musics.destory', ['music' => $music->id]) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
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
          </div>
          <!--/ Bordered Table -->

    @endsection