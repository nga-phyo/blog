

@extends('section.design')

@section('title', 'Create post')  




@section('text')

<div class="container mt-5">

  <div class="card">
      <div class="card-header"><h3>Now Edit a post here!</h3>
      </div>
      <div class="card-body">

        <form action="/works/update/{{ $work->id }}" method="POST">
            @csrf
            

<div class="mb-3">
<label for="" class="form-lable">Title</label>
<input class="form-control" type="text" name="title">


</div>

 {{-- <div style="color: chocolate">The title field is required</div>  --}}

<div class="mb-3">

<label for="" class="form-label">Body</label>
<textarea class="form-control" rows="5"  name="body">



  
</textarea>


</form>

<div class="d-flex justify-content-between mt-3">

<button type="submit" class="btn btn-outline-primary">Edit</button>
<a href="/works" class="btn btn-outline-warning">Cancle</a>
</div>
</div>



</div>

      </div>
  </div>
  
@endsection

