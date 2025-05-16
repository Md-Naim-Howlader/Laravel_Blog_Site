<title>Users info - Dashboard</title>
<x-backend.app-layout>
    <div class="card">
              <div class="card-header">
                <h3 class="text-xl">User List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $i =>$user)
                        <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{++$i}}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$user->name}}
                            @if (Auth::user()->name == $user->name)
                                <span class="bg-blue-600 py-1 px-2 text-md rounded-lg font-semibold text-white ms-5">You</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">{{$user->email}}</td>

                        <td class="px-4 py-2 text-sm text-gray-900 border border-gray-300">
                            <div class="flex justify-around">
                                <a id="delete" href="{{route('admin.user.delete', $user->id)}}" class="px-4 py-1 text-md text-white bg-red-500 rounded hover:bg-red-700">
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
</x-backend.app-layout>