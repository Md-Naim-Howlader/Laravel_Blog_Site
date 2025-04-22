<x-backend.app-layout>
<div class="border bg-white shadow-sm sm:rounded-lg">
<div class="container mx-auto">
    <div class="my-2">
        <div class="container mx-auto">
            <div class="mx-auto my-5">
                <!-- general form elements -->
                <div class="card card-primary shadow-none">
                    <div class="card-header">
                        <h3 class="card-title text-xl font-semibold leading-tight">Create New Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf
                        <div class="card-body px-0">
                            <div class="form-group">
                                        <label for="name">Page Name:</label>
                                        <input type="text" value="{{ old('name') }}"
                                            class="form-control form-control-lg @error('name') is-invalid  @enderror"
                                            name="name" id="name" placeholder="Enter Page Name">
                                        @error('name')
                                            <div class="text-danger">{{ ucwords($message) }}</div>
                                        @enderror
                                    </div>
                            <div class="form-group">
                                <label for="content">Page Content</label>
                                <textarea id="summernote" class="form-control @error('content') is-invalid  @enderror" name="content"
                                    id="desc" cols="7" rows="4">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ ucwords($message) }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</x-backend.app-layout>