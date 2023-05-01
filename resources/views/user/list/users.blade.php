@extends('user.layout.master')

    @section('content')

         <!-- Bordered Table -->
         <div class="card">
           
            <div class="title-section d-flex mt-3 align-items-center">
                <h5 class="text-uppercase mb-0 pr-2">Users List</h5>
                <a href="{{ route('user.users.create') }}" class="btn btn-primary text-uppercase" style="margin-left:30px;">Add User</a>
     
              </div>
              @include('user.layout.alert')
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>DOB</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z = 0; ?>
                    @foreach($users as $user)
                        <tr>
                            <td>{{((($users->currentPage()-1) * $users->perPage() )+1) + $z}}</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->phone }}
                        </td>
                        <td>{{ Carbon::parse($user->dob)->format('M d, Y') }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            
                            <a href="{{ route('user.users.edit', ['user' => $user->id]) }}" title="Edit"><i class="bx bx-edit-alt me-1"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ route('user.users.destory', ['user' => $user->id]) }}" title="Delete"><i class="bx bx-trash me-1"></i></a>
                        </td>
                        </tr>
                        <?php $z++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block text-center card-footer">
                {{ $users->links() }}
            </div>
            </div>
          </div>
          <!--/ Bordered Table -->

    @endsection