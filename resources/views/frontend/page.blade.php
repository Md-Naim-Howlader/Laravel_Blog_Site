<title>{{$page->name}} - DevOrbit</title>
<x-frontend.app-layout>
    <h2 class="text-4xl text-white p-3 bg-blue-500 font-semibold">{{$page->name}}</h2>
     <p class="mt-8 leading-7 first-letter:text-2xl text-lg">{{ strip_tags(html_entity_decode($page->content))}}</p>
</x-frontend.app-layout>