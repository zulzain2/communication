@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

        <div class="card card-style">
            <div class="content mt-0 mb-0">
                <div class="list-group list-custom-large">
                    <a href="#" data-toggle-theme="" data-trigger-switch="toggle-dark-home" class="border-0">
                        <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                        <span class="font-600">Dark Mode</span>
                        <strong>MaGICX will Remember</strong>
                        <div class="custom-control scale-switch ios-switch">
                            <input data-toggle-theme="" type="checkbox" class="ios-input" id="toggle-dark-home">
                            <label class="custom-control-label" for="toggle-dark-home"></label>
                        </div>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    
        <div class="content">
            <div class="row mb-n2">
    
                <div class="col-4 pe-2">
                    <div class="card card-style mx-0 mb-3">
                        <div class="p-3">
                            <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Chat</h4>
    
    
                            {{-- <div class="ph-col-12 mb-0">
                                <div class="ph-row">
                                    <div class="ph-col-12">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-10">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-2 empty"></div>
                                </div>
                            </div> --}}
    
    
                            <h1 class="font-700 font-28 color-red-dark  mb-0">3 <small class="font-12">Unread</small></h1>
    
                        </div>
                    </div>
                </div>
    
                <div class="col-4 ps-2 pe-2">
                    <div class="card card-style mx-0 mb-3">
                        <div class="p-3">
                            <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Meet</h4>
    
                            {{-- <div class="ph-col-12 mb-0">
                                <div class="ph-row">
                                    <div class="ph-col-12">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-10">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-2 empty"></div>
                                </div>
                            </div> --}}
    
                            <h1 class="font-700 font-28 color-blue-dark mb-0">2 <small class="font-12">Upcoming</small> </h1>
    
                        </div>
                    </div>
                </div>
                <div class="col-4 ps-2">
                    <div class="card card-style mx-0 mb-3">
                        <div class="p-3">
                            <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">File</h4>
    
                            {{-- <div class="ph-col-12 mb-0">
                                <div class="ph-row">
                                    <div class="ph-col-12">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-10">
                                        <div class="ph-item ph-no-space ph-no-border mb-2 mt-0"></div>
                                    </div>
                                    <div class="ph-col-2 empty"></div>
                                </div>
                            </div> --}}
    
                            <h1 class="font-700 font-18 color-green-dark mb-0">5.4/15 <small class="font-14">GB</small></h1>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card card-style">
            <div class="row px-3 py-3 m-0">
                <div class="col-2 align-self-center">
                    <a href="#" class="icon icon-xs rounded-xs color-white bg-blue-dark me-3"><i class="fas fa-video"></i></a>
                </div>
                <div class="col-8 align-self-center">
                    <h5>Meet</h5>
    
    
                    {{-- <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big">
                                <div class="ph-item ph-no-space ph-no-border mb-0 mt-0 big"></div>
                            </div>
                        </div>
                    </div> --}}
    
    
                    <p class="mb-0 mt-n2 opacity-50 font-11">2 Upcoming</p>
    
                </div>
                <div class="col-2 align-self-center">
    
                    <h5><br></h5>
    
                    {{-- <div class="ph-col-12 px-0 ">
                        <div class="ph-row">
                            <div class="ph-col-12 big">
                                <div class="ph-item ph-no-space ph-no-border mb-0 mt-0 big"></div>
                            </div>
                        </div>
                    </div> --}}
    
                    {{-- <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a> --}}
    
                </div>
            </div>
        </div>
    
        <h4 class="pb-2 mt-n2 mx-3">Upcoming Meeting</h4>
        <div class="splide single-slider slider-no-arrows slider-no-dots overflow-hidden" id="single-slider-cta">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="card card-style bg-21" data-card-height="300">
                            <div class="card-top mt-4 mx-3">
                                <img src="images/avatars/1s.png"
                                    class="float-start border border-white bg-yellow-light rounded-circle me-n3" width="35">
                                <img src="images/avatars/2s.png"
                                    class="float-start border border-white bg-blue-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/4s.png"
                                    class="float-start border border-white bg-mint-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/5s.png"
                                    class="float-start border border-white bg-highlight rounded-circle me-n3" width="35">
                                <span href="#" class="float-start color-white pt-1 ps-4 font-12">+6 others</span>
                            </div>
                            <div class="card-top">
                                <strong class="float-end text-center">
                                    <div class="bg-theme rounded-sm color-theme shadow-xl text-center m-3 overflow-hidden">
                                        <span class="bg-highlight font-10 d-block mb-2 px-3 line-height-xs py-1">AUG</span>
                                        <span class="font-23 font-800 d-block mb-n3 line-height-s">28</span><br>
                                    </div>
                                </strong>
                            </div>
                            <div class="card-bottom no-click">
                                <div class="content">
                                    <span class="bg-highlight px-2 py-1 font-10 rounded-xs text-uppercase font-600">Online
                                        Meeting</span>
                                    <h1 class="color-white mt-1">HSE Meeting</h1>
                                    <h2 class="color-white opacity-50 font-13 mt-n2 font-400">4 people have confirmed their
                                        attended.</h2>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <a href="#" data-menu="menu-event-sample"
                                    class="btn btn-m text-uppercase rounded-sm bg-highlight float-end mx-3 my-4 font-700">View</a>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card card-style bg-16" data-card-height="300">
                            <div class="card-top mt-4 mx-3">
                                <img src="images/avatars/1s.png"
                                    class="float-start border border-white bg-yellow-light rounded-circle me-n3" width="35">
                                <img src="images/avatars/2s.png"
                                    class="float-start border border-white bg-blue-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/4s.png"
                                    class="float-start border border-white bg-mint-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/5s.png"
                                    class="float-start border border-white bg-highlight rounded-circle me-n3" width="35">
                                <span href="#" class="float-start color-white pt-1 ps-4 font-12">+10 others</span>
                            </div>
                            <div class="card-top">
                                <strong class="float-end text-center">
                                    <div class="bg-theme rounded-sm color-theme shadow-xl text-center m-3 overflow-hidden">
                                        <span class="bg-red-dark font-10 d-block mb-2 px-3 line-height-xs py-1">AUG</span>
                                        <span class="font-23 font-800 d-block mb-n3 line-height-s">28</span><br>
                                    </div>
                                </strong>
                            </div>
                            <div class="card-bottom no-click">
                                <div class="content">
                                    <span class="bg-highlight px-2 py-1 font-10 rounded-xs text-uppercase font-600">Online
                                        Meeting</span>
                                    <h1 class="color-white mt-1">UMW Meeting</h1>
                                    <h2 class="color-white opacity-50 font-13 mt-n2 font-400">6 people have confirmed their
                                        attended.</h2>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <a href="#" data-menu="menu-event-sample"
                                    class="btn btn-m text-uppercase rounded-sm bg-highlight float-end mx-3 my-4 font-700">View</a>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card card-style bg-18" data-card-height="300">
                            <div class="card-top mt-4 mx-3">
                                <img src="images/avatars/1s.png"
                                    class="float-start border border-white bg-yellow-light rounded-circle me-n3" width="35">
                                <img src="images/avatars/2s.png"
                                    class="float-start border border-white bg-blue-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/4s.png"
                                    class="float-start border border-white bg-mint-dark rounded-circle me-n3" width="35">
                                <img src="images/avatars/5s.png"
                                    class="float-start border border-white bg-highlight rounded-circle me-n3" width="35">
                                <span href="#" class="float-start color-white pt-1 ps-4 font-12">+8 others</span>
                            </div>
                            <div class="card-top">
                                <strong class="float-end text-center">
                                    <div class="bg-theme rounded-sm color-theme shadow-xl text-center m-3 overflow-hidden">
                                        <span class="bg-red-dark font-10 d-block mb-2 px-3 line-height-xs py-1">AUG</span>
                                        <span class="font-23 font-800 d-block mb-n3 line-height-s">28</span><br>
                                    </div>
                                </strong>
                            </div>
                            <div class="card-bottom no-click">
                                <div class="content">
                                    <span class="bg-highlight px-2 py-1 font-10 rounded-xs text-uppercase font-600">Online
                                        Meeting</span>
                                    <h1 class="color-white mt-1">UAT Phase 1</h1>
                                    <h2 class="color-white opacity-50 font-13 mt-n2 font-400">2 people have confirmed their
                                        attended.</h2>
                                </div>
                            </div>
                            <div class="card-bottom">
                                <a href="#" data-menu="menu-event-sample"
                                    class="btn btn-m text-uppercase rounded-sm bg-highlight float-end mx-3 my-4 font-700">View</a>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
    
    
    
        <div class="card card-style">
            <div class="row px-3 py-3 m-0">
                <div class="col-2 align-self-center">
                    <a href="#" class="icon icon-xs rounded-xs color-white bg-red-dark me-3"><i class="fas fa-comments"></i></a>
                </div>
                <div class="col-8 align-self-center">
                    <h5>Chat</h5>
    
    
                    {{-- <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big">
                                <div class="ph-item ph-no-space ph-no-border mb-0 mt-0 big"></div>
                            </div>
                        </div>
                    </div> --}}
    
                    <p class="mb-0 mt-n2 opacity-50 font-11">5 Unread</p>
    
                </div>
                <div class="col-2 align-self-center">
    
                    <h5><br></h5>
    
                    {{-- <div class="ph-col-12 px-0 ">
                        <div class="ph-row">
                            <div class="ph-col-12 big">
                                <div class="ph-item ph-no-space ph-no-border mb-0 mt-0 big"></div>
                            </div>
                        </div>
                    </div> --}}
    
                    {{-- <a href="#" class="btn btn-xxs bg-highlight text-uppercase font-800">GO</a> --}}
    
                </div>
            </div>
        </div>
    
    
        <h4 class="pb-2 mt-n2 mx-3">Unread Chat</h4>
        <div class="card card-style" style="height: 300px;overflow-y: scroll;">
            <div class="content mx-2 my-1">
                <div class="list-group list-custom-large">
                    <a href="chat/13" class="pb-2">
                        <img src="images/pictures/1s.jpg" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
                            <span class="badge rounded-pill bg-fade-highlight-light color-highlight">04</span>
                        <span>Kamil</span>
                        <strong>A powerful Mobile Template</strong>
                        <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    </a>
                </div>
            </div>
            <div class="content mx-2 my-1">
                <div class="list-group list-custom-large">
                    <a href="chat/13" class="pb-2">
                        <img src="images/pictures/2s.jpg" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
                            <span class="badge rounded-pill bg-fade-highlight-light color-highlight">02</span>
                        <span>Fara</span>
                        <strong>A powerful Mobile Template</strong>
                        <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    </a>
                </div>
            </div>
            <div class="content mx-2 my-1">
                <div class="list-group list-custom-large">
                    <a href="chat/13" class="pb-2">
                        <img src="images/pictures/3s.jpg" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
                            <span class="badge rounded-pill bg-fade-highlight-light color-highlight">03</span>
                        <span>Fuad</span>
                        <strong>A powerful Mobile Template</strong>
                        <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    </a>
                </div>
            </div>
            <div class="content mx-2 my-1">
                <div class="list-group list-custom-large">
                    <a href="chat/13" class="pb-2">
                        <img src="images/pictures/4s.jpg" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
                            <span class="badge rounded-pill bg-fade-highlight-light color-highlight">01</span>
                        <span>Nabil</span>
                        <strong>A powerful Mobile Template</strong>
                        <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    </a>
                </div>
            </div>
            <div class="content mx-2 my-1">
                <div class="list-group list-custom-large">
                    <a href="chat/13" class="pb-2" style="border-bottom: none;">
                        <img src="images/pictures/5s.jpg" style="width:40px !important;margin-right: 15px;"
                            class="preload-img img-fluid rounded-circle">
                            <span class="badge rounded-pill bg-fade-highlight-light color-highlight">06</span>
                        <span>Daian</span>
                        <strong>A powerful Mobile Template</strong>
                        <span class="badge bg-dark-light mt-2">12:15 PM</span>
                    </a>
                </div>
            </div>
        </div>
    
    
    
        <div class="card card-style">
            <div class="row px-3 py-3 m-0">
                <div class="col-2 align-self-center">
                    <a href="#" class="icon icon-xs rounded-xs color-white bg-green-dark me-3"><i
                            class="fas fa-folder-open"></i></a>
                </div>
                <div class="col-10 align-self-center ">
                    <h5>File</h5>
    
    
                    {{-- <div class="ph-col-12 px-0">
                        <div class="ph-row">
                            <div class="ph-col-12 big">
                                <div class="ph-item ph-no-space ph-no-border mb-0 mt-0 big"></div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="progress mt-2 mb-1" style="height:3px;">
                    <div class="progress-bar border-0 bg-highlight text-start ps-2" role="progressbar" style="width: 40%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    </div>
                    <div class="row mb-0">
                    <div class="col-6 text-start">
                    <p class="mb-n1 font-12 opacity-60">Storage</p>
                    </div>
                    <div class="col-6 text-end">
                    <p class="mb-n1 font-12 opacity-60">5.6/15GB</p>
                    </div>
                    </div>
                     
    
                </div>
               
            </div>
        </div>
    
        <h4 class="pb-2 mt-n2 mx-3">Recently Uploaded</h4>
        <div class="card card-style">
            <div class="content">
    
                <a href="#" class="d-flex pb-4">
                    <div class="align-self-center">
                        <img src="images/document/svg/pdf.svg" class="rounded-sm" width="50">
                    </div>
                    <div class="align-self-center ps-3">
                        <h5 class="mb-n1">Mobile PWA's</h5>
                        <p class="font-600 opacity-40 mb-0">546kb</p>
                    </div>
                    <div class="align-self-center ms-auto">
                        <i class="fas fa-ellipsis-v font-2- pe-1 color-gray-light"></i>
                    </div>
                </a>
                <a href="#" class="d-flex pb-4">
                    <div class="align-self-center">
                        <img src="images/document/svg/doc.svg" class="rounded-sm" width="50">
                    </div>
                    <div class="align-self-center ps-3">
                        <h5 class="mb-n1">Custom Buttons</h5>
                        <p class="font-600 opacity-40 mb-0">1mb</p>
                    </div>
                    <div class="align-self-center ms-auto">
                        <i class="fas fa-ellipsis-v font-2- pe-1 color-gray-light"></i>
                    </div>
                </a>
                <a href="#" class="d-flex pb-4">
                    <div class="align-self-center">
                        <img src="images/document/svg/xls.svg" class="rounded-sm" width="50">
                    </div>
                    <div class="align-self-center ps-3">
                        <h5 class="mb-n1">Hybrid Apps 
                        </h5>
                        <p class="font-600 opacity-40 mb-0">127kb</p>
                    </div>
                    <div class="align-self-center ms-auto">
                        <i class="fas fa-ellipsis-v font-2- pe-1 color-gray-light"></i>
                    </div>
                </a>
                <a href="#" class="d-flex">
                    <div class="align-self-center">
                        <img src="images/document/svg/psd.svg" class="rounded-sm" width="50">
                    </div>
                    <div class="align-self-center ps-3">
                        <h5 class="mb-n1">Optimizing Performance</h5>
                        <p class="font-600 opacity-40 mb-0">5mb</p>
                    </div>
                    <div class="align-self-center ms-auto">
                        <i class="fas fa-ellipsis-v font-2- pe-1 color-gray-light"></i>
                    </div>
                </a>
            </div>
        </div>

        
    </div>
</div>
   
@endsection
