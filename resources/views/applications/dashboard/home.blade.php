@extends('applications.template')

@section('page')
    <h1>Hi,</h1>
    <form method="POST" action="save"  enctype="multipart/form-data" style="width:400px;margin:auto;">
        @csrf
        <img src="{{url('storage/avatars/1.png')}}" />
        <div class="form-group">
            <label for="form-file">Find A file</label>
            <input type="file" name="a_file" class="form-control-file" id="form-file">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Upload</button>
    </form>
@stop
