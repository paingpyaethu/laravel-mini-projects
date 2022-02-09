<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {
       $users = User::all();
       return view('user-manager.index',compact('users'));
    }

    public function makeAdmin(Request $request)
    {
//       return $request;
       $currentUser = User::find($request->id);
       if ($currentUser->role == 1)
       {
          $currentUser->role = '0';
          $currentUser->update();
       }
       return redirect()->back()->with('toast',['icon'=>'success','title'=>'Role updated for '.$currentUser->name]);
    }

    public function banUser(Request $request)
    {
//       return $request;
       $currentUser = User::find($request->id);
       if ($currentUser->isBanned == 0)
       {
          $currentUser->isBanned = '1';
          $currentUser->update();
       }
       return redirect()->back()->with('toast',['icon'=>'success','title'=>$currentUser->name.' is Banned.']);
    }

   public function unBanUser(Request $request)
   {
//       return $request;
      $currentUser = User::find($request->id);
      if ($currentUser->isBanned == 1)
      {
         $currentUser->isBanned = '0';
         $currentUser->update();
      }
      return redirect()->back()->with('toast',['icon'=>'success','title'=>$currentUser->name.' is Restored.']);
   }
}
