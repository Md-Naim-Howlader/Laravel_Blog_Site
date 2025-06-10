@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;

    $theme = DB::table("themes")->where("id", 1)->first()->theme_name;
@endphp
<title>Home - DevOrbit</title>
<x-frontend.app-layout>


        <div id="posts">
            @foreach ($posts as $post)
                <div class="
                @if ($theme == 'red')
                    bg-red-500
                @elseif ($theme == 'green')
                    bg-success
                @else
                    bg-white
                @endif shadow-lg rounded p-5 mb-8">
                    <h2 class="text-3xl @if ($theme == 'default white')
                        text-blue-500
                    @else
                        text-white
                    @endif font-medium border-b-2 pb-3"><a href="{{route('frontend.post', $post['id'])}}">{{$post['title']}}</a></h2>
                    <p class="text-sm mt-2 @if ($theme == 'default white')
                        text-black
                    @else
                        text-white
                    @endif">{{ \Carbon\Carbon::parse($post['post_date'])->format('d F Y')}}, Post By <span class="@if ($theme == 'default white')
                        text-blue-400
                    @else
                        text-white
                    @endif font-bold">{{$post['author']}}</span></p>
                    <div class="mt-5">
                        <a href="{{route('frontend.post', $post['id'])}}"><img class="float-start m-4 w-1/5" src="{{asset($post['image'])}}" alt="Post image"></a>
                    <p class="@if ($theme == 'default white')
                        text-black
                    @else
                        text-white
                    @endif">{{ Str::limit(strip_tags(html_entity_decode($post->description)), 700, '...') }}</p>
                        <div class="flex justify-end">
                            <a href="{{route('frontend.post', $post->id)}}" class="btn @if ($theme == 'default white')
                                btn-primary
                            @else
                                btn-white
                            @endif mt-5">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="">
                <button class="w-3/12 mt-5"><a class="btn @if ($theme == 'green')
                    btn-success
                @elseif($theme == 'red')
                    btn-danger
                @else
                    btn-primary
                @endif w-full" href="{{route("allpost")}}">See All Posts</a></button>
            </div>
        </div>
</x-frontend.app-layout>
