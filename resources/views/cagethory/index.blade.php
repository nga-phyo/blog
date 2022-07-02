

@extends('section.design')

@section('title','Cagethory Title')

@section('text')

  @foreach($cagethory as $cagethory)
  
      <a href="cagethories/show/{{ $cagethory->id }}"> <li> {{ $cagethory->name }}</li></a>
    

      <div class="d-flex justify-content-end">
        <a href="/cagethories/edit/{{ $cagethory->id }}" class="btn btn-outline-success">Edit</a>

        <form action="/cagethories/destroy/{{ $cagethory->id }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
        
        </form>
        
         </div>
      <hr>

 @endforeach  


 <a href="/cagethories/create" class="btn btn-outline-success">Create A Cagethory</a>

 


 @endsection