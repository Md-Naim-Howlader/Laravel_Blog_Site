<title>Edit site name, logo, favicon - Dashboard</title>
<x-backend.app-layout>
    <div>
        <div class="card card-primary shadow-none">
            <div class="card-header">
                <h3 class="card-title text-xl font-semibold leading-tight">Edit Logo & Favicon</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('site.update-logo_favicon')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="card-body px-2">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="name">Site Name:</label>
                            <input class="form-control" type="text" name="site_name" id="name" value="{{$site_data->site_name}}">
                        </div>
                    </div>
                   <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="logo">Choose Logo Image:</label>
                            <input class="block cursor-pointer w-fit bg-gray-500 text-white" type="file" name="logo" id="logo">
                        </div>
                        <div class="my-5">
                            <img class="w-24" src="{{asset($site_data->logo)}}" alt="$site_data->site_name">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="favicon">Choose Favicon Image:</label>
                            <input class="block cursor-pointer w-fit bg-gray-500 text-white" type="file" name="favicon" id="favicon">
                        </div>
                        <div class="w-full mx-auto my-5">
                            <img class="w-24" src="{{asset($site_data->favicon)}}" alt="logo">
                        </div>
                    </div>
                   </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-backend.app-layout>