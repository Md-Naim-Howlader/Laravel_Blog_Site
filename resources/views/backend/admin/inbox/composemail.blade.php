
    @php
         use Illuminate\Support\Str;
    @endphp
    <title>Compose Inbox - Dashboard</title>
    <x-backend.app-layout>
          <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Compose Mail</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Compose</li>
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
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <input disabled   value="" class="form-control" placeholder="From: {{Auth::user()->email}}">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="To:">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px">
                      <h1 >Heading Of Message:</h1>
                      <h4 class="mt-4 text-lg">Sub-heading:</h4>
                      <p class="mt-2 text-base leading-7">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                        was born and I will give you a complete account of the system, and expound the actual teachings
                        of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                        dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                        how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                        is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                        but because occasionally circumstances occur in which toil and pain can procure him some great
                        pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                        except to obtain some advantage from it? But who has any right to find fault with a man who
                        chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                        produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                        dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                        blinded by desire, that they cannot foresee</p>
                      <ul class="py-4 ">
                        <li class="ms-4"><i class="fas fa-dot-circle text-sm"></i> List item two</li>
                        <li class="ms-4"><i class="fas fa-dot-circle text-sm"></i> List item three</li>
                        <li class="ms-4"><i class="fas fa-dot-circle text-sm"></i> List item four</li>
                        <li class="ms-4"><i class="fas fa-dot-circle text-sm"></i> List item one</li>
                      </ul>
                      <p>Thank you,</p>
                      <p class="mt-3">John Doe</p>
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
