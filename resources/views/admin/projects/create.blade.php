@extends('layouts.admin')

@section('script')
<script src="{{asset("js/admin.js")}}" defer></script>
@endsection

@section('content')
    <div class="container py-4">
      <form action="{{route('admin.project.store')}}" method="post">
          @csrf
          @method('POST')
          <div class="mb-3">
            <label for="input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="input-nome" placeholder="Nome repo" name="input-nome">
            @error('input-nome')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="input-url" class="form-label">Url</label>
            <input type="text" class="form-control" id="input-url" placeholder="URL repo" name="input-url">
            @error('input-url')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Confirm</button>
          </div>
      </form>
    </div>
@endsection