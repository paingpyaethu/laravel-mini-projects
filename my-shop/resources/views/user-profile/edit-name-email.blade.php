@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')

   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Name & Email</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12 col-md-6 col-xl-4">
         <div class="card mb-3 shadow">
            <div class="card-body">
               <form action="{{ route('profile.changeName') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="email">
                        <i class="mr-1 feather-user" style="font-size: 13px"></i>
                        Your Name
                     </label>
                     <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                     @error("name")
                     <small class="font-weight-bold text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                        <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                     </div>
                     <button type="submit" class="btn btn-primary">
                        <i class="mr-1 feather-refresh-ccw" style="font-size: 13px"></i>
                        Change Name
                     </button>
                  </div>
               </form>

            </div>
         </div>
         <div class="card shadow">
            <div class="card-body">
               <form action="{{ route('profile.changeEmail') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="email">
                        <i class="mr-1 feather-mail" style="font-size: 13px"></i>
                        Your Email
                     </label>
                     <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                     @error("email")
                     <small class="font-weight-bold text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                        <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                     </div>
                     <button type="submit" class="btn btn-primary">
                        <i class="mr-1 feather-refresh-ccw" style="font-size: 13px"></i>
                        Change Email
                     </button>
                  </div>
               </form>

            </div>
         </div>
      </div>

      <div class="col-12 col-md-6 col-xl-4">
         <div class="card mb-3 shadow">
            <div class="card-body">
               <form action="{{ route('profile.changePhone') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="phone">
                        <i class="mr-1 feather-phone" style="font-size: 13px"></i>
                        Your Phone
                     </label>
                     <input type="text" id="phone" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                     @error("phone")
                     <small class="font-weight-bold text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                        <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                     </div>
                     <button type="submit" class="btn btn-primary">
                        <i class="mr-1 feather-refresh-ccw" style="font-size: 13px"></i>
                        Change Phone
                     </button>
                  </div>
               </form>

            </div>
         </div>
         <div class="card shadow">
            <div class="card-body">
               <form action="{{ route('profile.changeAddress') }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label for="email">
                        <i class="mr-1 feather-map" style="font-size: 13px"></i>
                        Your Address
                     </label>
                     <textarea name="address" class="form-control" rows="5" >{{ auth()->user()->address }}</textarea>
                     @error("address")
                     <small class="font-weight-bold text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="d-flex justify-content-between align-items-center">
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4" required>
                        <label class="custom-control-label" for="customSwitch4">I'm Sure</label>
                     </div>
                     <button type="submit" class="btn btn-primary">
                        <i class="mr-1 feather-refresh-ccw" style="font-size: 13px"></i>
                        Change Address
                     </button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
@endsection