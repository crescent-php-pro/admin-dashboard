<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\news;
use App\models\user;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = news::all();
      $data = news::paginate(10);
      return view('pages.news', compact('data'));
    }
    public function AddNews()
    {
      return view('pages.add-news');
    }
    public function viewNews($id)
    {
      $data = news::find($id);
      return view('pages.view-news', compact('data'));
    }
    /**
     * download file
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Auth\Access\Response
    */
    public function download(Request $request, $id)
    {
      $data = news::find($id);
      $path = public_path('assets/dist/img/news/attachments/'.$data->attachment);
      $headers  = ['Content-Type: image/jpg'];
      $fileName = $data->attachment;
      return response()->download($path, $fileName, $headers);
    }
    public function emailMe()
    {
        try {
          $data = news::all();
          Mail::send(new NotifyMail());
          return redirect()->back()->with('status' , 'Email Sent!');
        } catch (\Exception $e) {
          return redirect()->back()->with('error' , 'Oops! Failed to Connect');
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$user = news::create($request->all());
      if ($request->file('attachment') != ""){
      // $imageName = 'Att-'.time().rand(999,999).'.'.$request->attachment->extension();
      $imageName = $request->attachment->getClientOriginalName();
      $request->attachment->move(public_path('assets/dist/img/news/attachments/'), $imageName);
      }
      else {
        $imageName = "";
      }
      $user = new news;
      $user->user_id = $request->input('user_id');
      $user->author = $request->input('author');
      $user->heading = $request->input('heading');
      $user->category = $request->input('category');
      $user->attachment = $imageName;
      $user->body = $request->input('body');
      $user->save();
      return redirect()->route('Dashboard | News')->with('status' , 'News Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $edit = data::find($id);
      // return view('pages.adminProfile',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyNews($id)
    {
      $datas = news::find($id);
      if ($datas->attachment != "") {
        $fileName = public_path('assets/dist/img/news/attachments/'.$datas->attachment);
        unlink($fileName);
      }      
      $datas->delete();
      return redirect()->route('Dashboard | News')->with('status','News Deleted Successfully');
    }
}
