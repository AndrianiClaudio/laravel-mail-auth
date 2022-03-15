@extends('layouts.admin')

@section('script')

    <script src="{{ asset('js/admin.js') }}" defer></script>

@endsection

@section('content')
<div class="card">
    <div class="card-image">
        <img src="" alt="">
    </div>
    <div class="card-body">
        <section class="section">
            <h3 class="text-primary text-decoration-underline">Dashboard</h3>
            <h5 class="card-title"><b>User: </b>{{Auth::user()->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>Email: </b>{{Auth::user()->email}}</h6>
            {{-- <a href="#" class="card-link">Card link</a> --}}
        </section>
    </div>
</div>
@endsection
