@extends('layouts.empty')

@section('content')


    <div class="card bg-transparent" data-card-height="cover">
    <div class="card-center text-center">
        <i class="fas fa-wifi-slash fa-8x color-red-dark"></i>
    <h1 class="fa-6x mt-5 font-900">Offline</h1>
    <h4 class="mb-5 mt-3">No Connection Detected</h4>
    <p class="mx-2">
        The action requires an internet connection to work. <br> Please connect turn on your WiFi or Celluar Data to Enable this action.
    </p>
    <div class="row ms-5 me-5 mt-5 mb-0">
    <div class="col-12">
    <a href="#" onclick='history.go(-1); return false;' class="btn btn-m rounded-sm btn-full bg-red-dark text-uppercase font-900"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
   
    </div>
    </div>
    </div>


@endsection
