<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
   public function index()
   {

   //   if( Auth::check())
   //   {
   //      return 'Login';
   //   }else {
   //      return 'not loginn';
   //   }
      // $user = Auth::user();

      // dd($user);
       //$work = Work::all();


       $work = Work::select('works.*','users.name as name')
       ->join('users','works.user_id', '=','users.id')
       ->paginate(5);

       return view('index',compact('work'));
   }

   public function store(Request $request)
   {
      $work = new Work;
      // $post->title = request('title');
      // $post->body = request('body');
      $work->title = $request->title;
      $work->body = $request->body;

      $work->created_at = now();
      $work->updated_at = now();

      $work->save();

      session()->flash('nice','A Post Was Created');
      return redirect('/works');
   }

   public function show($id)
   {
   //   $work = Work::find($id);

   $work = Work::select('works.*','users.name as name')
   ->join('users','works.user_id', '=', 'users.id')
   ->find($id);
   

        return view('show',compact('work'));

   }


   public function update(Request $request, $id)
   {
       $work = Work::find($id);
       $work->title =$request->title;
       $work->body =$request->body;
       $work->updated_at =now();

       $work->save();

       return redirect('works');

   }


   public function destroy($id)
   {

     Work::destroy($id);

    return redirect('works')->with('nice','A post was Deleting now!');
   }
   

   public function create()
   {
     
      return view('create');
   }

   // public function edit($id)
   // {
   //    $work = Work::find($id);

   //    return view('edit',compact('work'));
   // }
   public function edit($id)
   {
      $work =Work::find($id);

   //    session()->flash('success', 'A post was created successful');
      return view('edit',compact('work'))->with('nice','A post was Editing now!');
       
   }

   }
