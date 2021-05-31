<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="domain" content="{{ URL::to('') }}">
    <meta name="theme-color" content="#000">
    <title>MaGICX Communication</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::to('icons/icon-72x72.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('styles/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('fonts/font-awesome-pro/css/all.min.css') }}">
    <link rel="stylesheet" href="{{URL::to('fonts/google/googleapis.css')}}">
    <link rel="stylesheet" href="{{URL::to('styles/placeholder/placeholder-loading.min.css')}}">
    <link rel="manifest" href="{{ URL::to('_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('app/icons/icon-192x192.png') }}">
</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

    <div id="preloader" style="background-color:transparent">
        {{-- <div class="spinner-border color-highlight" role="status"></div> --}}
    </div>

    <div id="page">

        <div id="custom"></div>

        <div id="footer-bar" class="footer-bar-1">
            <a id="home" href="home"><i class="fa fa-home"></i><span>Home</span></a>
            <a id="chat" href="chat"><i class="fas fa-comments"></i><span>Chat</span></a>
            <a id="meet" href="meet"><i class="fas fa-video"></i><span>Meeting</span></a>
            <a id="file" href="file"><i class="fas fa-folder"></i><span>My File</span></a>
            <a id="setting" href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>
        </div>

        <div class="page-content header-clear-small check-auth csrf-token">

            <input type="hidden" name="allow_sw" id="allow_sw" value="true">

            @yield('content')

        </div>

        @yield('content2')

        <div id="menu-settings" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-0 pt-0">
                <h1>Settings</h1>
                <p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="list-group list-custom-small">
                    <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                        <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                        <span>Dark Mode</span>
                        <div class="custom-control scale-switch ios-switch">
                            <input data-toggle-theme="" type="checkbox" class="ios-input" id="switch-dark-mode">
                            <label class="custom-control-label" for="switch-dark-mode"></label>
                        </div>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="list-group list-custom-small">
                    <a data-menu="menu-highlights" href="#" class="pb-2 pt-2 ms-n1">
                        <i class="fa font-12 fa-tint bg-green-dark rounded-s me-3"></i>
                        <span>Page Highlight</span>
                        {{-- <strong>16 Colors Highlights Included</strong> --}}

                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a data-menu="menu-backgrounds" href="#" class="border-0 pb-2 pt-2 ms-n1">
                        <i class="fa font-12 fa-cog bg-blue-dark rounded-s me-3"></i>
                        <span>Background Color</span>
                        {{-- <strong>10 Page Gradients Included</strong> --}}

                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="list-group list-custom-small">



                    {{-- <form method="POST" action="{{ route('logout') }}"> --}}

                        {{-- <input class="csrftoken" type="hidden" name="_token" value=""> --}}

                        <button type="button" id="logoutBtn"
                            class="btn btn-xxs w-100 rounded-s btn-full mb-3 text-uppercase font-900 shadow-s bg-red-dark"
                            style="margin-top:10px"><i class="fas fa-sign-out-alt "
                                style="line-height: 25px;"></i>&nbsp;&nbsp;Log Out</button>

                    {{-- </form> --}}

                </div>
            </div>
        </div>


        <div id="menu-highlights" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Highlights</h1>
                <p class="color-highlight">Any Element can have a Highlight Color</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="highlight-changer">
                    <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span
                            class="color-blue-light">Default</span></a>
                    <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span
                            class="color-red-light">Red</span></a>
                    <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span
                            class="color-orange-light">Orange</span></a>
                    <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span
                            class="color-pink-dark">Pink</span></a>
                    <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span
                            class="color-magenta-light">Purple</span></a>
                    <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span
                            class="color-aqua-light">Aqua</span></a>
                    <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span
                            class="color-teal-light">Teal</span></a>
                    <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span
                            class="color-mint-light">Mint</span></a>
                    <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span
                            class="color-green-light">Green</span></a>
                    <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span
                            class="color-green-dark">Grass</span></a>
                    <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span
                            class="color-yellow-light">Sunny</span></a>
                    <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span
                            class="color-yellow-light">Goldish</span></a>
                    <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span
                            class="color-brown-light">Wood</span></a>
                    <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span
                            class="color-dark-light">Night</span></a>
                    <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span
                            class="color-dark-light">Dark</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div>

        <div id="menu-backgrounds" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Backgrounds</h1>
                <p class="color-highlight">Change Page Color Behind Content Boxes</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="background-changer">
                    <a href="#" data-change-background="default"><i class="bg-theme"></i><span
                            class="color-dark-dark">Default</span></a>
                    <a href="#" data-change-background="plum"><i class="body-plum"></i><span
                            class="color-plum-dark">Plum</span></a>
                    <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span
                            class="color-dark-dark">Magenta</span></a>
                    <a href="#" data-change-background="dark"><i class="body-dark"></i><span
                            class="color-dark-dark">Dark</span></a>
                    <a href="#" data-change-background="violet"><i class="body-violet"></i><span
                            class="color-violet-dark">Violet</span></a>
                    <a href="#" data-change-background="red"><i class="body-red"></i><span
                            class="color-red-dark">Red</span></a>
                    <a href="#" data-change-background="green"><i class="body-green"></i><span
                            class="color-green-dark">Green</span></a>
                    <a href="#" data-change-background="sky"><i class="body-sky"></i><span
                            class="color-sky-dark">Sky</span></a>
                    <a href="#" data-change-background="orange"><i class="body-orange"></i><span
                            class="color-orange-dark">Orange</span></a>
                    <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span
                            class="color-yellow-dark">Yellow</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div>

        <div id="menu-offline" class="menu menu-box-modal rounded-m" data-menu-width="310" data-menu-height="270">
            <h1 class="text-center color-theme mt-4">No Connection</h1>
            <p class="ps-3 pe-3 text-center color-theme opacity-60">
                This action requires an internet connection to work. Please connect turn on your WiFi or Celluar Data to
                Enable this action.
            </p>
            <a href="#" class="close-menu btn btn-m font-900 text-uppercase bg-highlight rounded-sm btn-center-l">Close
                Message</a>
            <p class="text-center font-9 color-theme mt-3">Continue with other task.</p>
        </div>

        <div id="validationError" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="240" data-menu-effect="menu-over" style="display: block; height: 240px;">
            <div class="menu-title mt-n1 text-center">
                <h1 class="color-red-dark">Validation Error</h1>
                <p class="color-theme opacity-50">Please review below error and take appropriate action to proceed.</p>
            </div>
            <div id="validationErrorList" class="list-group list-custom-small pe-3 ps-3">
            </div>
        </div>

        <div id="snackbar-sucess" class="snackbar-toast bg-green-dark" data-bs-delay="1200" data-bs-autohide="true">
        </div>
        <div id="snackbar-warning" class="snackbar-toast bg-yellow-dark" data-bs-delay="1200" data-bs-autohide="true">
        </div>
        <div id="snackbar-error" class="snackbar-toast bg-red-dark" data-bs-delay="1200" data-bs-autohide="true"></div>

    </div>

    <script type="text/javascript" src="{{ URL::to('scripts/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/meet/external_api.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/plugins/clipboard/clipboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('scripts/default.js') }}"></script>



    @stack('scripts')

</body>

</html>
