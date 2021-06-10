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
                    @foreach($folders as $folder)
                      @if($folder->count() > 0)
                        <a class="text-center"  href="/file/{{$folder->id}}">
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

                            <p class="text-center mx-0">{{$folder->name}}</p>
                            <div class="caption">
                                <p>{{$folder->description}}</p>
                                <div class="divider bottom-0"></div>
                            </div>
                        </a>
                      @else
                      <div>
                       <p>
                        There is no folder, create a new one
                      </p>
                      </div>
                      @endif
                    @endforeach
                    {{--  <a class="text-center" data-gallery="gallery-1" href="images/pictures/18t.jpg" title="Pots and Stuff">
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
                    </a>  --}}
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


        <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="175"
            data-menu-effect="menu-parallax">
            <div class="menu-title text-center mt-4">
                <h4>File Management</h4>
            </div>
            <div class="list-group list-custom-small ps-2 me-4">
                <a href="/file/create">
                    <i class="font-14 fa fa-file color-gray-dark"></i>
                    <span class="font-13">Upload File</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <div class="list-group list-custom-small ps-2 me-4">
                <a href="#">
                    <i class="font-14 fa fa-folder-plus color-gray-dark"></i>
                    <span class="font-13">Create Folder</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

@endsection
