@extends('layouts.app')

@section('title') User Manager @stop

@section('content')

   <x-bread-crumb>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h4>
                     <i class="feather-users"></i>
                     Users List
                  </h4>
                  <table class="table table-hover">
                     <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($users as $user)
                        <tr>
                           <td>{{ $user->id }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                           <td>{{ $user->role ? "User" : "Admin" }}</td>
                           <td>
                              @if($user->role == 1)
                                 <button class="btn btn-sm btn-outline-warning"
                                         onclick="changePassword({{ $user->id }})">Change Password</button>
                                 @if($user->isBanned == 0)
                                    <form action="{{ route('user-manager.makeAdmin') }}" class="d-inline-block"
                                          id="form{{ $user->id }}" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{ $user->id }}">
                                       <button type="button" class="btn btn-sm btn-outline-info"
                                               onclick="return askConfirm({{ $user->id }})">
                                          Make Admin
                                       </button>
                                    </form>

                                    <form action="{{ route('user-manager.banUser') }}" class="d-inline-block"
                                          id="banForm{{ $user->id }}" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{ $user->id }}">
                                       <button type="button" class="btn btn-sm btn-outline-danger"
                                               onclick="return banUser({{ $user->id }})">
                                          Ban User
                                       </button>
                                    </form>


                                 @else
                                    <form action="{{ route('user-manager.unBanUser') }}" class="d-inline-block"
                                          id="unBanForm{{ $user->id }}" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{ $user->id }}">
                                       <button type="button" class="btn btn-sm btn-outline-success"
                                               onclick="return unBanUser({{ $user->id }})">
                                          Restore
                                       </button>
                                    </form>
                                    <span class="badge badge-danger">Banned</span>
                                 @endif
                              @endif
                           </td>
                           <td>
                              <small>
                                 <i class="feather-calendar"></i>
                                 {{ $user->created_at -> format('d M Y') }}
                                 <br>
                                 <i class="feather-clock"></i>
                                 {{ $user->created_at -> format('h:i A') }}
                              </small>
                           </td>
                           <td>
                              <small>
                                 <i class="feather-calendar"></i>
                                 {{ $user->updated_at -> format('d M Y') }}
                                 <br>
                                 <i class="feather-clock"></i>
                                 {{ $user->updated_at -> format('h:i A') }}
                              </small>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
            </div>

         </div>
      </div>
   </div>

@endsection
@section('foot')
   <script>
      function askConfirm(id) {
         Swal.fire({
            title: 'Are you sure to change admin role?',
            text: "role ?????????????????????????????????????????? admin ??????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire(
                  'Role Updated!',
                  '??????????????????????????????????????????????????????????????? ?????????????????????????????????????????????',
                  'success'
               )
               setTimeout(function () {
                  $('#form'+id).submit();
               },1300)
            }
         })
      }

      function banUser(id) {
         Swal.fire({
            title: 'Are you sure to ban {{ $user->name }}?',
            text: "Banned User will be deleted permanently.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire(
                  'User Banned!',
                  '???????????????????????????????????????????????????????????? ????????????????????????????????????????????????',
                  'success'
               )
               setTimeout(function () {
                  $('#banForm'+id).submit();
               },1300)
            }
         })
      }

      function unBanUser(id) {
         Swal.fire({
            title: 'Are you sure to restore {{ $user->name }}?',
            text: "{{ $user->name }} will be active.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire(
                  'User Unbanned!',
                  'User Account will be restored successfully.',
                  'success'
               )
               setTimeout(function () {
                  $('#unBanForm'+id).submit();
               },1300)
            }
         })
      }


      function changePassword(id) {
         let url = "{{ route('user-manager.changeUserPassword') }}";
         Swal.fire({
            title: 'Change Password for {{ $user->name }}',
            input: 'password',
            inputAttributes: {
               autocapitalize: 'off',
               required: 'required',
               minLength: 8
            },
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            showLoaderOnConfirm: true,

            preConfirm: function (newPassword) {
               // console.log(id,newPassword);
               $.post(url,{
                  id: id,
                  password: newPassword,
                  _token: "{{ csrf_token() }}"
               }).done(function (data) {
                  if(data.status == 200) {
                     Swal.fire('Congratulation', data.message, 'success')
                  }else {
                     console.log(data);
                     Swal.fire(
                        'Error',
                        data.message.password[0],
                        'error'
                     )
                  }
               })
            }
         })
      }

   </script>
@stop