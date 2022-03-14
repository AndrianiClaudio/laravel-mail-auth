@extends('layouts.admin')

@section('script')
    <script src="{{asset("js/admin.js")}} defer"></script>
@endsection

@section('content')
    admin/projects/index
    {{-- @dd($projects) --}}
@endsection