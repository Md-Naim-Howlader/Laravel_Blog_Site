 <title>Edit Category - Dashboard</title>
 @vite(['resources/css/app.css', 'resources/js/app.js'])
<x-backend.app-layout>
    <x-slot name="header">
    </x-slot>
    <div class=" bg-white  border shadow-sm sm:rounded-lg ">
        <div class="container mx-auto pb-32">
            <div class="shadow-md border my-2">
                <div class="flex justify-between bg-gray-200 rounded-t p-3 ">
                 <h2 class="font-semibold  text-xl text-gray-800 leading-tight">{{ __('Edit Category') }}</h2>
                 <a class="btn btn-primary" href="{{route('category.index')}}">All Category</a>
               </div>
        </h2>
        <div class="container mx-auto">
        <div class="w-3/5 mx-auto my-5">

            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                <input value="{{$category->category_name}}" class="form-control form-control-lg mb-4 @error('name') is-invalid  @enderror" type="text" name="category_name" >

                @error('name')
                        <div class="text-danger">{{ucwords($message)}}</div>
                @enderror

                <input class="btn btn-lg btn-success" type="submit" value="Update">
            </form>
        </div>
    </div>
            </div>
        </div>
    </div>

</x-backend.app-layout>
