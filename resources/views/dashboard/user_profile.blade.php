@extends('layouts.app')

@section('content')
  @if (session('info'))
    {{ session('info')}}
  @endif
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        @foreach ($users as $user)
        <h4 class="card-title">{{ $user->full_name}}</h4>
        <p class="card-description"> Editr Acceso </p>
        <!--<form class="forms-sample" action="{{route('perfiluser.update', $user->id)}}"  method="post" enctype="multipart/form-data"> -->
        <form method="post" action="{{ route('perfiluser.update', $user->id)}}">
          @csrf
          {{ method_field('PUT') }}
          <div class="form-group">
            <label for="exampleInputName1">Nombre</label>
            <input type="text" class="form-control" name="full_name" id="exampleInputName1" placeholder="{{ $user->full_name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="{{ $user->email }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Secreto">
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="avatar" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        <!--</form>-->
        {{Form::close()}}
        @endforeach
      </div>
    </div>
  </div>
@endsection
