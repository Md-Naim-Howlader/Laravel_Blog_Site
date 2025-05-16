    @php
         use Illuminate\Support\Str;
    @endphp
<title>Read Inbox - Dashboard</title>
    <x-backend.app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Read Mail</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Read Mail</li>
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
            <div class="col-md-9" id="mailcontent">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">Read Mail</h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h5 class="text-lg font-semibold">{{$inbox->subject}}</h5>
                    <h6><b>From:</b> <span class="text-blue-500">{{$inbox->email}}</span>
                    <span class="mailbox-read-time text-sm float-right">{{ $inbox->created_at->format('d M. Y h:i A') }}</span></h6>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-controls flex items-center justify-between gap-3 ps-4 py-3 border-b border-b-gray-200">
                    <div class="flex gap-5">
                        <!-- Check all button -->

                        <div class="btn-group  flex items-center gap-5">
                            <a href="{{route('admin.deletemail', $inbox->id)}}" id="delete" class="text-danger bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            <a href="{{route('admin.replymail', $inbox->id)}}" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Reply">
                                <i class="fas fa-reply"></i>
                            </a>
                            <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Share">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" onclick="window.print()" type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Print">
                       <i class="fas fa-print"></i>
                        </button>
                    </div>

                    <!-- /.float-right -->
                  </div>
                <div class="mailbox-read-message">
                     {{strip_tags(html_entity_decode($inbox->message)) }}
                     {{-- {{$inbox->message}} --}}
                </div>
                <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1,245 KB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                    </div>
                    </li>
                    <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1,245 KB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                    </div>
                    </li>
                    <li>
                    <span class="mailbox-attachment-icon has-img"><img src="{{asset('/backend')}}/dist/img/photo1.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>2.67 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                    </div>
                    </li>
                    <li>
                    <span class="mailbox-attachment-icon has-img"><img src="{{asset('/backend')}}/dist/img/photo2.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                            <span>1.9 MB</span>
                            <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                    </div>
                    </li>
                </ul>
                </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                </div>
                <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
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
