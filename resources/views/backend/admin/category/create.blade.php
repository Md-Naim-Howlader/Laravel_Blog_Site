<x-backend.app-layout>

    <div class=" bg-white  border shadow-sm sm:rounded-lg" >
        <div class="container mx-auto h-screen">
            <div class="shadow-md border my-2">
               <div class="flex justify-between bg-gray-200 rounded-t p-3 ">
                 <h2 class="font-semibold  text-xl text-gray-800 leading-tight">{{ __('Create New Category') }}</h2>
                 <a class="btn btn-primary" href="{{route('category.index')}}">All Category</a>
               </div>

        <div class="container mx-auto">
        <div class="w-3/5 mx-auto my-5">

            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Category Name:</label>
                    <input value="{{old('category_name')}}" class="form-control @error('category_name') is-invalid  @enderror" type="text" name="category_name" placeholder="Enter Category Name...">
                    @error('category_name')
                        <div class="text-danger">{{ucwords($message)}}</div>
                @enderror
                </div>
                <input class="btn btn-success" type="submit" value="Create">
            </form>
        </div>
    </div>
            </div>
        </div>
    </div>

</x-backend.app-layout>
