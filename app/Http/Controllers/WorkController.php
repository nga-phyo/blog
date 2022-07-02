<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Cagethory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class WorkController extends Controller
{
   public function index(Request $request)
   {

   //   if( Auth::check())
   //   {
   //      return 'Login';
   //   }else {
   //      return 'not loginn';
   //   }
      // $user = Auth::user();

      // dd($user);

      //  $work = Work::paginate(4);

   
      // $work = Work::where('title', 'like', '%' . $request->search . '%')
      // ->select('works.*','cagethory_work.work_id','cagethory_work.cagethory_id','cagethries.name as catname')
      // ->join('cagethory_work','works.id', '=','cagethory_work.work_id')
      // ->join('cagethories','cagethories.id', '=','cagethory_work.cagethory_id')
      // ->orderBy('id', 'desc')->paginate(4);


      // $work = Work::join('cagethory_work', 'works.id', '=', 'cagethory_work.work_id')
      //        ->join('cagethories', 'cagethory_work.cagethory_id', '=', 'cagethories.id')
      //        ->select('works.*', 'cagethories.name as name',)
      //        ->orderBy('id', 'desc')
      //        ->get();

      // $work = Work::select('works.*', 'cagethories.name as catname',)
      //        ->join('cagethory_work', 'works.id', '=', 'cagethory_work.work_id')
      //        ->join('cagethories', 'cagethory_work.cagethory_id', '=', 'cagethories.id')

      //        ->paginate(5);


      $work = Work::where('title', 'like', '%' . $request->search . '%')
             ->Join('cagethory_work', 'cagethory_work.work_id', '=', 'works.id')
             ->Join('cagethories', 'cagethory_work.cagethory_id', '=', 'cagethories.id')
             ->select('works.*', 'cagethory_work.work_id', 'cagethory_work.cagethory_id', 'cagethories.name as nn')
            ->orderBy('id','desc')->paginate(4);



         //    $work = Work::all();
         // return view('create', compact('work'));


      //  $work = Work::select('works.*','users.name as name')
      //  ->join('users','works.user_id', '=','users.id')
      //  ->orderBy('id','desc')
      //  ->paginate(5);

       return view('index',compact('work'));
   }

   public function store(Request $request)
   {
      $work = new Work;
      // $post->title = request('title');
      // $post->body = request('body');
      $work->title = $request->title;
      $work->body = $request->body;
      $work->user_id = auth()->id();

      $work->created_at = now();
      $work->updated_at = now();

      $work->save();

   //    Work::create([
   //       'title'=> $request->title,
   //       'body'=> $request->body,
   //       'user_id'=>2,
   //       'user_id'=>auth()->id(),
   //       'cagethory_id'=>Cagethory::first()->id
   //   ]);

      // foreach($request->cagethory as $cagethory)
      //        {
      //          Cagethory_work::create([
      //                'work_id' => $work->id,
      //                'cagethory_id' => $cagethory,
      //            ]);
      //          }
     
      session()->flash('nice','A Post Was Created');
      return redirect('/works');
   }

   public function show($id)
   {
   //   $work = Work::find($id);

   $work = Work::select('works.*','users.name as name')
   ->join('users','works.user_id', '=', 'users.id')
   ->where('works.id', $id)
   ->first();
   

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
     
      

      $cagethory = Cagethory::all();
      return view('create', compact('cagethory'));
      
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
