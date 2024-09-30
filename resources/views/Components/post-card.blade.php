<div class="col-md-6 col-xl-4 mb-5">
    <a class="card post-preview lift " href="#!">
        <img class="card-img-top" src="./img/pic1.png" alt="photo" />
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}.</p>

            <!-- الكود الخاص باخذ الايدي و حذف البيانات       -->
            <div class="card-buttons">
            <a href="{{ url('/showpost', $post->id) }}">
    <button class="btn btn-danger">Delete</button>
</a>

<!-- الكود الخاص باخذ الايدي و النقل الى الفورم الخاص بالتعديل  -->
<a href="{{ url('/posts', $post->id) }}/edit">
    <button  style="background-color: #713d6e; color: rgb(209, 190, 190)"
    class="btn btn-primary">Update</button>
</a>
            </div>
        </div>
        <div class="card-footer">
            <div class="post-preview-meta">
                <img class="post-preview-meta-img" src="./img/users.png" height="50px" width="50px" />
                <div class="post-preview-meta-details">
                    <div class="post-preview-meta-details-name">{{$post->category->name}}</div>
                    <div class="post-preview-meta-details-date"> Published at &#xB7; {{$post->created_at->diffForHumans()}}</div>
                </div>
            </div>
        </div>
    </a>
</div>









