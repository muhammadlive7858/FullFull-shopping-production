@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('admin.index') }}" class="btn btn-outline-primary">admin panel</a>
            </div>
            <div class="map">
                <iframe src="" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
