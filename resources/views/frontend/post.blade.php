 @php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;
    $posts = DB::table('posts')->where("subcategory_id", $post->subcategory_id)->get();
    $theme = DB::table("themes")->where("id", 1)->first()->theme_name;

@endphp
<title>{{Str::limit($post->title, 25, '...')}} - Post - DevOrbit</title>
<x-frontend.app-layout>
    <div class="shadow-lg rounded p-5 mb-8 @if ($theme == 'red')
        bg-danger
    @elseif ($theme == 'green')
        bg-success
    @else
        bg-white
    @endif">
        <h2 class="text-3xl font-medium border-b-2 pb-3 @if ($theme == 'default white')
            text-blue-500
        @else
            text-white
        @endif"><a href="{{route('frontend.post', $post['id'])}}">{{$post->title}}</a></h2>
        <p class="text-base mt-2">{{ \Carbon\Carbon::parse($post->post_date)->format('d F Y')}}, Post By <span class="font-bold @if ($theme == 'default white')
            text-blue-500
        @else
            text-white
        @endif">{{$post->author}}</span></p>
        <div class="mt-5">
            <img class="m-4 ms-0 w-1/3" src="{{asset($post->image)}}" alt="Post image">
            <p>{{ strip_tags(html_entity_decode($post->description))}}</p>
        </div>
    </div>
    <div class="shadow-lg rounded p-5 mb-8 @if ($theme == 'red')
        bg-red-400
    @elseif ($theme == 'green')
          bg-green-400
    @else
        bg-white
    @endif">

        <h2 class="text-3xl text-white p-2 font-semibold @if ($theme == 'red')
            bg-danger
        @elseif ($theme == 'green')
            bg-success
        @else
            bg-blue-500
        @endif">Related articles</h2>
        <div class="mt-5 grid grid-cols-3 gap-4">
            @foreach ($posts as $relatedPost)
                <a href="{{route('frontend.post', $relatedPost->id)}}">
                    <img class="w-52 cursor-pointer border rounded-md  mb-4 scale-95 transition-all hover:scale-100 @if ($theme == 'red')
                        border-red-600
                    @elseif ($theme == 'green')
                        border-green-600
                    @else
                        border-blue-600
                    @endif" src="{{asset($relatedPost->image)}}" alt="post image">
                </a>
            @endforeach

        </div>
    </div>
</x-frontend.app-layout>