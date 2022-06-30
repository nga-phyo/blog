

@extends('section.design')

@section('title', 'Home Page')


@section('text')

         <h1>Show all Data</h1>
    
<div class="container mt-5">


  <div class="row justify-content-end">
    <div class="col-5">
       <form action="">
        <div class="input-group mb-3">


<div class="input-group mb-3">
  <input type="text" name="search" value="{{ request('search')}}" class="form-control" placeholder="Search....">
  <button class="btn btn-outline-secondary" type="button" id="button-addon2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </svg>
  </button>
</div>


      
       </form>
    </div>
  </div>
{{-- 
  @if(session('nice'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('nice') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif  --}}


   <div class="row justify-content-end">
    <div class="col-12">
      @if(session()->has('nice'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session()->get('nice') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
 
     @if(count($work) > 0)

     @foreach($work as $work)
     <div>
          <a href="/works/show/{{ $work->id }}"> <h2> {{ $work->title }}</h2></a>
 
           <i>{{ $work->created_at->diffForHumans() }} </i><b>
 
             {{-- {{ $work->name }} --}}
             {{-- {{ $work->user()->first()->name}} --}}
             {{ $work->user->name}}
           </b>
            
 
           <p> {{ $work->body }}</p>
 
 
   
 
  
           @if($work->isownWork())
           <div class="d-flex justify-content-end">
             <a href="/works/edit/{{ $work->id }}" class="btn btn-outline-success">Edit</a>
 
             <form action="/works/destroy/{{ $work->id }}" method="POST">
     
                 @csrf
                 @method('DELETE')
     
                 <button type="submit" onclick="return confirm('are you sure')" class="btn btn-outline-danger ms-2">Delete</button>
             
             </form>
           @endif
           </div>
      
         
    
 
 
       </div>
       <hr>
       
 
    @endforeach  
    </div>
   </div>

        @else
        no post

     @endif
       
     


 {{-- {{ $work->links() }} --}}

   

      </div>



</ul>


@endsection