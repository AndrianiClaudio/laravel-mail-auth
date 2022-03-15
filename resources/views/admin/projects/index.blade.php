@extends('layouts.admin')

@section('script')
    <script src="{{asset("js/admin.js")}} defer"></script>
@endsection

@section('content')
    {{-- admin/projects/index --}}
    {{-- @dd($projects) --}}
    @foreach ($projects as $prj)
        <div class="card">
            <div class="card-body">
                {{-- PROJECT NAME --}}
                <h4 class="card-text text-uppercase">{{$prj->name}}</h4>
                {{-- PROJECT SCREEN --}}
                @if($prj->screen)
                <img class="card-img-bottom" src="">
                @endif
                {{-- PROJECT URL --}}
                <a class="card-link" href="{{$prj->url}}">{{$prj->url}}</a>
            </div>
        </div>
    @endforeach
@endsection