<title>Edit Copyright - Dashboard</title>
<x-backend.app-layout>
    <div>
        <div class="card card-primary shadow-none">
            <div class="card-header">
                <h3 class="card-title text-xl font-semibold leading-tight">Edit Copyright &copy;</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('site.update-copyright')}}" method="post">
                @csrf
                @method("put")
                <div class="card-body px-4">
                    <div class="w-1/2 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="cp">Copyright Text:</label>
                            <input class="form-control" type="text" name="copyright" id="cp" value="{{$site->copyright}}">
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-backend.app-layout>