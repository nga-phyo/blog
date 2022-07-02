

{{-- 
 <form action="/works/store" method="POST">
    @csrf
    
    <label for="">title</label>
    <input type="text" name="title"><br><br>

    <label for="">Body</label>
    <textarea name="body">
        
    </textarea><br><br>
    <button type="submit" class="btn btn-primary">submit</button>
    <a href="/works">cancle</a>
</form> --}}


              
@extends('section.design')

@section('title', 'Create post')  




@section('text')

<div class="container mt-5">

  <div class="card">
      <div class="card-header"><h3>Now Create a post here!</h3>
      </div>
      <div class="card-body">


<form action="/works/store" method="POST">
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

                {{-- <div class="mb-3">
                    <label for="" class="form-label"><b>Categories</b></label>
                    <select name="categories[]" class="form-control" multiple>
                        @foreach ($cagethory as $cagethory)
                            <option value="{{ $cagethory->id }}">{{ $cagethory->name }}</option>
                        @endforeach
                    </select>
                    @error('cagethory_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 --}}
                <div class="mb-3">
                    <label class="form-label">Cagethory</label>                 
                    <select class="form-select" name="category" multiple>
                        @foreach ($cagethory as $cagethory)
                        <option value="{{ $cagethory->id }}">{{ $cagethory->name }}</option>
                        @endforeach
                    </select>
                </div>


</form>

<div class="d-flex justify-content-between mt-3">

<button type="submit" class="btn btn-outline-primary">create</button>
<a href="/works" class="btn btn-outline-warning">cancle</a>
</div>
</div>



</div>

      </div>
  </div>
  
@endsection


 
