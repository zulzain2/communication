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
    <link rel="shortcut icon" href="{{URL::to('icons/icon-72x72.png')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::to('styles/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('fonts/google/googleapis.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('fonts//font-awesome-pro/css/all.min.css')}}">
    <link rel="manifest" href="{{URL::to('_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::to('app/icons/icon-192x192.png')}}">
</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
    
    <div id="preloader" style="background-color:transparent">
        {{-- <div class="spinner-border color-highlight" role="status"></div> --}}
    </div>

    <div id="page" class="mb-0 pb-0">
    
        <div id="custom"></div>
        <div id="auth"></div>

        <div class="page-content mb-0 pb-0 csrf-token">

            <input type="hidden" name="allow_sw" id="allow_sw" value="false">
            
            @yield('content') 
            
        </div>

        @yield('content2') 

        <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-l mt-4 pb-3">
                <img class="rounded-l mb-3" src="{{URL::to('/icons/icon-128x128.png')}}" alt="img" width="90" height="90">
                <h4 class="mt-3">Install Communication on your Android</h4>
                <p>
                Install Communication on your android, and access it just like a regular app. It really is that simple!
                </p>
                <a href="#" class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Install Now</a><br>
                <a href="#" class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe later</a>
                <div class="clear"></div>
            </div>
        </div>
        
        <div id="menu-install-pwa-ios" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-xl mt-4 pb-3">
                <img class="rounded-l mb-3" src="{{URL::to('/icons/icon-128x128.png')}}" alt="img" width="90" height="90">
                <h4 class="mt-3">Install Communication on your IOS</h4>
                <p class="mb-0 pb-0">
                Install Communication, and access it like a regular app. Open your Safari menu and tap "Add to Home Screen".
                </p>
                <div class="clearfix pt-3"></div>
                <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
            </div>
        </div>

        <div id="validationError" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="240" data-menu-effect="menu-over" style="display: block; height: 240px;">
            <div class="menu-title mt-n1 text-center">
                <h1 class="color-red-dark">Validation Error</h1>
                <p class="color-theme opacity-50">Please review below error and take appropriate action to proceed.</p>
            </div>
            <div id="validationErrorList" class="list-group list-custom-small pe-3 ps-3">
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
        
        <div id="snackbar-sucess" class="snackbar-toast-low bg-green-dark" data-bs-delay="1200" data-bs-autohide="true">
        </div>
        <div id="snackbar-warning" class="snackbar-toast-low bg-yellow-dark" data-bs-delay="1200" data-bs-autohide="true">
        </div>
        <div id="snackbar-error" class="snackbar-toast-low bg-red-dark" data-bs-delay="1200" data-bs-autohide="true"></div>

        

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