

@extends('section.design');



@section('title', 'Register Page')
    


@section('text')


<div class="container ">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Register
                </div>
                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                           
                     <label for="name"> Name </label>
                     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                     @error('name')
                           <div class="text-danger"> {{ $message }}</div>
                     @enderror

                        </div>

                        <div class="mb-3">
                          
                     <label for="email"> Email </label>
                     <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">

                     @error('email')
                            <div class="text-danger"> {{ $message }}</div>
                     @enderror
                   
                        </div>

                        <div class="mb-3">
                            
                     <label for="password"> Password </label>
                     <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                     @error('password')
                            <div class="text-danger"> {{ $message }}</div>
                     @enderror

                    
                        </div>

                       <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection