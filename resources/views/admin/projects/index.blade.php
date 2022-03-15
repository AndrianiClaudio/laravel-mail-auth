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
        <div class="d-flex justify-content-between">
            {{-- PROJECT NAME --}}
            <h4 class="card-text text-uppercase">{{$prj->name}}</h4>
            @if($prj->technologies)
            <div class="technologies">
                <ul class="list-group list-group-horizontal">
                    @foreach($prj->technologies as $tech)
                    <li class="list-group-item border-0">
                        <span class="badge rounded-pill 
                        @if($tech->name === 'HTML') bg-success
                        @else @if($tech->name === 'PHP') bg-info
                        @else @if($tech->name === 'JS') bg-warning text-dark
                        @else bg-secondary @endif @endif @endif">{{$tech->name}}</span></li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
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