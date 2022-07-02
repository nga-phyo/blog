




<form action="/cagethories/update/{{ $cagethory->id }}" method="POST">
    @csrf
    
    
    <label for="">name</label>
    <input type="text" name="name"><br><br>

    <button type="submit" class="btn btn-primary">submit</button>
</form>
