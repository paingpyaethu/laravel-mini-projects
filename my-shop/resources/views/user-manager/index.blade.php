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
                           <td>{{ $user->role }}</td>
                           <td></td>
                           <td>{{ $user->created_at }}</td>
                           <td>{{ $user->updated_at }}</td>
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

@stop