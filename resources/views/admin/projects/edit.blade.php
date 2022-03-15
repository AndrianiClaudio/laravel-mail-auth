@extends('layouts.admin')

@section('script')
<script src="{{asset("js/admin.js")}}" defer></script>
@endsection

@section('content')
<form action="{{route('admin.project.update',$prj->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="{{$prj->name}}" value="{{$prj->name}}">
    @error('name')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="url" class="form-label">Url</label>
    <input type="text" class="form-control" id="url" placeholder="{{$prj->url}}"  value="{{$prj->url}}" name="url">
    @error('url')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
    @enderror
  </div>

  <div class="mb-3">
    @if($prj->screen)
    <img class="d-block img-img-fluid" height="250px" src="{{asset('storage/'.$prj->screen)}}">
    @endif
    <input type="file" name="screen" class="form-control">
  </div>

  <div class="mb-3">
    <button type="submit" class="btn btn-primary mb-3">Confirm</button>
  </div>
</form>
@endsection