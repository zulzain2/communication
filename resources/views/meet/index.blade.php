@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

            <div id="meet">

                <div class="card card-style bg-theme pb-0">
                    <div class="content" id="tab-group-1">
                        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                            <a href="#" id="meeting-tab-1" data-active="" data-bs-toggle="collapse" data-bs-target="#tab-1"
                                class="bg-highlight no-click" aria-expanded="true"><i
                                    class="far fa-plus-square"></i>&nbsp;&nbsp;
                                Create</a>
                            <a href="#" id="meeting-tab-2" data-bs-toggle="collapse" data-bs-target="#tab-2"
                                aria-expanded="false" class="collapsed"><i class="fas fa-person-booth"></i>&nbsp;&nbsp;
                                Join</a>
                            <a href="#" id="meeting-tab-3" data-bs-toggle="collapse" data-bs-target="#tab-3"
                                aria-expanded="false" class="collapsed"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;
                                Schedule</a>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div data-bs-parent="#tab-group-1" class="collapse show" id="tab-1" style="">
                            <form class="needs-validation" id="createMeetingForm" novalidate>
                                <h3 class="text-center">Create Meeting</h3>
                                <p></p>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingName" type="name" class="form-control"
                                        placeholder="Enter meeting name" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                                        Name</label>
                                    <em>(required)</em>
                                </div>

                                <input id="usrName" type="hidden" class="form-control validate-name usrName"
                                    placeholder="Enter display name">

                                <div class="row">
                                    <div class="col-12 text-center">

                                        <a href="#" id="start-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Start Meeting</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-2" style="">
                            <h3 class="text-center"> Join Meeting</h3>
                            <p></p>

                            <form class="needs-validation" novalidate id="joinMeetingForm">
                                <div class="input-style input-style-always-active has-borders has-icon validate-field mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingIdJoin" type="name" class="form-control validate-name"
                                        placeholder="Enter meeting ID" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting ID</label>
                                    <em>(required)</em>
                                </div>

                                <input id="usrNameJoin" type="hidden" class="form-control validate-name usrName"
                                    placeholder="Enter display name" value="">

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="#" id="join-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Join Meeting</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-3" style="">

                            <h3 class="text-center"> Schedule Meeting</h3>
                            <p></p>

                            <form class="needs-validation" novalidate id="scheduleMeetingForm">
                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="fas fa-home color-highlight"></i>
                                    <input id="meetingNameSchedule" type="name" class="form-control"
                                        placeholder="Enter meeting name" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                                        Name</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-calendar-alt color-highlight"></i>
                                    <input id="meetingDateSchedule" type="date" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Date</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-clock color-highlight"></i>
                                    <input id="meetingStartSchedule" type="time" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Start</label>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                                    <i class="far fa-clock color-highlight"></i>
                                    <input id="meetingEndSchedule" type="time" class="form-control" required>
                                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">End</label>
                                    <em>(required)</em>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="#" id="schedule-meeting"
                                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                                class="fas fa-play"></i>&nbsp;&nbsp;Schedule Meeting</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="card card-style bg-theme pb-0">
                    <div class="content" id="tab-group-2">
                        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                            <a href="#" id="meeting-schedule" data-active="" data-bs-toggle="collapse"
                                data-bs-target="#schedule" class="bg-highlight no-click" aria-expanded="true"><i
                                    class="far fa-calendar-alt"></i>&nbsp;&nbsp;
                                Schedule</a>
                            <a href="#" id="meeting-log" data-bs-toggle="collapse" data-bs-target="#log"
                                aria-expanded="false" class="collapsed"><i class="fas fa-stream"></i> &nbsp;&nbsp; Log</a>
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse show" id="schedule" style="">

                            <div id="schedule-log" class="">
                                <div class="content mb-0">
                                    <h1>Meeting Schedule</h1>
                                    <p class="font-10 color-highlight mt-n2 mb-0">All your upcoming meeting displayed here.
                                    </p>
                                    <span class="cal-message mt-3 mb-3">
                                        <i class="fa fa-bell font-18 color-green-dark"></i>
                                        <strong class="color-gray-dark ps-0">All scheduled meeting comes with
                                            reminder.</strong>
                                        <strong class="color-gray-dark ps-0">On start of meeting, notification will be
                                            sent.</strong>
                                    </span>
                                    <div class="divider mb-3"></div>
                                    <div id="schedule-log-list">

                                        <br>

                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border color-highlight text-center" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>

                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse" id="log" style="">
                            <div id="meeting-log" class="">
                                <div class="content mb-0">
                                    <h1>Meeting Log</h1>
                                    <p class="font-10 color-highlight mt-n2 mb-0">All your recent meeting displayed here.
                                    </p>
                                    <div class="divider my-3"></div>
                                    <div id="meeting-log-list" class="mb-4" style="height: 360px;overflow-y: scroll;">

                                        <br>

                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border color-highlight text-center" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>

                                        <br>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection


