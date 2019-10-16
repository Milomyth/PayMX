@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <!-- avatar -->
          <form method="post" action="{{ route('perfil.updateAvatar', $user->id)}}" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" onchange="sendForm()" style="background-image: url({{asset('/uploads/avatars')}}/{{ $user->avatar }});">
                </div>
            </div>
          <div class="col text-center">
            <button type="submit" class="file-upload-browse btn btn-info">Submit Avatar</button>
          </div>
        </div>        
        </form> 
        <!-- end avatar -->
        <form method="post" action="{{ route('perfil.update', $user->id)}}" >
          @csrf
          {{ method_field('PUT') }}
        <p class="card-description"> Editr Acceso </p>
          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input type="text" class="form-control" name="full_name" id="exampleInputName1" placeholder="{{ $user->full_name }}">
            @if ($errors->has('full_name'))
                <div class="alert alert-danger">{{ $errors->first('full_name') }}</div>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="{{ $user->email }}">
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Secreto">
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        <!--</form>-->
        </form>
{{--         <form method="post" action="{{ route('perfil.updateAvatar', $user->id)}}" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
            <input type="text" name="name" value="hola">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>  --}}
      </div>
    </div>
  </div>
  <!-- perfil adicional -->
  <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"> </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"> </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"> </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location"> </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label> <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea> </div>
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              </div>
@endsection
