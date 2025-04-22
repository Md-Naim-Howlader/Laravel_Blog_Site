@php
    use App\Models\SiteSetting;
    $site = SiteSetting::find("1");
@endphp
<a href="/"><img style="width: 208px;" src="{{asset($site->logo)}}" alt="DevOrbit"></a>