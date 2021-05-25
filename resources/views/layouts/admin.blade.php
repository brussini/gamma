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
{!! Toastr::message() !!}

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
   $('#datatable_seg').DataTable({
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
    $('#createNewBusiness').click(function () {
        $('#saveBtn').val("create-business");
        $('#id').val('');
        $('#businessForm').trigger("reset");
        $('#modelHeading').html("Create New Business");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editBusiness', function () {
      var book_id = $(this).data('id');
      $.get("{{ route('business.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Business");
          $('#saveBtn').val("edit-business");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#mis_code').val(data.mis_code);
          $('#description').val(data.description);
          $('#bu').val(data.bu);
          $('#segment').val(data.segment);
          $('#code').val(data.code);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#businessForm').serialize(),
          url: "{{ route('business.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#businessForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteBusiness', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('business.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
});
</script>
<script type="text/javascript"> 
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('#datatable_do').DataTable({
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
        ajax: "{{ url('dormant') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'branch_code',
                name: 'branch_code'
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
                data: 'cif',
                name: 'cif'
            },
            {
                data: 'ac_stat_dormant',
                name: 'ac_stat_dormant'
            },
            {
                data: 'eti_bus_seg',
                name: 'eti_bus_seg'
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
});
</script>

<script type="text/javascript"> 
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('#datatable-digital').DataTable({
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
        ajax: "{{ url('digital') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'client_id',
                name: 'client_id'
            },
            {
                data: 'product',
                name: 'product'
            },
            {
                data: 'setup',
                name: 'setup'
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
    $('#createNewDigital').click(function () {
        $('#saveBtn').val("create-digital");
        $('#client_id').val('');
        $('#digitalForm').trigger("reset");
        $('#modelHeading').html("Create New DigitalProduct");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editDigital', function () {
      var id = $(this).data('id');
      $.get("" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Digital");
          $('#saveBtn').val("edit-digital");
          $('#ajaxModel').modal('show');
          $('#client_id').val(data.client_id);
          $('#product').val(data.product);
          $('#setup').val(data.setup);
      })
   });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#digitalForm').serialize(),
          url: "",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#digitalForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('click', '.deleteDigital', function () {

        var id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "{{ route('digital.store') }}"+'/'+id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
</script>


</html>