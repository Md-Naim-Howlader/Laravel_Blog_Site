<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/summernote/summernote-bs4.min.css">

    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">

  <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.min.css">

<style>

.note-editable {
    min-height: 150px; /* Default height */
    padding: 10px; /* Ensure spacing */
}
.note-toolbar {
    display: flex !important;
    visibility: visible !important;
    opacity: 1 !important;
}
 .note-btn-group .note-btn {
    border-color: rgba(0,0,0,.2);
    padding: .28rem .65rem;
    font-size: 13px;
   background-color: #ffffff;
    color: #000 ;
}

  </style>
    {{-- tailwind css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('partials.backend.header');
  @include('partials.backend.sidebar');
  <main class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <!-- @yield("main-content") -->
         {{$slot}}
      </div>
    </div>
  </main>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- jquery  -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/backend') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('/backend') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('/backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/backend') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/backend') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/backend') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/backend') }}/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!--  script for summernote -->
<script src="{{ asset('/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
      $(function () {
        // Summernote
        $("#summernote").summernote({
        });
      });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Toastr JS -->
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="{{ asset('backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (session('info'))
        toastr.info("{{ session('info') }}");
    @endif
</script>



<script>
  $(document).on("click", "#delete", function (e) {
    e.preventDefault();  // Prevent default behavior
    let link = $(this).attr("href");  // Get the link of the delete button

    Swal.fire({
      title: "Are you sure you want to delete?",
      text: "Once deleted, this will be permanently gone!",
      icon: "warning",
      showCancelButton: true,  // Show cancel button
      confirmButtonColor: "#3085d6",  // Confirm button color
      cancelButtonColor: "#d33",  // Cancel button color
      confirmButtonText: "Yes, delete it!",  // Button text for confirmation
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;  // If confirmed, redirect to delete link
      } else {
        Swal.fire("Safe data!");
      }
    });
  });
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure to Delete ?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
<script>
  $(document).on("click", "#logout", function (e) {
    e.preventDefault();  // Prevent default behavior
    let link = $(this).attr("href");  // Get the link of the delete button

    Swal.fire({
      title: "Are you sure you want to Logout?",
      icon: "warning",
      showCancelButton: true,  // Show cancel button
      confirmButtonColor: "#3085d6",  // Confirm button color
      cancelButtonColor: "#d33",  // Cancel button color
      confirmButtonText: "Yes",  // Button text for confirmation
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href = link;  // If confirmed, redirect to delete link
      } else {
        Swal.fire("Safe data!");
      }
    });
  });
</script>
</body>
</html>
