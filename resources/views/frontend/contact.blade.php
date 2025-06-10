@php
    use Illuminate\Support\Facades\DB;

    $theme = DB::table("themes")->where("id", 1)->first()->theme_name;
@endphp
<title>Contact-us - DevOrbit</title>

<x-frontend.app-layout>
    <div class="p-4 @if ($theme == 'red')
        bg-red-400
    @elseif ($theme == 'green')
        bg-green-400
    @else
        bg-white
    @endif">
        <h2 class="text-4xl text-white p-1 font-semibold @if ($theme == 'red')
            bg-danger
        @elseif ($theme == 'green')
            bg-success
        @else
            bg-blue-500
        @endif">Contact Us</h2>
     <div class="mt-5">
        <p class="text-lg  leading-8 font-semibold @if ($theme == 'default white')
            text-slate-800
        @else
            text-white
        @endif">We’d love to hear from you! Whether you have a question about our blog, want to collaborate, or just want to say hello — feel free to reach out.</p>
        <form class="w-4/5 bg-white shadow mt-4 p-5" action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
            <h4 class="text-3xl font-bold text-slate-800 ">Contact Form</h4>
            @csrf
            <div class="mt-5">
                <label for="name" class="form-label">Name:</label>
                <input class="form-control @error('full_name') is-invalid  @enderror" type="text" name="full_name" id="name" placeholder="Enter Your Full Name" value="{{old('full_name')}}">
                @error('full_name')
                    <div class="text-danger">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="form-label">Email:</label>
                <input class="form-control @error('email') is-invalid  @enderror" type="email" name="email" id="email" placeholder="Enter Your Email" value="{{old('email')}}">
                 @error('email')
                    <div class="text-danger">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <label for="sub" class="form-label">Subject:</label>
                <input class="form-control @error('subject') is-invalid  @enderror" type="text" name="subject" id="sub" placeholder="Enter Mail Subject" value="{{old('subject')}}">
                 @error('subject')
                    <div class="text-danger">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <label for="editor" class="form-label">Message:</label>
                <textarea class="form-control tinymce @error('message') is-invalid  @enderror" name="message" id="mytextarea" cols="30" rows="4">{{old('message')}}</textarea>
                 @error('message')
                <div class="text-danger">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <label for="photo" class="form-label">Your Photo:</label>
                <input class="  @error('photo') is-invalid  @enderror" type="file" name="photo" id="photo">
                 @error('photo')
                <div class="text-danger">{{ ucwords($message) }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="btn w-52 @if ($theme == 'green')
                    btn-success
                @elseif ($theme == 'red')
                    btn-danger
                @else
                    btn-primary
                @endif">Send <i class="fab fa-telegram-plane    "></i></button>
            </div>
        </form>
     </div>
    </div>
</x-frontend.app-layout>