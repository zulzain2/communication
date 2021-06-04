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
            {{-- @if ($users->count()) --}}
              @foreach ($users as $user)
                <a href="{{ route('chat.show',$user->id) }}">
                  <div class="name-image bg-highlight">
                    <span style="margin-left: -0.5%;">{{substr($user->name,0,1) }}</span>
                  </div>
                  <span>{{ $user->name }}</span>
                  <strong>A powerful Mobile Template</strong>
                    @if($user->unread)
                        <span class="badge rounded-pill bg-fade-highlight-light color-highlight" id="pending">{{ $user->unread }}</span>
                    @endif
                  <span class="badge bg-dark-light mt-2">12:15 PM</span>
                  {{-- <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span> --}}
              </a>
              @endforeach
          </div>

        {{-- <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block" style="height:82vh;overflow-y: scroll;">

            <div class="content">
                <div class="speech-bubble speech-right color-black">
                    These are chat bubbles, right? They look awesome don't they?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                    Yeap!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                    They also expand to a certain point, just like the ones that Mobile Chat apps have!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                    Awesome! Images too?
                </div>
                <div class="clearfix"></div>
                <p class="text-center mb-0 font-11">Yesterday, 1:45 AM</p>
                <div class="speech-bubble speach-image speech-left bg-highlight">
                    <img class="img-fluid preload-img" src="images/empty.png" data-src="images/pictures/8w.jpg" alt="img">
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                    Images can be used here as well, very easy! Just add an image tag!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                    WOW! Videos?!
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-right color-black">
                    Can I Embed videos or wait, actually, can I add maps?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speach-image speech-left">
                    <iframe class="w-100" src='https://www.youtube.com/watch?v=mnwj6KxAvFc' frameborder='0' allowfullscreen=""></iframe>
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-left bg-highlight">
                    Yep! Just embed your stuff here. It's super simple. You just copy the embed code in this place.
                </div>
                <div class="clearfix"></div>
                    <p class="text-center mb-0 font-11">25 Minutes Ago</p>
                <div class="speech-bubble speech-right color-black">
                    Is this an actual chat system? Can i send messages already?
                </div>
                <div class="clearfix"></div>
                <div class="speech-bubble speech-last speech-left bg-highlight">
                    It's just a chat template, but it's ready and able to be coded into a full chat system. Great huh?
                </div>
                <div class="clearfix"></div>
                <em class="speech-read mb-3">Delivered & Read - 07:18 PM</em>
            </div>

        </div> --}}
      </div>
    </div>
    <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block d-md-block" style="height:73vh;overflow-y: scroll;" id="chat-message" >
      {{-- content in here is append from the message.blade --}}
    </div>
  </div>
@endsection
@push('scripts')
<script>
</script>

@endpush
