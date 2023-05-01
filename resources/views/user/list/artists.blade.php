@extends('user.layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Artist List</h5>
                <a href="{{ route('user.artists.create') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Add Artist</a>
     
              </div>
              @include('user.layout.alert')
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Name</th>
                      <th>DOB</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>First Release Year</th>
                      <th>No. of Album</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($artists as $artist)
                        <tr>
                            <td>{{((($artists->currentPage()-1) * $artists->perPage() )+1) + $z}}</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ ucwords($artist->name) }}</strong>
                        </td>
                        <td>{{ Carbon::parse($artist->dob)->format('M d, Y') }}</td>
                        <td>{{ $artist->gender }}</td>
                        <td>{{ $artist->address }}</td>
                        <td>{{ Carbon::parse($artist->first_release_year)->format('Y') }}</td>
                        <td>{{ $artist->no_of_album_release }}</td>
                        <td>
                          <a title="Itinerary" href="{{route('user.artists.musics', ['artist' => $artist->id])}}" class="border-0 btn-transition btn btn-outline-info">
                            <i class="bx bx-music me-1"></i>
                          </a>
                            <a href="{{ route('user.artists.edit', ['artist' => $artist->id]) }}" title="Edit"><i class="bx bx-edit-alt me-1"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('user.artists.destory', ['artist' => $artist->id]) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                        </td>
                        </tr>
                        <?php $z++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block text-center card-footer">
                {{ $artists->links() }}
            </div>
            </div>
          </div>
          <!--/ Bordered Table -->

    @endsection