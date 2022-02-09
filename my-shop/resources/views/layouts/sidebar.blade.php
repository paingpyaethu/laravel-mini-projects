<div class="col-12 col-w-1 vh-100 sidebar">
   <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
      <div class="d-flex align-items-center">
         <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
            <i class="feather-shopping-bag text-white h4 mb-0"></i>
         </span>
         <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
      </div>
      <button class="hide-sidebar-btn btn d-block d-lg-none">
         <i class="feather-x-circle text-primary" style="font-size: 2em;"></i>
      </button>
   </div>
   <div class="nav-menu">
      <ul>
         <x-menu-spacer></x-menu-spacer>

         <x-menu-item link="{{ route('home') }}" class="feather-home" name="Dashboard"></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- User Management ---------------}}
         @if(Auth::user()->role == 0)
         <x-menu-title title="User Management"></x-menu-title>
         <x-menu-item name="Users" class="feather-users" link="{{ route('user-manager.index') }}"></x-menu-item>

         <x-menu-spacer></x-menu-spacer>
         @endif

         {{--------------- User Profile ---------------}}
         <x-menu-title title="User Profile"></x-menu-title>
         <x-menu-item name="Your Profile" class="feather-user" link="{{ route('profile') }}"></x-menu-item>
         <x-menu-item name="Change Password" class="feather-refresh-ccw" link="{{ route('profile.edit.password') }}"></x-menu-item>
         <x-menu-item name="Update Info" class="feather-info" link="{{ route('profile.edit.name.email') }}"></x-menu-item>
         <x-menu-item name="Update photo" class="feather-image" link="{{ route('profile.edit.photo') }}"></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- Article Manager ---------------}}
         <x-menu-title title="Article Manager"></x-menu-title>
         <x-menu-item class="feather-plus-circle" name="Create Article" link=""></x-menu-item>
         <x-menu-item class="feather-list" name="Article List" link="" counter=""></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- Logout Button ---------------}}
         <li class="menu-item">
            <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
               Logout
            </a>
         </li>

      </ul>
   </div>
</div>