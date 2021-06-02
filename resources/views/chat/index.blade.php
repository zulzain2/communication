@extends('layouts.app')

@section('content')


  {{-- <style>
    .header-clear-medium{
    margin-top: 5vh !important;
    margin-bottom: 5vh !important;
    height: 89vh;
    padding-top: 0px !important;
    padding-bottom: 0px !important;
    }
</style> --}}

  <div class="row" style="height:90%">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">
      <div class="search-page">
        <div class="search-box search-header bg-theme card-style me-3 ms-3 mb-0">
          <i class="fa fa-search offset-xl-2" style="left: 0"></i>
          {{-- <input type="text" class="border-0" placeholder="What are you looking for? " data-search=""> --}}
          <input type="text" class="border-0" placeholder="What are you looking for? ">
          <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
        </div>
      </div>

      <div class="card card-style ms-3 mt-3" style="height:100%;">
        <div class="content">
          <div class="list-group list-custom-large">
            @if ($users->count())
              @foreach ($users as $user)
                <a href="{{ route('chat.show',$user->id) }}">
                  <div class="name-image bg-highlight">
                    <span style="margin-left: -0.5%;">{{substr($user->name,0,1) }}</span>
                  </div>
                  <span>{{ $user->name }}</span>
                  <strong>A powerful Mobile Template</strong>
                  <span class="badge bg-dark-light mt-2">12:15 PM</span>
                  <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
              </a>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block d-md-block" style="height:73vh;overflow-y: scroll;" id="chat-message" >
      {{-- content in here is append from the message.blade --}}
    </div>
  </div>
@endsection
@push('scripts')


@endpush
