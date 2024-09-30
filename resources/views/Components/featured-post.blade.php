<a class="card post-preview post-preview-featured lift mb-5" href="#">
    <div class="row no-gutters">
        <div class="col-lg-5"><div class="post-preview-featured-img" style='background-image: url("./img/pic1.png")'></div></div>
        <div class="col-lg-7">
            <div class="card-body">
                <div class="py-5">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">
                       {{$post->description}}
                    </p>
                </div>
                <hr />
                <div class="post-preview-meta">
                    <img class="post-preview-meta-img" src="./img/users.png" height="50px" width="50px"  />
                    <div class="post-preview-meta-details">
                        <div class="post-preview-meta-details-name">Valerie Luna</div>
                        <div class="post-preview-meta-details-date">Published at  &#xB7; {{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
