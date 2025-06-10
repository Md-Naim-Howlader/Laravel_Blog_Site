
<header class="shadow-md
@if ($theme == 'red')
bg-danger
@elseif ($theme == 'green')
    bg-success
@else
bg-white
@endif sticky top-0">
        <div class="container  mx-auto sm:flex justify-between items-center py-4 ">
            <a class="flex items-center gap-1" href="/"><img class="w-20" src="{{asset($site->logo)}}" alt="{{$site->site_name}}"><h2 class="text-4xl @if ($theme == 'default white')
                text-blue-500
                @else
                text-white
            @endif font-bold ">{{$site->site_name }}</h2></a>


            <div class="flex justify-between items-center">
                <a class="me-6 text-lg transition-colors  font-semibold hover:text-blue-500 {{ Request::is('/') ? ($theme == 'default white' ? 'active-blue' : 'active-white') : '' }}" href="/">Home</a>
                <a class="me-6 text-lg transition-colors font-semibold hover:text-blue-500 {{ Request::is('posts') || Request::routeIs('frontend.post') || Request::routeIs('frontend.posts') || Request::routeIs('posts.search') ? ($theme == 'default white' ? 'active-blue' : 'active-white') : '' }}" href="{{route('allpost')}}">Posts</a>
                @foreach ($pages as $page)
                    <a class="me-6 text-lg transition-colors  font-semibold hover:text-blue-500 @if (Request::routeIs('pages.show') && request()->route('page') == $page->id)
                        @if ($theme == 'default white')
                           active-blue
                        @else
                           active-white
                        @endif
                    @endif" href="{{route('pages.show', $page->id)}}">{{$page->name}}</a>
                @endforeach
                <a class="me-6 text-lg transition-colors  font-semibold hover:text-blue-500 {{ Request::is('contact') ? ($theme == 'default white' ? 'active-blue' : 'active-white') : '' }}" href="{{route('contact')}}">Contact</a>
                <div class="me-5 ">
                    <form class="flex items-center" action="{{route('posts.search')}}" method="GET">
                        @csrf
                        <div class="flex items-center justify-center">
                            <input class="form-control-2 py-[12px]" type="search" name="searchtext" placeholder="Search Here...">
                        <input class="bg-gray-500  text-white shadow-md p-2 py-[12px] rounded-none rounded-e-md  w-fit cursor-pointer inline-block" type="submit" value="Search">
                        </div>
                    </form>
                </div>
                @if (Route::has('login'))
                <div>
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn @if ($theme == 'default white')
                        btn-primary
                    @else
                        btn-white
                    @endif w-fit">Dashboard</a>
                    @else
                    <div class="flex justify-between items-center">
                        <a href="{{ route('login') }}" class="py-[7px] px-2 @if ($theme == 'default white')
                            btn-primary
                        @else
                            btn-white
                        @endif me-3">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="py-[7px] px-2  @if ($theme == 'default white')
                            btn-primary
                        @else
                            btn-white
                        @endif">Register</a>
                        @endif
                    </div>
                    @endauth
                </div>
            @endif
            </div>
        </div>
</header>