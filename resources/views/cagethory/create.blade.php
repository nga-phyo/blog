
@extends('section.design')


@section('titel','Cagethory Create table')

@section('text')


<form action="/cagethories/store" method="POST">
    @csrf
    
    <label for="">name</label>
    <input type="text" name="name"><br><br>

    
    <button type="submit" class="btn btn-primary">submit</button>
    <a href="/cagethories">cancle</a>
</form>


@endsection