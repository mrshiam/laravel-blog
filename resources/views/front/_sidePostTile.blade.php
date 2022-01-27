<div class="trend-entry d-flex">
    <div class="number align-self-start">0{{++$id}}</div>
    <div class="trend-contents">
        <h2><a href="{{route('blog.post.show',$post->id)}}">{{$post->title}}</a></h2>
        <div class="post-meta">
            <span class="d-block"><a href="#">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a></span>
            <span class="date-read">{{date('M d',strtotime($post->created_at))}} <span class="mx-1">&bullet;</span> {{$post->total_read}} <span class="icon-star2"></span></span>
        </div>
    </div>
</div>
