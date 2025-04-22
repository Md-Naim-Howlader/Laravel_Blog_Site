<x-backend.app-layout>

    <div class=" bg-white  border shadow-sm sm:rounded-lg" >
        <div class="container mx-auto h-screen">
            <div class="shadow-md border my-2">
              <div class="flex justify-between bg-gray-200 rounded-t p-3 ">
                 <h2 class="font-semibold  text-xl text-gray-800 leading-tight">{{ __('Create New SubCategory') }}</h2>
                 <a class="btn btn-primary" href="{{route('subcategory.index')}}">All Subcategory</a>
               </div>

        <div class="container mx-auto">
        <div class="w-3/5 mx-auto my-5">

            <form action="{{route('subcategory.store')}}" method="POST">
                @csrf
                   <div class="form-group mt-3">
                    <label for="category" class="form-label" id="">Choose Category:</label>

                    <select class="form-control form-control-lg @error('category_id') is-invalid  @enderror" name="category_id" id="category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                           <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                        @endforeach
                    </select>
                     @error('category_id')
                            <div class="text-danger">The Category Field Is Required.</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="subcategory_name" class="form-label">Subcategory Name:</label>
                    <input id="subcategory_name" value="{{old('subcategory_name')}}" class="form-control form-control-lg @error('subcategory_name') is-invalid  @enderror" type="text" name="subcategory_name" placeholder="Enter Subcategory Name...">

                    @error('subcategory_name')
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
