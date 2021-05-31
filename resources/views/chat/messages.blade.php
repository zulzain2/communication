<div class="c">
  <div class="chat-header clearfix">
    <div class="name-image bg-highlight">
      {{substr($friendInfo->name,0,1) }}
    </div>
      <div class="chat-with">
        {{ $friendInfo->name }}
      </div>
  </div> <!-- end chat-header -->
</div>
<div class="content">
  <ul class="no-bullet" style="margin-top: 10%;">
    @foreach($chat_message as $message)
        <li class="clearfix">
            {{--if message from id is equal to auth id then it is sent by logged in user --}}
            <div class="{{ ($message->from == Auth::id()) ? 'speech-bubble speech-left bg-highlight' : 'speech-bubble speech-right color-black' }}">
                  {{ $message->message }}
                  <br>
                <small>{{ date('h:i a', strtotime($message->created_at)) }}</small>
            </div>
        </li>
    @endforeach
  </ul>
</div>
<div class="row">
  <div class="col-md-8 col-lg-9 col-sm-12 d-none d-lg-block offset-lg-3 offset-md-4">
    <div class="d-flex" style="width: inherit;position: fixed;bottom: 80px;right: 0;z-index: 98;">
      <div class="me-3 speach-icon text-center">
        <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
      </div>
      <div class="flex-fill speach-input">
        <input type="text" class="form-control" placeholder="Enter your Message here">
      </div>
      <div class="ms-3 speach-icon text-center me-2">
        <a href="#" class="bg-highlight me-2"><i class="fa fa-arrow-up pt-2"></i></a>
      </div>
    </div>
  </div>
</div>
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
