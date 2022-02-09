@extends('layouts.app')

@section("title") Profile @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12 col-md-6 col-xl-5">
         <div class="card shadow">
            <div class="card-body">
               <div class="text-center">
                  <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/img/default_user.png') }}" class="w-50 rounded-circle my-3" alt="">
                  <h3 class="mb-0 font-weight-bold">
                     {{ Auth::user()->name }}
                  </h3>
                  <small class="text-black-50">
                     {{ Auth::user()->email }}
                  </small>
               </div>
               <hr>
               <div class="">
                  <p class="mt-3">
                     <span class="mr-3 font-weight-bold">
                        <i class="feather-phone text-success"></i> Phone
                     </span>
                     <span>{{ Auth::user()->phone }}</span>
                  </p>
                  <p>
                     <span class="mr-3 font-weight-bold">
                        <i class="feather-map text-danger"></i> Address
                     </span>
                     <span>{{ Auth::user()->address }}</span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection