@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;

    $theme = DB::table("themes")->where("id", 1)->first()->theme_name;
@endphp
<title>Posts - DevOrbit</title>
<x-frontend.app-layout>

     @if ($posts->isEmpty())
         <h3 class="bg-danger text-white p-5 rounded-sm  text-xl">No Post Avilbale in <b>{{$category->category_name}}</b> category !</h3>
     @else
         @foreach ($posts as $post)
            <div class="shadow-lg rounded p-5 mb-8 @if ($theme == 'red')
                    bg-danger
                @elseif ($theme == 'green')
                    bg-success
                @else
                    bg-white
                @endif">
                <h2 class="text-3xl  font-medium border-b-2 pb-3 "><a href="{{route('frontend.post', $post->id)}}">{{$post->title}}</a></h2>
                <p class="text-sm mt-2">{{ \Carbon\Carbon::parse($post->post_date)->format('d F Y')}}, Post By <span class="font-bold @if ($theme == 'default white')
                    text-blue-500
                @else
                    text-white
                @endif">{{$post->author}}</span></p>
                <div class="mt-5">
                    <a href="{{route('frontend.post', $post->id)}}"><img class="float-start m-4 w-1/5" src="{{asset($post->image)}}" alt="Post image"></a>
                     <p>{{ Str::limit(strip_tags(html_entity_decode($post->description)), 700, '...') }}</p>
                    <div class="flex justify-end">
                        <a href="{{route('frontend.post', $post->id)}}" class="btn mt-5 @if ($theme == 'default white')
                           btn-primary
                        @else
                            btn-white
                        @endif">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
     @endif

</x-frontend.app-layout>