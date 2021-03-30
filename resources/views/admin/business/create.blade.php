@extends('layouts.admin')
@section('title','BusinessUnit')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
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

<div class="box box-primary">
    <div class="box-header">
        {{ trans('global.create') }} {{ trans('cruds.menuItem.title_singular') }}
    </div>

    <div class="box-body">
        <form method="POST" action="{{ action('Admin\Pos\MenuItemController@store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.menuItem.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_name">{{ trans('cruds.menuItem.fields.item_name') }}</label>
                <input class="form-control {{ $errors->has('item_name') ? 'is-invalid' : '' }}" type="text" name="item_name" id="item_name" value="{{ old('item_name', '') }}">
                @if($errors->has('item_name'))
                    <span class="text-danger">{{ $errors->first('item_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.item_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_cat_id">{{ trans('cruds.menuItem.fields.item_cat') }}</label>
                <select class="form-control select2 {{ $errors->has('item_cat') ? 'is-invalid' : '' }}" name="item_cat_id" id="item_cat_id">
                    @foreach($item_cats as $id => $item_cat)
                        <option value="{{ $id }}" {{ old('item_cat_id') == $id ? 'selected' : '' }}>{{ $item_cat }}</option>
                    @endforeach
                </select>
                @if($errors->has('item_cat'))
                    <span class="text-danger">{{ $errors->first('item_cat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.item_cat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_desc">{{ trans('cruds.menuItem.fields.item_desc') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('item_desc') ? 'is-invalid' : '' }}" name="item_desc" id="item_desc">{!! old('item_desc') !!}</textarea>
                @if($errors->has('item_desc'))
                    <span class="text-danger">{{ $errors->first('item_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.item_desc_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="item_image">{{ trans('cruds.menuItem.fields.item_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('item_image') ? 'is-invalid' : '' }}" id="item_image-dropzone">
                </div>
                @if($errors->has('item_image'))
                    <span class="text-danger">{{ $errors->first('item_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.item_image_helper') }}</span>
            </div> -->
            <div class="form-group">
                            <label class="col-sm-2 control-label">Item Image</label>
                            <div class="form-group col-sm-10">
                                <input type="file" name="item_image" class="form-control" />
                                <img src="" width="100px">

                            </div>
                            
                        </div>
            <div class="form-group">
                <label class="required" for="cost">{{ trans('cruds.menuItem.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', '') }}" step="0.01" required>
                @if($errors->has('cost'))
                    <span class="text-danger">{{ $errors->first('cost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.menuItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1" required>
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menuItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-default" href="{{ action('Admin\Pos\MenuItemController@index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </form>
    </div>
</div>

</section>

@endsection


