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
    <div class="col-md-4 col-lg-3 col-sm-12">
      <div class="search-page">
        <div class="search-box search-header bg-theme card-style me-3 ms-3 mb-0">
          <i class="fa fa-search"></i>
          {{-- <input type="text" class="border-0" placeholder="What are you looking for? " data-search=""> --}}
          <input type="text" class="border-0" placeholder="What are you looking for? ">
          <a href="#" class="disabled"><i class="fa fa-times-circle color-red-dark"></i></a>
        </div>
<<<<<<< HEAD
      </div>

      <div class="card card-style ms-3 mt-3" style="height:100%;">
        <div class="content">
          <div class="list-group list-custom-large">
            @if ($users->count())
            <ul class="no-bullet">
              @foreach ($users as $user)
                <li class="user">
                  <div class="name-image bg-highlight">
                    {{substr($user->name,0,1) }}
                  </div>
                  <div class="information" id="{{ $user->id }}">
                    <span>{{ $user->name }}</span><br>
                    <strong>A powerful Mobile Template</strong>
                  </div>
                  {{-- <a href="{{ chat/13 }}"> --}}
                  {{-- <a href="{{ route('chat.show',$user->id)}}"> --}}
                  {{-- </a> --}}
                </li>
                @endforeach
              </ul>
            @endif
          </div>
=======
        <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block" style="height:82vh;overflow-y: scroll;">

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
>>>>>>> parent of ad1abd2... ui
        </div>
      </div>
    </div>
    {{-- <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block d-md-block" style="height:73vh;overflow-y: scroll;" id="chat-message">

    </div> --}}
    <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block d-md-block" style="height:73vh;overflow-y: scroll;" id="chat-message" >
      {{-- content in here is append from the message.blade --}}
    </div>
  </div>
@endsection


@section('content2')

  <div id="menu-upload" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached rounded-m"
    data-menu-height="255" data-menu-effect="menu-over">
    <div class="list-group list-custom-small ps-2 me-4">
      <a href="#">
        <i class="font-14 fa fa-file color-gray-dark"></i>
        <span class="font-13">File</span>
        <i class="fa fa-angle-right"></i>
      </a>
      <a href="#">
        <i class="font-14 fa fa-image color-gray-dark"></i>
        <span class="font-13">Photo</span>
        <i class="fa fa-angle-right"></i>
      </a>
      <a href="#">
        <i class="font-14 fa fa-video color-gray-dark"></i>
        <span class="font-13">Video</span>
        <i class="fa fa-angle-right"></i>
      </a>
      <a href="#">
        <i class="font-14 fa fa-user color-gray-dark"></i>
        <span class="font-13">Camera</span>
        <i class="fa fa-angle-right"></i>
      </a>
      <a href="#">
        <i class="font-14 fa fa-map-marker color-gray-dark"></i>
        <span class="font-13">Location</span>
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>

@endsection
@push('scripts')
<script>
  //This is a function to append the html from the chat page,with another page by calling the html(data)
  //data is the receiver id, with the related item called.
  var receiver_id = "";
  var my_id = "{{ Auth()->id() }}";
  $(document).ready(function(){
    //ajax setup for csrf
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('46c1918f0cc91a6a5485', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        // alert(JSON.stringify(data));
        if(my_id == data.from){

        }
        else if (my_id == data.to){
          if(receiver_id == data.from){
            // if receiver is selected, reload the selected user
            $('#' + data.from).click()
          }
        }
      });
    $(".information").click(function(){
      receiver_id = $(this).attr('id');
      $.ajax({
        type: "get",
        url:"chat/" + receiver_id, // getMessage is the route
        data: "",
        cache:false,
        success: function(data){
          $('#chat-message').html(data);
          $('#chat-message').scrollTop($('#chat-message')[0].scrollHeight);
        }
      })
    });
  });
  // console.log(receiver_id);

  $(document).on('keypress','.speach-input input',function(e) {
    var message = $(this).val();

    if(e.which == 13 && message != '' && receiver_id != '') {
      $(this).val(''); // after pressing, it will be emptied
      var datastr = "receiver_id=" + receiver_id + "&message=" + message ;
      $.ajax({
        type:'post',
        url: 'message',
        data: datastr,
        cache: false,
        success:function(data){

        },
        error: function(jqXHR, status, err){
        },
        complete: function(data) {
          console.log(data);
          scrollToBottomFunc();
        }
      })
    }
  });
  // make a function to scroll down auto
  function scrollToBottomFunc() {
    $('#chat-message').animate({
        scrollTop: $('#chat-message').get(0).scrollHeight
    }, 100);
  }
</script>

@endpush
