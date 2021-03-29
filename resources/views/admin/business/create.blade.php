@extends('layouts.pos-admin.app')
@section('title', __('home.home'))

@section('content')
<?php 
?>
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>@lang('menu.menu_management')</h1>
    <ol class="breadcrumb">
        <li><a href="{{action('Admin\Pos\AdminHomeController@index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">@lang('menu.menu_management')</li>
        <li class="active">@lang('menu.menu_item')</li>
    </ol>
</section>

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

@section('javascript')
<script>

Dropzone.autoDiscover = false;

    Dropzone.options.itemImageDropzone = {
    url: '{{ route('admin.menu-items.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="item_image"]').remove()
      $('form').append('<input type="hidden" name="item_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="item_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($menuItem) && $menuItem->item_image)
      var file = {!! json_encode($menuItem->item_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="item_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/menu-items/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $menuItem->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>


@endsection