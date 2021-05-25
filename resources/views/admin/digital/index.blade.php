@extends('layouts.admin')
@section('title','DigitalProduct')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
                <a class="btn btn-success" href="javascript:void(0)" id="createNewBusiness"> Create New DP</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">

    <div class="card card-primary">
        <div class="card-header">
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable" id="datatable-digital">
                    <thead>
                        <tr>
                            <th width="10">
                                ID
                            </th>
                            <th>
                                CLIENT ID
                            </th>
                            <th>
                                PRODUCT
                            </th>
                            <th>
                                SETUP
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="digitalForm" name="digitalForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="col-md-4 control-label">CLIENT ID</label>
                                        <input type="text" class="form-control" id="client_id" name="client_id"
                                            placeholder="Enter CLIENT ID" value="" maxlength="50" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-2 control-label">PRODUCT</label>
                                        <input type="text" id="product" name="product" required=""
                                            placeholder="Enter Description" class="form-control">
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="col-sm-2 control-label">SETUP</label>
                                        <input type="text" class="form-control" id="setup" name="setup"
                                            placeholder="Enter SETUP" value="" maxlength="50" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
