@php
    use App\Models\SiteSetting;
    $site = SiteSetting::find("1");
@endphp
<a style="display: flex; align-items: center; justify-content: center" href="/"><img style="width: 70px;" src="{{asset($site->logo)}}" alt="{{$site->site_name}}"><h1>{{$site->site_name}}</h1></a>