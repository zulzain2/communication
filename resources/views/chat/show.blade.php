@extends('layouts.app')

@section('content')

<div class="c">
    <div class="chat-header clearfix">
      <a href="/chat">
        <i class="fas fa-chevron-left"></i>
      </a>
      <div class="name-image bg-highlight">
        {{substr($friendInfo->name,0,1) }}
      </div>
        <div class="chat-with">{{ $friendInfo->name }}</div>
    </div> <!-- end chat-header -->
</div>
<div class="clearfix"></div>
<div class="content">
    <p class="text-center mb-0 font-11">Yesterday, 1:45 AM</p>
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
    </div><div class="clearfix"></div>
    <em class="speech-read mb-3">Delivered & Read - 07:18 PM</em>
    <div class="clearfix"></div>
    <div class="speech-bubble speech-right color-black">
        Awesome! Images too?
    </div>
    <div class="clearfix"></div>
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
    </div><div class="clearfix"></div>
    <em class="speech-read mb-3">Delivered & Read - 07:18 PM</em>
    <div class="clearfix"></div>
    <div class="speech-bubble speech-right color-black">
        Awesome! Images too?
    </div>

</div>
@endsection

@section('content2')
    <div id="footer-bar" class="d-flex">
        <div class="me-3 speach-icon">
        <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
        </div>
        <div class="flex-fill speach-input">
        <input type="text" class="form-control" placeholder="Enter your Message here">
        </div>
        <div class="ms-3 speach-icon">
        <a href="#" class="bg-blue-dark me-2"><i class="fa fa-arrow-up pt-2"></i></a>
        </div>
    </div>

    <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255" data-menu-effect="menu-over">
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




{{-- @push('scripts')

<script>
    $(document).ready(function() {
        $('#footer-bar').hide();
    });
    </script>

@endpush --}}
