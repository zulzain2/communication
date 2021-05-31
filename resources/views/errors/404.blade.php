@extends('layouts.empty')

@section('content')

<div class="card bg-transparent" data-card-height="cover">
    <div class="card-center text-center">
        <i class="fa fa-exclamation-triangle fa-8x color-red-dark"></i>
        <h1 class="fa-6x mt-5 font-900">404</h1>
        <h4 class="mb-5 mt-3">Page not Found</h4>
        <p>
            The page you're looking for cannot be found.<br>
            How about trying the homepage?
        </p>
        <div class="row ms-5 me-5 mt-5 mb-0">
            <div class="col-3"></div>
            <div class="col-6">
                <a href="/home"
                    class="btn btn-m rounded-sm btn-full bg-red-dark text-uppercase font-900">Home</a>
            </div>
            
        </div>
    </div>
</div>

@endsection