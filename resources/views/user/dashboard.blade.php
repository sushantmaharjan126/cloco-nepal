 @extends('user.layout.master')

  @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-md-6 col-xl-4">
          <div class="card bg-primary text-white mb-3">
            <div class="card-header">Total Users</div>
            <div class="card-body">
              <h5 class="card-title text-white">{{ $user }}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-secondary text-white mb-3">
            <div class="card-header">Total Artist</div>
            <div class="card-body">
              <h5 class="card-title text-white">{{ $artist }}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card bg-success text-white mb-3">
            <div class="card-header">Total Musics</div>
            <div class="card-body">
              <h5 class="card-title text-white">{{ $music }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection