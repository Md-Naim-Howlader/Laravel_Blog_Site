
<x-backend.app-layout>

    <div class="bg-white" >
      <div class="row mb-2 mx-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mangage Posts </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="container mx-auto mt-5 w-full">
            <div class="card">
              <div class="card-header flex justify-end">
                <a class="btn btn-primary" href="{{route('post.create')}}">Create Post</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $i =>$post)
                        <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{++$i}}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$post->category_name}}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$post->subcategory_name}}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$post->title}}</td>
                         <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$post->author}}</td>

                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{date("d F Y", strtotime($post->post_date))}}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">
                           @if ($post->status)
                               <button class="badge badge-success">Active</button>
                           @else
                            <button class="badge badge-danger">Inactive</button>
                           @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">
                            <div class="flex justify-around">

                                <a href="{{route('post.edit', $post->id)}}" class="px-4 py-1 text-md text-white bg-green-500 rounded hover:bg-green-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a id="delete" href="{{route('post.delete', $post->id)}}" class="px-4 py-1 text-md text-white bg-red-500 rounded hover:bg-red-700">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
</x-backend.app-layout>