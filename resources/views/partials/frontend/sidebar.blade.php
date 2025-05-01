
<aside class="w-3/12 p-4 bg-blue-100">
    <div>
        <h2 class="text-3xl text-white p-2 bg-blue-500 font-semibold">Categories</h2>
        <div class="flex flex-col mt-2">
            @foreach ($categories as $category)
                <a class="mb-2 pb-1 text-black text-lg block border border-b-1 border-b-black border-dashed font-medium transition hover:text-blue-600 hover:border-b-blue-600" href="{{route("frontend.posts", $category->id)}}">{{$category->category_name}}</a>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-3xl text-white p-2 bg-blue-500 font-semibold">Latest articles</h2>
        <div class="mt-4">
            @foreach ($posts as $post )
            <div class="mb-5">
                <h6 class="text-xl font-semibold mb-3 pb-1 border border-b-1 border-b-black border-dashed transition hover:text-blue-600 hover:border-b-blue-600"><a href="{{route('frontend.post', $post->id)}}">{{$post->title}}</a></h6>
                <div>
                    <a href="{{route('frontend.post', $post->id)}}"><img class="w-1/3 bg-white rounded-2xl border border-blue-600 p-2 shadow float-start cursor-pointer me-3 transition-all hover:scale-100 hover:p-0" src="{{asset($post->image)}}" alt="image"></a>
                     <p>{{ Str::limit(strip_tags(html_entity_decode($post->description)), 100, '...') }}</p>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</aside>