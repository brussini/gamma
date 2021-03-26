@extends('layouts.admin')
@section('title','Import DP')
@section('content')
    <h3 align="center">Importer un Fichier Digital Product</h3>
    <br />
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        Upload Validation Error<br><br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('/import_dp/import') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Select an Excel File</label></td>
                    <td width="30">
                        <input type="file" name="file_dp" class="btn btn-secondary" />
                    </td>
                    <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload" required>
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>

    <br />
    @foreach ($data as $row)
    <div class="modal fade" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color:black">Details :{{$row->client_id}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6"><h1> Mis Code:{{ $row->product}}</h1></div>
                            <div class="col-md-6">Description:{{$row->setup}}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Digital Product</h3></br>
            <span style="text-align:right">Number of rows:{{ count($data)}}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($data) > 0)
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client ID</th>
                            <th>Product</th>
                            <th>Setup</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $row->client_id }}</td>
                            <td>{{ $row->product }}</td>
                            <td>{{ $row->setup }}</td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}">View</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>


@endsection
