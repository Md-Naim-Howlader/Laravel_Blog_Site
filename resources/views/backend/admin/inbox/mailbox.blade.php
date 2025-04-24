    @php
         use Illuminate\Support\Str;
    @endphp
    <x-backend.app-layout>
          <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Inbox</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Inbox</li>
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
              <a href="" class="btn btn-primary btn-block mb-3 w-full"
                >Compose</a
              >
              @include("partials.backend.mailSidebar")
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Inbox</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search Mail"
                      />
                      <div class="input-group-append">
                        <div class="btn btn-primary w-fit">
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="mailbox-controls flex items-center justify-between gap-3 ps-4 py-3">
                    <div class="flex gap-5">
                        <!-- Check all button -->
                        <button
                        type="button"
                        class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white checkbox-toggle" title="Select all">
                        <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group  flex items-center gap-5">
                            <button type="button" class="text-danger bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Reply">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Share">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Sync">
                        <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <div class="mt-6 flex ">
                        {{ $inboxes->links() }}
                    </div>
                    <!-- /.float-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover ">
                      <tbody>
                        @foreach ($inboxes as $inbox)
                          <tr class=" hover:bg-gray-100 transition">
                          <td>
                              <div class="icheck-primary">
                                  <input onclick="event.stopPropagation()" type="checkbox" value="" id="check1"/>
                                  <label for="check1"></label>
                              </div>
                          </td>
                          <div>
                              <td class="mailbox-star">
                              <a href="#" >
                                  <i class="fas fa-dot-circle text-blue-500"></i>
                              </a>
                          </td>
                          <td class="mailbox-name">
                              <a class="text-blue-500 cursor-pointer" href="{{route('admin.readmail', $inbox->id)}}" >{{$inbox->full_name}}</a>
                          </td>
                          <td onclick="window.location = '{{route('admin.readmail', $inbox->id)}}'" class="mailbox-subject cursor-pointer">
                              <b>{{$inbox->subject}}</b> - {{ Str::limit(strip_tags(html_entity_decode($inbox->message)), 26, '...') }}
                          </td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">{{$inbox->created_at->diffForHumans()}}</td>
                          </div>
                      </tr>

                        @endforeach
                      </tbody>
                    </table>
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <div class="mailbox-controls flex items-center justify-between gap-3 ps-4 py-3">
                    <div class="flex gap-5">
                        <!-- Check all button -->
                        <button
                        type="button"
                        class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white checkbox-toggle" title="Select all">
                        <i class="far fa-square"></i>
                        </button>
                        <div class="btn-group  flex items-center gap-5">
                            <button type="button" class="text-danger bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Reply">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Share">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="text-blue-500 bg-gray-200 shadow-xl border rounded-sm px-2 py-1 transition-colors hover:bg-white" title="Sync">
                        <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    <div class="mt-6 flex ">
                        {{ $inboxes->links() }}
                    </div>
                    <!-- /.float-right -->
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </x-backend.app-layout>
     <!-- Page specific script -->
    <script>
      $(function () {
        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data("clicks");
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").prop(
              "checked",
              false
            );
            $(".checkbox-toggle .far.fa-check-square")
              .removeClass("fa-check-square")
              .addClass("fa-square");
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").prop("checked", true);
            $(".checkbox-toggle .far.fa-square")
              .removeClass("fa-square")
              .addClass("fa-check-square");
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var fa = $this.hasClass("fa");

          //Switch states
          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
    </script>