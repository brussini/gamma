@include('partials.header')

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed sidebar-collapse">
  @include('partials.sidenav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->

  <footer class="main-footer">
    @include('partials.footer')
  </footer>
</body>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<!-- <script src="https://code.highcharts.com/highcharts.src.js"></script> --> 
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.flash.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>



<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- PAGE SCRIPTS -->
<!--<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>-->
<!-- page script -->



</body>
<script type="text/javascript">
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#datatable-business').DataTable({
        dom: 'Bfrtip',
        'info': true,
        /*buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/
        buttons: [{
          extend: 'excel',
          text: '<span class="fa fa-file-excel-o"></span> Excel Export',
          exportOptions: {
            modifier: {
              search: 'applied',
              order: 'applied',
              page : 'all'
            }
          }
        }],
        processing: true,
        serverSide: true,
        ajax: "{{ url('business') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'mis_code',
                name: 'mis_code'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'bu',
                name: 'bu'
            },
            {
                data: 'segment',
                name: 'segment'
            },
            {
                data: 'code',
                name: 'code'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ],
        order: [
            [0, 'desc']
        ]
    });
  var table =   $('#datatable_seg').DataTable({
        dom: 'Bfrtip',
        'info': true,
        /*buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],*/
        buttons: [{
          extend: 'excel',
          text: '<span class="fa fa-file-excel-o"></span> Excel Export',
          exportOptions: {
            modifier: {
              search: 'applied',
              order: 'applied',
              page : 'all'
            }
          }
        }],
        processing: true,
        serverSide: true,
        ajax: "{{ url('segment') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'gl_code',
                name: 'gl_code'
            },
            {
                data: 'cust_ac_no',
                name: 'cust_ac_no'
            },
            {
                data: 'ac_desc',
                name: 'ac_desc'
            },
            {
                data: 'account_class',
                name: 'account_class'
            },
            {
                data: 'comp_mis_4',
                name: 'comp_mis_4'
            },
            {
                data: 'solde',
                name: 'solde'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ],
        order: [
            [0, 'desc']
        ]
    });
    $('body').on('click', '.delete', function() {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data('id');
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('delete-business') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#datatable-crud').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    });
    $('#createNewBusiness').click(function () {
        $('#saveBtn').val("create-business");
        $('#book_id').val('');
        $('#businessForm').trigger("reset");
        $('#modelHeading').html("Create New BU");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editBook', function () {
      var book_id = $(this).data('id');
      $.get("" +'/' + book_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Book");
          $('#saveBtn').val("edit-book");
          $('#ajaxModel').modal('show');
          $('#book_id').val(data.id);
          $('#title').val(data.title);
          $('#author').val(data.author);
      })
   });
});
</script>

</html>