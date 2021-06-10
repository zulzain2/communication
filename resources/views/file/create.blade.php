@extends('layouts.app')

@section('content')
<form action="/file/store" method="post" class="form-horizontal" enctype ="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">
      <div class="card card-style">
          <input type="file" id="input-file-now" name="file" id="file"  class="dropify" data-height="150"/>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <input class="btn btn-primary" style="text-align:center"type="submit" value="Add">
    </div>
  </div>
</form>
@endsection

@push('scripts')
    
  @endpush