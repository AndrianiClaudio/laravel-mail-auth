@extends('layouts.admin')

@section('script')
<script src="{{asset("js/admin.js")}}" defer></script>
@endsection

@section('content')
<form action="{{route('admin.project.store')}}" method="post">
    @csrf
    @method('POST')
  <div class="mb-3">
    <label for="input-nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="input-nome" name="input-nome" placeholder="{{$prj->name}}">
    @error('input-nome')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
    @enderror
  </div>
  {{-- <div class="mb-3">
  <label for="input-url" class="form-label">Url</label>
  <input type="text" class="form-control" id="input-url" placeholder="URL repo" name="input-url">
  @error('input-url')
      <div class="alert alert-danger" role="alert">
          {{$message}}
      </div>
  @enderror
  </div> --}}
  {{-- Select one or more categories --}}
  <div class="input-group mb-3">
  {{-- @foreach ($technologies as $tech)
      <div class="input-group-text">
          <label for="{{$tech->name}}">{{$tech->name}}</label>
          <input class="form-check-input ms-3 mt-0" type="checkbox" value="{{$tech->id}}" name="technologies[]">
      </div>
      
  @endforeach --}}
  </div>
  
  <div class="mb-3">
    <div class="row">
      <div class="col">
        <input type="file" name="screen" class="form-control">
      </div>
    </div>
  </div>

  <div class="mb-3">
  <button type="submit" class="btn btn-primary mb-3">Confirm</button>
  </div>
</form>
@endsection