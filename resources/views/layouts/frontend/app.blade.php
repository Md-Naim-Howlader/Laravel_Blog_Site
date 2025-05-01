@php
    use Illuminate\Support\Facades\DB;
    use App\Models\Page;
    use App\Models\SiteSetting;
    use App\Models\Post;
    use Illuminate\Support\Str;

    $pages = Page::all();
    $site = SiteSetting::find("1");
    $categories = DB::table('categories')->get();
    $posts = Post::latest()->take(5)->get();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevOrbit</title>
    <link rel="shortcut icon" style="border-radius: 100%" href="{{ asset($site->favicon) }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.css">


   <style >
		#tinymce{font-size:15px !important;}
    </style>
    <!-- Vite Resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body style="html-scroll-behavior: smooth">
@include("partials.frontend.header")
@if (Request::is('/'))
    @include('partials.frontend.slider')
@endif

<main class="mt-5">
    <div class="container mx-auto flex ">
        <section class="w-9/12 pe-5">
            {{ $slot }}
        </section>
        @include("partials.frontend.sidebar")
    </div>
</main>

@include("partials.frontend.footer")

<!-- Scripts -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Delete Confirmation -->
<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        let link = $(this).attr("href");
        Swal.fire({
            title: "Are you sure you want to delete?",
            text: "Once deleted, this will be permanently gone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            } else {
                Swal.fire("Safe data!");
            }
        });
    });
</script>

<!-- Toastr Notifications -->
<script>
    @if (session('success')) toastr.success("{{ session('success') }}"); @endif
    @if (session('error')) toastr.error("{{ session('error') }}"); @endif
    @if (session('warning')) toastr.warning("{{ session('warning') }}"); @endif
    @if (session('info')) toastr.info("{{ session('info') }}"); @endif
</script>
<!-- TinyMSC load for editor -->
{{-- <script src="{{ asset('/backend') }}/plugins/tiny-mce/jquery.tinymce.js" type="text/javascript"></script> --}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#mytextarea',
        plugins: 'lists link image preview',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | preview',
        height: 300,
        readonly: false
    });
</script>

<!-- TinyMSC load for editor -->

</body>
</html>
