@extends('layouts.admin')
@section('title','BusinessUnit')

@section('content')
<?php 
?>
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>@lang('menu.menu_management')</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">@lang('menu.menu_management')</li>
        <li class="active">@lang('menu.menu_item')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="">
                {{ trans('global.add') }} {{ trans('cruds.menuItem.title_singular') }}
            </a>
        </div>
    </div>
<div class="box box-primary">
    <div class="box-header">
        {{ trans('cruds.menuItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="box-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MenuItem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.item_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.item_cat') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.item_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.menuItem.fields.quantity') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>

                            </td>

                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</section>

@endsection
