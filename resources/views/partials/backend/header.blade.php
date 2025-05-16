@php
    use Illuminate\Support\Facades\DB;
    use App\Models\Inbox;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Support\Str;
    $totalUnseenInbox = Inbox::where('status', "unseen")->count();
    $latestInboxTime = Inbox::where("status", "unseen")->latest()->take(1)->first();
    $latestInbox = Inbox::where('status', 'unseen')->latest()->take(3)->get();
    // post
     $totalPost = Inbox::count();
     $lastPostTime = Post::latest()->take(1)->first();
     //  user
     $totalUser = Auth::user()->count();
     $lastUserTime = User::latest()->take(1)->first();

@endphp
    @vite(['resources/css/app.css', 'resources/js/app.js'])


<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link"> <i class="fas fa-home    "></i> Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.themes')}}" class="nav-link"> <i class="fas fa-paint-brush    "></i> Themes</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

        <x-dropdown-link :href="route('profile.edit')">
           <i class="fas fa-user    "></i> {{ __('User Profile') }}
        </x-dropdown-link>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.users')}}" class="nav-link"> <i class="fas fa-users    "></i> User List</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-[100px]">
      <li class="nav-item d-none d-sm-inline-block">
        <form method="POST" action="{{ route('logout') }}" >
                @csrf
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                            this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                </x-dropdown-link>
        </form>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          @if ($totalUnseenInbox)
            <span class="badge badge-danger navbar-badge">{{$totalUnseenInbox}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach ($latestInbox as $lInbox)
            <a href="{{route('admin.readmail', $lInbox->id)}}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset($lInbox->photo) }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title text-blue-500">
                  {{$lInbox->full_name}}
                  <span class="float-right text-sm "><i class="fas fa-dot-circle text-blue-500"></i></span>
                </h3>
                <p class="text-sm">{{ Str::limit(strip_tags(html_entity_decode($lInbox->message)), 26, '...') }}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$lInbox->created_at->diffForHumans()}}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          @endforeach

          <div class="dropdown-divider"></div>
          <a href="{{route('admin.mailbox')}}" class="dropdown-item dropdown-footer hover:bg-slate-400 hover:text-white">See All Messages <i class="fas fa-arrow-right    "></i></a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$totalUnseenInbox + $totalUser + $totalPost}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{$totalUnseenInbox + $totalUser + $totalPost}} Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('admin.mailbox')}}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$totalUnseenInbox}} new messages
            <span class="float-right text-muted text-sm">{{$latestInboxTime->created_at->diffForHumans()}}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> {{$totalUser}} new users
            <span class="float-right text-muted text-sm">{{$lastUserTime->created_at->diffForHumans()}}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('post.index')}}" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> {{$totalPost}} new posts
            <span class="float-right text-muted text-sm">{{$lastPostTime->created_at->diffForHumans()}}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->