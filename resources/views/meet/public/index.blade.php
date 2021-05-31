@extends('layouts.empty')

@section('content')
    <div id="meet" class="check-auth">

        <div class="card mb-0" style="height:100vh">
            <div class="card-center">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">
                        <div class="ps-5 pe-5">
                            <h1 class="color-white text-center text-uppercase font-900 fa-4x">JOIN</h1>

                            <p class="color-highlight text-center font-12 mb-3">
                                Login to get the complete tools offer by us.
                            </p>
                            <form class="needs-validation" novalidate id="joinMeetingForm">
                                <label for="meetingNameJoin" class="text-uppercase font-700 font-10 text-center w-100"
                                    style="background-color:transparent !important">Room Name</label>
                                <div class="input-style input-style-always-active no-borders no-icon mb-4">
                                    <input type="text" id="meetingNameJoin" class="form-control text-center"
                                        style="font-size: 22px!important;font-weight: bold !important;border: none;"
                                        required readonly>

                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em></em>
                                </div>

                                <br>

                                <a id="loginFirst" href="#"
                                    class="btn btn-3d btn-m btn-full mb-3 rounded-xs text-uppercase font-900 shadow-s border-red-dark bg-red-light">Connect
                                    First</a>
                                <br>

                                <div class="divider-icon divider-margins bg-highlight"><i
                                        class="font-17"><strong>OR</strong></i></div>

                                <div class="card card-style">
                                    <div class="content">
                                        <p class="text-center font-12 mb-2">
                                            Join Without Login
                                        </p>
                                        <div class="input-style input-transparent no-borders has-icon validate-field">
                                            <i class="fa fa-user"></i>
                                            <input type="name" class="form-control validate-name" id="usrNameJoin"
                                                placeholder="Nick Name" required>
                                            <label for="usrNameJoin" class="color-blue-dark font-10 mt-1">Nick Name</label>
                                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>
                                            <em>(required)</em>
                                        </div>

                                        <a href="#" id="join-meeting"
                                            class="btn btn-full btn-m shadow-large rounded-s text-uppercase font-900 bg-highlight">JOIN</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-overlay bg-black opacity-85"></div>
            <div class="card-overlay-infinite preload-img" data-src="{{ URL::to('images/pictures/_bg-infinite.jpg') }}">
            </div>
        </div>

        <div id="meetPublic"></div>
    </div>



@endsection

@section('content2')

    <div id="toast-1" class="toast toast-tiny toast-top bg-blue-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="far fa-copy"></i>&nbsp;&nbsp;Copied</div>

    <div id="toast-2" class="toast toast-tiny toast-top bg-red-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="fa fa-times me-3"></i>&nbsp;&nbsp;Copied Error</div>

    <div id="portfolio-2" class="menu menu-box-right" data-menu-width="cover" data-menu-effect="menu-over">
        <div id="meet_iframe" style="width: 100%;height: 100vh;z-index:999"></div>

        <a href="#" id="inviteBtn"
            class="btn btn-3d btn-m btn-full rounded-xs text-uppercase font-900 shadow-s border-red-dark bg-highlight"
            style="z-index:9999">Invite</a>
    </div>


    <div id="menu-meeting-invitation" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="320"
        style="display: block; height: 405px;">
        <div class="menu-title">
            <h1>Invite More People</h1>
            <p class="color-theme opacity-50">Share the meeting link to invite others</p>
            <a href="#" class="close-menu-meeting-invitation"><i class="fa fa-times"></i></a>
        </div>
        <div class="divider divider-margins mb-1 mt-3"></div>
        <div class="content">
            <div class="row mb-0">
                <div class="col-2">
                    <span class="icon icon-xl rounded-xl bg-gray-dark"><i class="fas fa-video font-30"></i></span>
                </div>
                <div class="col-10 ps-4">
                    <div class="d-flex">
                        <div>
                            <p class="font-700 color-theme ps-2">Meeting Name</p>
                        </div>
                        <div class="ms-auto">
                            <p id="invite-meeting-name"></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <p class="font-700 color-theme ps-2">Invitor</p>
                        </div>
                        <div class="ms-auto">
                            <p id="invite-invitor"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider mt-3 mb-3"></div>
            <div class="row mb-0">
                <div class="col-3">
                    <h4 class="font-14">Share Link</h4>
                </div>
                <div class="col-8">
                    <h4 id="invite-link" class="font-14 text-end"></h4>
                </div>
                <div class="col-1">
                    <!-- Trigger -->
                    <a href="#" class="copy-btn" data-clipboard-target="#invite-link">
                        <i class="far fa-copy"></i>
                    </a>

                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
                <div class="col-6">
                    <h4 class="font-14 mt-1">Share Invitation</h4>
                </div>
                <div class="col-6">
                    <h4 class="font-14 text-end mt-1">
                        <i class="far fa-copy"></i>&nbsp;
                        <i class="far fa-envelope"></i>&nbsp;
                        <i class="fab fa-google"></i>&nbsp;
                        <i class="fab fa-windows"></i>&nbsp;
                        <i class="fab fa-yahoo"></i>&nbsp;

                    </h4>
                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
