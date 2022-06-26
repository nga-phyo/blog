


<form action="/works/store" method="POST">
    @csrf
    
    <label for="">title</label>
    <input type="text" name="title"><br><br>

    <label for="">Body</label>
    <textarea name="body">
        
    </textarea><br><br>
    <button type="submit" class="btn btn-primary">submit</button>
    <a href="/works">cancle</a>
</form>
