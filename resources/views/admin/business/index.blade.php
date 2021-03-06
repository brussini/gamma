@extends('layouts.admin')
@section('title','BusinessUnit')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
                <a class="btn btn-success" href="javascript:void(0)" id="createNewBusiness"> Create New BU</a>
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
                <table class=" table table-bordered table-striped table-hover datatable" id="datatable-business">
                    <thead>
                        <tr>
                            <th width="10">
                                ID
                            </th>
                            <th>
                                MIS CODE
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                BU
                            </th>
                            <th>
                                Segment
                            </th>
                            <th>
                                Code
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
                <form id="businessForm" name="businessForm" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="col-md-4 control-label">MIS CODE</label>
                                        <input type="text" class="form-control" id="mis_code" name="mis_code"
                                            placeholder="Enter MIS CODE" value="" maxlength="50" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-sm-2 control-label">DESCRIPTION</label>
                                        <textarea id="description" name="description" required="" placeholder="Enter Description"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="col-sm-2 control-label">BU</label>
                                        <input type="text" class="form-control" id="bu" name="bu"
                                            placeholder="Enter BU" value="" maxlength="50" required="">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="col-sm-4 control-label">SEGMENT</label>
                                        <input type="text" class="form-control" id="segment" name="segment"
                                            placeholder="Enter Segment" value="" maxlength="50" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-sm-2 control-label">CODE</label>
                                        <textarea id="code" name="code" required="" placeholder="Enter Code"
                                            class="form-control"></textarea>
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