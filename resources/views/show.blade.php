

<h1>Show Detalist</h1>

<h3>{{ $work->title }}</h3>
<p>{{ $work->body }}</p>

<i>{{ $work->created_at->diffForHumans() }} </i>

    <b>{{ $work->name }}</b>
    <br>


<a href="/works" class="btn btn-primary">go home</a>


