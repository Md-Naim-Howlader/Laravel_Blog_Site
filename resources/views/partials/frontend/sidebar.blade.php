
<aside class="w-3/12 p-4 rounded shadow-lg @if ($theme == 'green')
    bg-green-400
   @elseif ($theme == 'red')
   bg-red-400
@else
    bg-white
@endif">
    <div>
        <h2 class="text-3xl  rounded p-2 font-semibold @if ($theme == 'green')
            bg-success
        @elseif ($theme == 'red')
            bg-danger
        @else
            bg-primary
        @endif">Categories</h2>
        <div class="flex flex-col mt-2">
            @foreach ($categories as $category)
                <a class="mb-2 pb-1  text-lg block border  border-t-0 border-x-0 border-b-1 border-dashed font-medium transition   @if ($theme == 'default white')
                    text-black border-b-black  hover:text-blue-500 hover:border-b-blue-500

                @else
                text-white border-b-white  hover:text-white hover:border-b-white
                @endif" href="{{route("frontend.posts", $category->id)}}">{{$category->category_name}}</a>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-3xl p-2 font-semibold @if ($theme == 'green')
            bg-success
        @elseif ($theme == 'red')
            bg-danger
        @else
            bg-primary
        @endif">Latest articles</h2>
        <div class="mt-4">
            @foreach ($posts as $post )
            <div class="mb-5">
                <h6 class="text-xl font-semibold mb-3 pb-1 border border-t-0 border-x-0 border-b-1 border-dashed transition  @if ($theme == 'default white')
                    text-black border-b-black  hover:text-blue-500 hover:border-b-blue-500

                @else
                text-white border-b-white  hover:text-white hover:border-b-white
                @endif"><a href="{{route('frontend.post', $post->id)}}">{{$post->title}}</a></h6>
                <div>
                    <a href="{{route('frontend.post', $post->id)}}"><img class="w-1/3 bg-white rounded-2xl border p-2 shadow float-start cursor-pointer me-3 transition-all hover:scale-100 hover:p-0" src="{{asset($post->image)}}" alt="image"></a>
                     <p class="@if ($theme == 'default white')
                         text-black
                     @else
                        text-white
                     @endif">{{ Str::limit(strip_tags(html_entity_decode($post->description)), 100, '...') }}</p>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</aside>