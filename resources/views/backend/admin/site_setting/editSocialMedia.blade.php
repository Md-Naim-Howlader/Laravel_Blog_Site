<x-backend.app-layout>
    <div>
        <div class="card card-primary shadow-none">
            <div class="card-header">
                <h3 class="card-title text-xl font-semibold leading-tight">Edit Social Media</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('site.update-social')}}" method="post">
                @csrf
                @method("put")
                <div class="card-body px-4">
                    <div class="w-1/2 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="fb">Facebook:</label>
                            <input class="form-control" type="text" name="facebook" id="fb" value="{{$site_data->facebook}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="ig">Instagram:</label>
                            <input class="form-control" type="text" name="instagram" id="ig" value="{{$site_data->instagram}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tt">Twitter:</label>
                            <input class="form-control" type="text" name="twitter" id="tt" value="{{$site_data->twitter}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lk">Linkedin:</label>
                            <input class="form-control" type="text" name="linkedin" id="lk" value="{{$site_data->linkedin}}">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-backend.app-layout>