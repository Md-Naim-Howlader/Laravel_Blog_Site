<title>{{$searchtext}} Posts - DevOrbit</title>
<x-frontend.app-layout>
     @if ($posts->count())

           @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded p-5 mb-8">
                <h2 class="text-3xl text-blue-500 font-medium border-b-2 pb-3"><a href="{{route('frontend.post', $post->id)}}">{{$post->title}}</a></h2>
                <p class="text-sm mt-2">{{ \Carbon\Carbon::parse($post->post_date)->format('d F Y')}}, Post By <span class="text-blue-400">{{$post->author}}</span></p>
                <div class="mt-5">
                    <a href="{{route('frontend.post', $post['id'])}}"><img class="float-start m-4 w-1/5" src="{{asset($post->image)}}" alt="Post image"></a>
                     <p>{{ Str::limit(strip_tags(html_entity_decode($post->description)), 700, '...') }}</p>
                    <div class="flex justify-end">
                        <a href="{{route('frontend.post', $post->id)}}" class="btn btn-primary mt-5">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
     @else
       <h3 class="bg-red-500 p-5 rounded-sm text-white text-xl">No Post found in <b class="text-2xl">{{$searchtext}}</b> Search text !</h3>
     @endif
</x-frontend.app-layout>