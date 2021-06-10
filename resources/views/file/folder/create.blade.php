@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

      
        <div class="card card-style">
          <div style="margin:10%">
            <form action="{{ route('file.storeFolder') }}" method="post">
              @csrf
              <h6><span class="label label-default">* Name of folder</span></h6>
              <input type="text" name="name" id="name" class="form-control" required>
              <br>
              <h6><span class="label label-default">Description</span></h6>
              <input type="text" name="description" id="description" class="form-control">
              <div class="col text-center" style="margin-top:5%">
                <button type="submit" class="btn btn-s btn-primary text-center" >Submit</button>
              </div>
            </form>
          </div>
        </div>
    
    </div>
</div>

@endsection
