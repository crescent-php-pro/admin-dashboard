<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('pages.home');
    }

    public function userProfile()
    {
        return view('pages.userProfile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
      $datas = user::all();
      return view('pages.adminHome',compact('datas'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminProfile()
    {
      $datas = user::all();
      //return $datas;
      return view('pages.adminProfile',compact('datas'));
    }

    public function adminViewProfile($id)
    {
      $datas = user::find($id);
      return view('pages.pop-profile',compact('datas'));
    }

    public function updateProfile(Request $request, $id)
     {
         $datas = user::find($id);
         $datas->firstname = $request->input('firstname');
         $datas->lastname = $request->input('lastname');
         $datas->email = $request->input('email');
         $datas->phone = $request->input('phone');
         $datas->update();
         return Redirect()->back()->with('status' , 'Profile Updated Successfully');
     }
     public function updateProfilePicture()
     {
       $request = request();
       if ($request->file('updatePicture') != ""){
       $imageName = time().rand(99,999).'.'.$request->updatePicture->extension();
       $request->updatePicture->move(public_path('assets/dist/img/profile/'), $imageName);

         return Redirect()->back()->with('status' , 'Profile Updated Successfully');
       }
       return Redirect()->back()->with('error' , 'Failed');
     }

     public function ChangePassword(Request $request)
     {
       $request->validate([
         'current_password' => ['required', new MatchOldPassword],
         'new_password' => ['required'],
         'new_confirm_password' => ['same:new_password'],
       ]);

       User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

       return Redirect()->back()->with('status' , 'Password Changed Successfully');
     }

     public function adminAddNews()
     {
       return view('pages.add-news');
     }

     public function destroyUser($id)
      {
          $datas = user::find($id);
          $datas->delete();
          return redirect()->back()->with('status','User Deleted Successfully');
      }
}
