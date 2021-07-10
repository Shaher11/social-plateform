@foreach($posts as $post)
    <div class="col-md-4 col-sm-4 col-12">
        <div class="blog-grid">
            <div class="blog-grid-img">
                <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/250x220' }}" alt="img">
                <div class="data-box-grid">
                    <h4>{{$post->created_at->format('d')}}</h4>
                    <p>{{$post->created_at->format('M')}}</p>
                </div>
            </div>
            <div class="blog-grid-text">

                <!-- Tags -->
                <span>{{Str::limit($post->category->name, 15)}}</span>
                <h4>{{Str::limit($post->title, 20)}}</h4>
                <ul>
                    <li><i class="fa fa-calendar"></i>{{$post->created_at->diffForhumans()}}</li>
                <li><i class="fa fa-list-ul"></i>{{Str::limit($post->category->name, 15)}}</li>
                </ul>
                <p>{{ Str::limit( strip_tags($post->body), 60) }}</p>

                <div class="mt-20 left-holder">
                    <a href="{{route('showPost', $post->id)}}" class="primary-button button-sm">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

