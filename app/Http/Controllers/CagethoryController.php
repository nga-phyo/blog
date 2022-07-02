<?php

namespace App\Http\Controllers;

use App\Models\Cagethory;
use Illuminate\Http\Request;

class CagethoryController extends Controller
{
    public function index()
    {
        $cagethory = Cagethory::paginate(4);
        return view('cagethory.index',compact('cagethory'));
    }

    public function store(Request $request)
    {
       $cagethory = new Cagethory;
        
       $cagethory->name = $request->name;
       $cagethory->created_at = now();
       $cagethory->updated_at = now();
 
       $cagethory->save();

       return redirect('cagethories');
        
    }

    public function create()
    {
        return view('cagethory.create');
    }

    public function show($id)
    {
        $cagethory = Cagethory::find($id);

        return view('cagethory.show',compact('cagethory'));
    }


    public function update(Request $request,$id){

       $cagethory = Cagethory::find($id);
       
       $cagethory->name =$request->name;
      
       $cagethory->updated_at = now();

       $cagethory->save();

       return redirect('cagethories');
    

    }
   

    public function destroy($id)
    {
        Cagethory::destroy($id);

       
         return redirect('cagethories');
    }

    public function edit($id){

       $cagethory = Cagethory::find($id);


       return view('cagethory.edit',compact('cagethory'));
    }


}
