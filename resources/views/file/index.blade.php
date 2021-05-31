@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xl-8 offset-xl-2 col-lg-12 col-sm-12">

        <div class="card card-style">

            <div class="divider mb-0"></div>
            <div class="gallery-view-controls">
                <a href="#" class="color-highlight gallery-view-1"><i class="fa fa-th"></i></a>
                <a href="#" class="gallery-view-2"><i class="fa fa-th-large"></i></a>
                <a href="#" class="gallery-view-3"><i class="fa fa-bars"></i></a>
                <div class="clearfix"></div>
            </div>
            <div class="content my-n1">
                <div class="gallery-views gallery-view-1">
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/10t.jpg"
                        title="Vynil and Typerwritter">
                        {{-- <img src="images/empty.png" data-src="images/pictures/10t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img"> --}}
                        <div class="rounded-m preload-img">
                            <svg class="w-75" x="0px" y="0px" height="100%" width="100%" focusable="false" viewBox="0 0 24 24"
                                fill="#5f6368">
                                <g>
                                    <path
                                        d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z">
                                    </path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </g>
                            </svg>
                        </div>

                        <p class="text-center mx-0">UAT</p>
                        <div class="caption">
                            <h4 class="color-theme">Messy Desk?</h4>
                            <p>Some may consider this to be a very messy desk.</p>
                            <div class="divider bottom-0"></div>
                        </div>
                    </a>
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/11t.jpg" title="Fruit Cookie Pie">
                        {{-- <img src="images/empty.png" data-src="images/pictures/11t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img"> --}}
                        <div class="rounded-m preload-img">
                            <svg class="w-75" x="0px" y="0px" height="100%" width="100%" focusable="false" viewBox="0 0 24 24"
                                fill="#5f6368">
                                <g>
                                    <path
                                        d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z">
                                    </path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </g>
                            </svg>
                        </div>
                        <p class="text-center mx-0">UTM</p>
                        <div class="caption">
                            <h4 class="color-theme">Designers Desk</h4>
                            <p>With all the gadgets you'd ever wish for.</p>
                            <div class="divider bottom-0"></div>
                        </div>
                    </a>
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/28t.jpg"
                        title="Plain Cookies and Flour">
                        {{-- <img src="images/empty.png" data-src="images/pictures/28t.jpg" class="rounded-m preload-img shadow-l img-fluid" alt="img"> --}}
                        <div class="rounded-m preload-img">
                            <svg class="w-75" x="0px" y="0px" height="100%" width="100%" focusable="false" viewBox="0 0 24 24"
                                fill="#5f6368">
                                <g>
                                    <path
                                        d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z">
                                    </path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </g>
                            </svg>
                        </div>
                        <p class="text-center mx-0">TVETXR</p>
                        <div class="caption">
                            <h4 class="color-theme">Apple Watch</h4>
                            <p>The perfect and small notification device.</p>
                            <div class="divider bottom-0"></div>
                        </div>
                    </a>
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/18t.jpg" title="Pots and Stuff">
                            <div class="rounded-m preload-img ">
                                <img src="images/document/svg/pdf.svg"
                                    data-src="images/document/svg/pdf.svg"
                                    class="p-2 rounded-m preload-img w-75" alt="img">
                            </div>
                            <p class="text-center mx-0">Senarai.pdf</p>
                        <div class="caption">
                            <h4 class="color-theme">City Landscape</h4>
                            <p>It's absolutely gorgeous, we'd love to see it live.</p>
                            <div class="divider bottom-0"></div>
                        </div>
                    </a>
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/14t.jpg"
                        title="Delicious Strawberries">
                        <div class="rounded-m preload-img">
                            <img src="images/document/svg/doc.svg"
                                data-src="images/document/svg/doc.svg"
                                class="p-2 rounded-m preload-img w-75" alt="img">
                        </div>
                            <p class="text-center mx-0">proposal.docx</p>
                        <div class="caption">
                            <h4 class="color-theme">Typography and iPhone 5</h4>
                            <p>A beautifully captured snap with great contrast.</p>
                            <div class="divider bottom-0"></div>
                        </div>
                    </a>
                    <a class="text-center" data-gallery="gallery-1" href="images/pictures/15t.jpg" title="A Beautiful Camera">
                        <div class="rounded-m preload-img">
                            <img src="images/document/svg/xls.svg"
                                data-src="images/document/svg/xls.svg"
                                class="p-2 rounded-m preload-img w-75" alt="img">
                        </div>
                            <p class="text-center mx-0">stats.xls</p>
                        <div class="caption">
                            <h4 class=" color-theme">Feather and Paper?</h4>
                            <p>Going back to days when things were simplere.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    
    </div>
</div>





@endsection

@section('content2')

        <a href="#" data-menu="menu-upload"
            class="btn px-0 mb-3 rounded-xl text-uppercase font-900 shadow-s border-highlight  bg-highlight" style="
                position: fixed; 
                width: 50px; 
                height: 50px; 
                bottom: 60px; 
                right: 20px; 
                border-radius: 50px; 
                writing-mode: vertical-rl;">

            <table style="width:100%;height:100%;background-color: #1b1d2100!important;border:none">
                <tr>
                    <td style="text-align:center;vertical-align:middle;background-color: #1b1d2100!important;border:none">
                        <i class="fas fa-plus" style="
                            font-size: 18px;
                            text-align: center;"></i>
                    </td>
                </tr>
            </table>

        </a>


        <div id="menu-upload" class="col-lg-6 offset-lg-3 menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255"
            data-menu-effect="menu-parallax">
            <div class="menu-title text-center mt-4">
                <h4>Create New</h4>
            </div>
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
            </div>
        </div>

@endsection
