    @php
         use Illuminate\Support\Str;
    @endphp
    <title>Reply Inbox - Dashboard</title>
    <x-backend.app-layout>
          <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Reply Mail</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Reply</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
             <div class="col-md-3">
              <a href="{{route('admin.mailbox')}}" class="btn btn-primary btn-block mb-3 w-full"
                ><i class="fas fa-arrow-left    "></i> Back to Inbox</a
              >
              @include("partials.backend.mailSidebar")
            </div>
            <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Reply Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label class="mb-[5px]" for="from">From:</label>
                  <input value="{{Auth::user()->email}}" class="form-control" id="from">
                </div>
                <div class="form-group">
                    <label class="mb-[5px]" for="to">To:</label>
                  <input type="email" class="form-control" value="{{$inbox->email}}" id="to">
                </div>
                <div class="form-group">
                  <label class="mb-[5px]" for="sub">Subject:</label>
                  <input class="form-control" placeholder="Enter Subject" id="sub">
                </div>
                <div class="form-group">
                    <textarea class="form-control tiny-msc" id="mce_0" aria-hidden="true" style="height: 300px">

                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-primary btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="py-2 px-4  bg-gray-200 hover:bg-slate-400 hover:text-white transition"><i class="fas fa-pencil-alt"></i> Draft</button>
                  <button type="submit" class="py-2 px-4 btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="py-2 px-4 bg-gray-200 hover:bg-red-400 hover:text-white transition "><i class="fas fa-times"></i> Discard</button>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </x-backend.app-layout>
     <!-- Page specific script -->