@section('content2')

    <div id="toast-1" class="toast toast-tiny toast-top bg-blue-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="far fa-copy"></i>&nbsp;&nbsp;Copied</div>

    <div id="toast-2" class="toast toast-tiny toast-top bg-red-dark fade hide text-center" data-bs-delay="1000"
        data-autohide="true" style="z-index:9999"><i class="fa fa-times me-3"></i>&nbsp;&nbsp;Copied Error</div>

    <div id="portfolio-2" class="menu menu-box-right" data-menu-width="cover" data-menu-effect="menu-over"
        style="overflow:hidden">
        <div id="meet_iframe" style="width: 100%;height: 95vh;z-index:999"></div>

        <div class="row" style="height:5vh">
            <div class="col-lg-12">

                <table style="border:none;height:100%;width: 100%;background-color: #656d78!important;">
                    <tr>
                        <td style="border:none;vertical-align:middle;background-color: transparent !important;"> <a href="#"
                                id="inviteBtn"
                                class="btn btn-xs btn-full rounded-xs text-uppercase font-900 shadow-s bg-dark-light">Invite</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <div id="menu-meeting-invitation" class="col-lg-4 offset-lg-4 menu menu-box-bottom menu-box-detached rounded-m"
        data-menu-height="320" style="display: block; height: 405px;">
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
                <div class="col-9 text-end">
                    <strong id="invite-link" class="font-14 text-end"></strong> &nbsp;&nbsp;
                    <a href="#" class="copy-btn color-blue-dark" data-clipboard-target="#invite-link">
                        <i class="far fa-copy"></i>
                    </a>
                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
                <div class="col-6">
                    <h4 class="font-14 mt-1">Share Invitation</h4>
                </div>
                <div class="col-6">
                    <h4 class="font-14 text-end mt-1">
                        <a href="#" id="whatsapp-link">
                            <i
                                class="font-18 fab fa-whatsapp color-whatsapp align-middle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a href="#" id="mail-link">
                            <i
                                class="font-18 far fa-envelope color-brown-dark align-middle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a href="#" id="gmail-link">
                            <i
                                class="font-18 fab fa-google color-google align-middle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                        <a href="#" id="outlook-link">
                            <i
                                class="font-18 fab fa-microsoft color-teal-dark align-middle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </h4>
                </div>
                <div class="divider divider-margins w-100 mt-2 mb-2"></div>
            </div>
        </div>
    </div>

    <div id="menu-meeting-schedule-config" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached"
        style="display: block;">
        <div class="menu-title mt-n1 text-center">
            <h3 class="mt-3">Options</h3>
        </div>
        <div class="content mb-0 mt-0">
            <div class="list-group list-custom-small list-icon-0">
                <a href="#" id="start-schedule-meeting">
                    <i class="font-18 fas fa-play color-blue-light"></i>
                    <span class="font-13">Start Meeting</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" data-menu="menu-edit-meeting">
                    <i class="font-18 fas fa-edit color-yellow-light"></i>
                    <span class="font-13">Edit</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" data-menu="menu-meeting-share" class="menu-meeting-share">
                    <i class="font-18 fa fa-share-alt color-brown-dark"></i>
                    <span class="font-13">Share</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" data-menu="menu-delete-meeting">
                    <i class="font-18 far fa-trash-alt color-red-dark"></i>
                    <span class="font-13">Delete</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="menu-meeting-share" class="col-lg-6 offset-lg-3 menu menu-box-top menu-box-detached" style="display: block;">
        <div class="menu-title mt-n1">
            <h1>Share the invitation</h1>
            <p class="color-highlight">Just Tap the Social Icon. We'll add the invitation template</p><a href="#"
                class="close-menu"><i class="fa fa-times"></i></a>
        </div>
        <div class="content mb-0">

            <div class="divider my-2"></div>

            <a href="#" class="copy-btn" data-clipboard-target="#copy-meet-link" style="color: unset;">
                <table class="w-100 h-100" style="background-color:transparent !important;border:none;">
                    <tr>
                        <td class="px-2" style="background-color:transparent !important;width:5%">
                            <i class="font-18 far fa-copy color-twitter align-middle"></i>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <strong class="font-13">Copy Meeting Invitation</strong>
                            <br>
                            <small id="copy-meet-link" style="display: -webkit-box;
                                        -webkit-line-clamp: 1;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;"></small>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <i class="fa fa-angle-right float-right"></i>
                        </td>
                    </tr>
                </table>
            </a>

            <div class="divider my-2"></div>


            <a id="whatsapp-link-schedule" onclick="" href="#" style="color: unset;" class="shareToWhatsApp external-link">
                <table class="w-100 h-100" style="background-color:transparent !important;border:none;">
                    <tr>
                        <td class="px-2" style="background-color:transparent !important;width:5%">
                            <i class="font-18 fab fa-whatsapp color-whatsapp align-middle"></i>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <strong class="font-13">Whatsapp</strong>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <i class="fa fa-angle-right float-right"></i>
                        </td>
                    </tr>
                </table>
            </a>

            <div class="divider my-2"></div>

            <a id="mail-link-schedule" onclick="" href="#" style="color: unset;" class="shareToMail external-link">
                <table class="w-100 h-100" style="background-color:transparent !important;border:none;">
                    <tr>
                        <td class="px-2" style="background-color:transparent !important;width:5%">
                            <i class="font-18 far fa-envelope color-brown-dark align-middle"></i>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <strong class="font-13">Your Default Email</strong>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <i class="fa fa-angle-right float-right"></i>
                        </td>
                    </tr>
                </table>
            </a>

            <div class="divider my-2"></div>

            <a id="gmail-link-schedule" href="#" style="color: unset;">
                <table class="w-100 h-100" style="background-color:transparent !important;border:none;">
                    <tr>
                        <td class="px-2" style="background-color:transparent !important;width:5%">
                            <i class="font-18 fab fa-google color-google align-middle"></i>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <strong class="font-13">Google Email</strong>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <i class="fa fa-angle-right float-right"></i>
                        </td>
                    </tr>
                </table>
            </a>

            <div class="divider my-2"></div>

            <a id="outlook-link-schedule" href="#" style="color: unset;">
                <table class="w-100 h-100" style="background-color:transparent !important;border:none;">
                    <tr>
                        <td class="px-2" style="background-color:transparent !important;width:5%">
                            <i class="font-18 fab fa-windows color-teal-dark align-middle"></i>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <strong class="font-13">Outlook Email</strong>
                        </td>
                        <td class="px-2" style="background-color:transparent !important">
                            <i class="fa fa-angle-right float-right"></i>
                        </td>
                    </tr>
                </table>
            </a>

            <div class="my-3"></div>

        </div>
    </div>

    <div id="menu-edit-meeting" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="440"
        style="display: block; height: 440px;">
        <div class="menu-title">
            <h1>Edit Meeting</h1>
            <p class="color-highlight">Edit your scheduled meeting</p><a href="#" class="close-menu"><i
                    class="fa fa-times"></i></a>
        </div>
        <div class="divider divider-margins mb-1 mt-3"></div>
        <div class="content px-1">
            <form class="needs-validation" novalidate id="editScheduleMeetingForm">
                <input type="hidden" name="meetingIdScheduleEdit" id="meetingIdScheduleEdit">

                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                    <i class="fas fa-home color-highlight"></i>
                    <input id="meetingNameScheduleEdit" type="name" class="form-control" placeholder="Enter meeting name"
                        required>
                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Meeting
                        Name</label>
                    <em>(required)</em>
                </div>

                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                    <i class="far fa-calendar-alt color-highlight"></i>
                    <input id="meetingDateScheduleEdit" type="date" class="form-control" required
                        style="line-height: unset;">
                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Date</label>
                    <em>(required)</em>
                </div>

                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                    <i class="far fa-clock color-highlight"></i>
                    <input id="meetingStartScheduleEdit" type="time" class="form-control" required
                        style="line-height: unset">
                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">Start</label>
                    <em>(required)</em>
                </div>

                <div class="input-style input-style-always-active has-borders has-icon mb-4">
                    <i class="far fa-clock color-highlight"></i>
                    <input id="meetingEndScheduleEdit" type="time" class="form-control" required style="line-height: unset">
                    <label class="color-theme opacity-50 text-uppercase font-700 font-10">End</label>
                    <em>(required)</em>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" id="edit-schedule-meeting"
                            class="btn btn-s rounded-s text-uppercase font-900 shadow-s border-highlight bg-highlight"><i
                                class="fas fa-play"></i>&nbsp;&nbsp;Update Schedule</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="menu-delete-meeting" class="menu menu-box-modal rounded-m" data-menu-width="310" data-menu-height="270">
        <div class="text-center"><i class="fal fa-times-circle color-red-light mt-4" style="font-size: 45px;"></i></div>
        <h1 class="text-center mt-3">Are You Sure?</h1>
        <p class="ps-3 pe-3 text-center color-theme opacity-60">
            Do you realy want to delete the record ? This action cannot be undone.
        </p>
        <form class="needs-validation" novalidate id="deleteScheduleMeetingForm">
            <input type="hidden" name="meetingIdScheduleDelete" id="meetingIdScheduleDelete">
            <a href="#" id="delete-schedule-meeting"
                class="btn btn-m font-900 text-uppercase bg-highlight rounded-sm btn-center-l">Confirm</a>
        </form>
    </div>

@endsection
