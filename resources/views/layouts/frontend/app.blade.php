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

    <link rel="shortcut icon" style="border-radius: 100%" href="{{asset($site->favicon)}}" type="image/x-icon">
    <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.css">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
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
                {{$slot}}
            </section>
            @include("partials.frontend.sidebar")
        </div>
    </main>

@include("partials.frontend.footer")

<!-- jquery  -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- Toastr JS -->
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (session('info'))
        toastr.info("{{ session('info') }}");
    @endif

</script>
<script src="{{ asset('backend/sweetalert/sweetalert2.all.min.js') }}"></script>
<script>
  $(document).on("click", "#delete", function (e) {
    e.preventDefault();  // Prevent default behavior
    let link = $(this).attr("href");  // Get the link of the delete button

    Swal.fire({
      title: "Are you sure you want to delete?",
      text: "Once deleted, this will be permanently gone!",
      icon: "warning",
      showCancelButton: true,  // Show cancel button
      confirmButtonColor: "#3085d6",  // Confirm button color
      cancelButtonColor: "#d33",  // Cancel button color
      confirmButtonText: "Yes, delete it!",  // Button text for confirmation
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;  // If confirmed, redirect to delete link
      } else {
        Swal.fire("Safe data!");
      }
    });
  });
</script>

</body>

</html>