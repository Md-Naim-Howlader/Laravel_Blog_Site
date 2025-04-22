 @php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;
    $posts = DB::table('posts')->where("subcategory_id", $post->subcategory_id)->get();
@endphp
<title>{{Str::limit($post->title, 25, '...')}} - Post - DevOrbit</title>
<x-frontend.app-layout>
    <div class="bg-white shadow-lg rounded p-5 mb-8">
        <h2 class="text-3xl text-blue-500 font-medium border-b-2 pb-3"><a href="{{route('frontend.post', $post['id'])}}">{{$post->title}}</a></h2>
        <p class="text-base mt-2">{{ \Carbon\Carbon::parse($post->post_date)->format('d F Y')}}, Post By <span class="text-blue-400">{{$post->author}}</span></p>
        <div class="mt-5">
            <img class="m-4 ms-0 w-1/3" src="{{asset($post->image)}}" alt="Post image">
            <p>{{ strip_tags(html_entity_decode($post->description))}}</p>
        </div>
    </div>
    <div class="bg-white shadow-lg rounded p-5 mb-8">

        <h2 class="text-3xl text-white p-2 bg-blue-500 font-semibold">Related articles</h2>
        <div class="mt-5 grid grid-cols-3 gap-4">
            @foreach ($posts as $relatedPost)
                <a href="{{route('frontend.post', $relatedPost->id)}}">
                    <img class="w-52 cursor-pointer border border-blue-500 mb-4 scale-95 transition-all hover:scale-100" src="{{asset($relatedPost->image)}}" alt="post image">
                </a>
            @endforeach

        </div>
    </div>
</x-frontend.app-layout>