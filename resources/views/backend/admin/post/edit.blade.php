<style>
  .was-validated .custom-file-input:valid~.custom-file-label,
  .custom-file-input.is-valid~.custom-file-label {
    border-color: #28a745;
  }

  .was-validated .custom-file-input:valid:focus~.custom-file-label,
  .custom-file-input.is-valid:focus~.custom-file-label {
    border-color: #28a745;
    box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.25);
  }
</style>
<title>Edit Post - Dashboard</title>
<x-backend.app-layout>

  <div class=" bg-white  border shadow-sm sm:rounded-lg">
    <div class="container mx-auto">
      <div class=" my-2">
        <div class="container mx-auto ">
          <div class=" mx-auto my-5">
            <!-- general form elements -->
            <div class="card card-primary shadow-none">
               <div class="flex justify-between bg-gray-200 p-3">
                  <h3 class="card-title text-xl font-semibold leading-tight">Edit Post</h3>
                  <a class="btn btn-primary" href="{{route('post.index')}}">All Posts</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body px-0">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" value="{{$post->title}}" class="form-control form-control-lg @error('title') is-invalid  @enderror" name="title" id="title" placeholder="Enter Post Title">
                        @error('title')
                        <div class="text-danger">{{ucwords($message)}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control form-control-lg @error('subcategory_id') is-invalid  @enderror" name="subcategory_id" id="category" value="">

                          @foreach ($allCategory as $category )
                          <option disabled value="">{{$category->category_name}}</option>
                          @php
                          $allSubCat = DB::table("subcategories")->where("category_id", $category->id)->get();
                          @endphp
                          @foreach ($allSubCat as $subcat)
                          <option @if ($post->subcategory_id == $subcat->id)
                            selected
                            @endif class="text-blue-600" value="{{$subcat->id}}">........... {{$subcat->subcategory_name}}</option>
                          @endforeach

                          @endforeach
                        </select>
                        @error('subcategory_id')
                        <div class="text-danger">The Category Field Is Required.</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="date">Post Date</label>
                        <input class="form-control form-control-lg @error('post_date') is-invalid  @enderror" type="date" name="post_date" id="date" value="{{$post->post_date}}">
                        @error('post_date')
                        <div class="text-danger">{{ucwords($message)}}</div>
                        @enderror
                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="tags">Tags</label>
                        <input class="form-control form-control-lg @error('tags') is-invalid  @enderror" type="text" name="tags" id="tags" value="{{$post->tags}}">
                        @error('tags')
                        <div class="text-danger">{{ucwords($message)}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="img">Choose file</label>
                        <input class="bg-gray-500 block text-white w-fit" type="file" name="image" id="img">

                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img style=" height: 100px" src="{{asset($post->image)}}" alt="image">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="">
                        <label for="desc">Post Description</label>
                        <textarea id="summernote" class=" form-control @error('description') is-invalid  @enderror" name="description" id="desc" cols="7" rows="4">{{$post->description}}</textarea>
                        @error('description')
                        <div class="text-danger">{{ucwords($message)}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1" name="status" @if ($post->status == "1")
                    checked
                    @endif value="1">
                    <label class="form-check-label" for="exampleCheck1">Published Now</label>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

</x-backend.app-layout>