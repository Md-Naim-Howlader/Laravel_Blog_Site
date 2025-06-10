@php
    use Illuminate\Support\Facades\DB;

    $theme = DB::table("themes")->where("id", 1)->first()->theme_name;
@endphp
<title>{{$page->name}} - DevOrbit</title>
<x-frontend.app-layout>
    <div class="@if ($theme == 'red')
        bg-red-400
        @elseif ($theme == 'green')
        bg-green-400
    @else
        bg-white
    @endif p-4 min-h-screen shadow-md">
        <h2 class="text-4xl text-white p-3 font-semibold @if ($theme == 'red')
            bg-danger
        @elseif ($theme == 'green')
            bg-success
        @else
            bg-blue-500
        @endif">{{$page->name}}</h2>
     <p class="mt-8 leading-7 first-letter:text-2xl text-lg @if ($theme == 'default white')
         text-black
     @else
         text-white
     @endif">{{ strip_tags(html_entity_decode($page->content))}}</p>
    </div>
</x-frontend.app-layout>