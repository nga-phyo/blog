

@extends('section.design')

@section('title', 'Home Page')


@section('text')

         <h1>Show all Data</h1>
    
<div class="container mt-5">
{{-- 
  @if(session('nice'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('nice') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif  --}}


    @if(session()->has('nice'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session()->get('nice') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
     @endif

    
      
    @foreach($work as $work)
    <div>
         <a href="/works/show/{{ $work->id }}"> <h2> {{ $work->title }}</h2></a>

          <i>{{ $work->created_at->diffForHumans() }} </i><b>

            {{ $work->name }}
          </b>
           

          <p> {{ $work->body }}</p>


  

 
          @auth
          <div class="d-flex justify-content-end">
            <a href="/works/edit/{{ $work->id }}" class="btn btn-outline-success">Edit</a>

            <form action="/works/destroy/{{ $work->id }}" method="POST">
    
                @csrf
                @method('DELETE')
    
                <button type="submit" onclick="return confirm('are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
            
            </form>
          @endauth
          </div>
     
        
   


      </div>
      <hr>
      

   @endforeach  

   

      </div>



</ul>


@endsection