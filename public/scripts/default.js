var swup = {};

//for preloader spinner
setTimeout(function() {
    var _0xce56x1 = document['getElementById']('preloader');
    if (_0xce56x1) {
        _0xce56x1['classList']['add']('preloader-hide')
    }
}, 150);

//to show/hide snackbar
function snackbar(type , message) { //type : sucess , warning , error

    if(type === 'success'){
        type = 'snackbar-sucess';
        message = '<i class="fa fa-check me-3"></i>'+message+'';
    }
    else if(type === 'warning') {
        type = 'snackbar-warning';
        message = '<i class="fa fa-info me-3"></i>'+message+'';
    }
    else if(type === 'error') {
        type = 'snackbar-error';
        message = '<i class="fa fa-times me-3"></i>'+message+'';
    }
    
    var snackID = document.getElementById(type);
    snackID.innerHTML = message;
    snackID = new bootstrap.Toast(snackID);
    snackID.show();
}

//to show/hide any action sheets, modal or sidebar
function menu(idElement,  action, speed) { //action : show , hide
    if(action === 'show')
    {
        $('#'+idElement+'').addClass('menu-active');
        $('.menu-hider').addClass('menu-active');
    }
    else if(action === 'hide'){
        $('#'+idElement+'').removeClass('menu-active');
        $('.menu-hider').removeClass('menu-active');
    }
}

// clipboard initialization
function _initCopyBtn(){
    var clipboard = new ClipboardJS('.copy-btn');

    clipboard.on('success', function(e) {

        var toastID = document.getElementById('toast-1');
        toastID = new bootstrap.Toast(toastID);
        toastID.show();

        e.clearSelection();
    });

    clipboard.on('error', function(e) {

        var toastID = document.getElementById('toast-2');
        toastID = new bootstrap.Toast(toastID);
        toastID.show();

    });
}

// Button Loader initialization
function _initBtnLoader(){
    // clicking on "a/button" tag append a loading spinner to it
    $('a').on('classChange', function() {
        if ($(this).hasClass("off-btn")) {
            $(this).append(`
            <div class="spin-temp spinner-border spinner-border-sm color-gray-light" role="status" style="margin-left:10px">
            <span class="sr-only">Loading...</span>
            </div>`);
        } else {
            $('.spin-temp').remove();
        }
    });

    $('button').on('classChange', function() {
        if ($(this).hasClass("off-btn")) {
            $(this).append(`
            <div class="spin-temp spinner-border spinner-border-sm color-gray-light" role="status" style="margin-left:10px">
            <span class="sr-only">Loading...</span>
            </div>`);
        } else {
            $('.spin-temp').remove();
        }
    });
}

// Validation Error initialization
function validationErrorBuilder(results){

    if (results.error_list) {

        var p = results.error_list;
        $('#validationErrorList').html('');
        for (var key in p) {
            if (p.hasOwnProperty(key)) {

                $('#validationErrorList').append(`
                    <a href="#">

                    <span>${p[key]}</span>
                    <i class="fa fa-times-circle color-red-light" style="color: #ed5565!important;font-size: 1.3em;"></i>
                
                    </a>
                `)

            }
        }

        menu('validationError', 'show', 250);

    } else {
        snackbar('error' , 'Something went wrong, please try again.')                                        
    }  
} 


document['addEventListener']('DOMContentLoaded', () => {
    
    'use strict';
    let _0xce56x2 = true;
    let _0xce56x3 = true;
    var _0xce56x4 = 'Sticky';
    var _0xce56x5 = 1;
    var _0xce56x6 = false;
    var _0xce56x7 = ''+$('meta[name="domain"]').attr('content')+'';
    var _0xce56x8 = ''+$('meta[name="domain"]').attr('content')+'/_service-worker.js';

    function _init() {

        var _0xce56xa, _0xce56xb, _0xce56xc;
        var _0xce56xd = document['getElementsByClassName']('menu-hider');
        if (!_0xce56xd['length']) {
            document['body']['innerHTML'] += '<div class=\"menu-hider\"></div>'
        };
        document['querySelectorAll']('.menu')['forEach']((_0xce56xc) => {
            _0xce56xc['style']['display'] = 'block'
        });

        var _0xce56x1f = document['getElementsByClassName']('splide');
        if (_0xce56x1f['length']) {
            
            var _0xce56x20 = document['querySelectorAll']('.single-slider');
            if (_0xce56x20['length']) {
                _0xce56x20['forEach'](function(_0xce56xb) {
                    var _0xce56x21 = new Splide('#' + _0xce56xb['id'], {
                        type: 'loop',
                        autoplay: false,
                        interval: 4000,
                        perPage: 1
                    })['mount']();
                    var _0xce56x22 = document['querySelectorAll']('.slider-next');
                    var _0xce56x23 = document['querySelectorAll']('.slider-prev');
                    _0xce56x22['forEach']((_0xce56xc) => {
                        return _0xce56xc['addEventListener']('click', (_0xce56xc) => {
                            _0xce56x21['go']('>')
                        })
                    });
                    _0xce56x23['forEach']((_0xce56xc) => {
                        return _0xce56xc['addEventListener']('click', (_0xce56xc) => {
                            _0xce56x21['go']('<')
                        })
                    })
                })
            };

            var _0xce56x24 = document['querySelectorAll']('.double-slider');
            if (_0xce56x24['length']) {
                _0xce56x24['forEach'](function(_0xce56xb) {
                    var _0xce56x25 = new Splide('#' + _0xce56xb['id'], {
                        type: 'loop',
                        autoplay: false,
                        interval: 4000,
                        arrows: false,
                        perPage: 2
                    })['mount']()
                })
            };

            var _0xce56x26 = document['querySelectorAll']('.tripple-slider');
            if (_0xce56x26['length']) {
                _0xce56x26['forEach'](function(_0xce56xb) {
                    var _0xce56x27 = new Splide('#' + _0xce56xb['id'], {
                        type: 'loop',
                        autoplay: false,
                        padding: {
                            left: '0px',
                            right: '80px'
                        },
                        interval: 4000,
                        arrows: false,
                        perPage: 2,
                        perMove: 1
                    })['mount']()
                })
            };
        };

        const _0xce56x28 = document['querySelectorAll']('a[href=\"#\"]');
        _0xce56x28['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                _0xce56xb['preventDefault']();
                return false
            })
        });

        var _0xce56x29 = document['querySelectorAll']('.map-full');
        if (_0xce56x29['length']) {
            var _0xce56x2a = document['querySelectorAll']('.show-map');
            var _0xce56x2b = document['querySelectorAll']('.hide-map');
            _0xce56x2a[0]['addEventListener']('click', function(_0xce56xb) {
                document['getElementsByClassName']('card-overlay')[0]['classList']['add']('disabled');
                document['getElementsByClassName']('card-center')[0]['classList']['add']('disabled');
                document['getElementsByClassName']('hide-map')[0]['classList']['remove']('disabled')
            });
            _0xce56x2b[0]['addEventListener']('click', function(_0xce56xb) {
                document['getElementsByClassName']('card-overlay')[0]['classList']['remove']('disabled');
                document['getElementsByClassName']('card-center')[0]['classList']['remove']('disabled');
                document['getElementsByClassName']('hide-map')[0]['classList']['add']('disabled')
            })
        };

        var _0xce56x2c = document['querySelectorAll']('.todo-list a');
        _0xce56x2c['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                _0xce56xc['classList']['toggle']('opacity-50');
                _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('far');
                _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('fa');
                _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('fa-check-square');
                _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('fa-square');
                _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('color-green-dark')
            })
        });

        var _0xce56x2d = document['querySelectorAll']('.menu');
        if (_0xce56x2d['length']) {

            var _0xce56x2e = document['querySelectorAll']('.menu-box-left, .menu-box-right');
            _0xce56x2e['forEach'](function(_0xce56xb) {
                if (_0xce56xb['getAttribute']('data-menu-width') === 'cover') {
                    _0xce56xb['style']['width'] = '100%'
                } else {
                    _0xce56xb['style']['width'] = (_0xce56xb['getAttribute']('data-menu-width')) + 'px'
                }
            });

            var _0xce56x2f = document['querySelectorAll']('.menu-box-bottom, .menu-box-top, .menu-box-modal');
            _0xce56x2f['forEach'](function(_0xce56xb) {
                if (_0xce56xb['getAttribute']('data-menu-width') === 'cover') {
                    _0xce56xb['style']['width'] = '100%';
                    _0xce56xb['style']['height'] = '100%'
                } else {
                    _0xce56xb['style']['width'] = (_0xce56xb['getAttribute']('data-menu-width')) + 'px';
                    _0xce56xb['style']['height'] = (_0xce56xb['getAttribute']('data-menu-height')) + 'px'
                }
            });

            var _0xce56x30 = document['querySelectorAll']('[data-menu]');
            var _0xce56x31 = document['querySelectorAll']('.header, #footer-bar, .page-content');
            _0xce56x30['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    const _0xce56x32 = document['querySelectorAll']('.menu-active');
                    for (let _0xce56xa = 0; _0xce56xa < _0xce56x32['length']; _0xce56xa++) {
                        _0xce56x32[_0xce56xa]['classList']['remove']('menu-active')
                    };
                    var _0xce56x33 = _0xce56xc['getAttribute']('data-menu');
                    document['getElementById'](_0xce56x33)['classList']['add']('menu-active');
                    document['getElementsByClassName']('menu-hider')[0]['classList']['add']('menu-active');
                    var _0xce56x34 = document['getElementById'](_0xce56x33);
                    var _0xce56x35 = _0xce56x34['getAttribute']('data-menu-effect');
                    var _0xce56x36 = _0xce56x34['classList']['contains']('menu-box-left');
                    var _0xce56x37 = _0xce56x34['classList']['contains']('menu-box-right');
                    var _0xce56x38 = _0xce56x34['classList']['contains']('menu-box-top');
                    var _0xce56x39 = _0xce56x34['classList']['contains']('menu-box-bottom');
                    var _0xce56x3a = _0xce56x34['offsetWidth'];
                    var _0xce56x3b = _0xce56x34['offsetHeight'];
                    if (_0xce56x35 === 'menu-push') {
                        var _0xce56x3a = document['getElementById'](_0xce56x33)['getAttribute']('data-menu-width');
                        if (_0xce56x36) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateX(' + _0xce56x3a + 'px)'
                            }
                        };
                        if (_0xce56x37) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateX(-' + _0xce56x3a + 'px)'
                            }
                        };
                        if (_0xce56x39) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateY(-' + _0xce56x3b + 'px)'
                            }
                        };
                        if (_0xce56x38) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateY(' + _0xce56x3b + 'px)'
                            }
                        }
                    };
                    if (_0xce56x35 === 'menu-parallax') {
                        var _0xce56x3a = document['getElementById'](_0xce56x33)['getAttribute']('data-menu-width');
                        if (_0xce56x36) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateX(' + _0xce56x3a / 10 + 'px)'
                            }
                        };
                        if (_0xce56x37) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateX(-' + _0xce56x3a / 10 + 'px)'
                            }
                        };
                        if (_0xce56x39) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateY(-' + _0xce56x3b / 5 + 'px)'
                            }
                        };
                        if (_0xce56x38) {
                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                                _0xce56x31[_0xce56xa]['style']['transform'] = 'translateY(' + _0xce56x3b / 5 + 'px)'
                            }
                        }
                    }
                })
            });
            const _0xce56x3c = document['querySelectorAll']('.close-menu, .menu-hider');
            _0xce56x3c['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    const _0xce56x32 = document['querySelectorAll']('.menu-active');
                    for (let _0xce56xa = 0; _0xce56xa < _0xce56x32['length']; _0xce56xa++) {
                        _0xce56x32[_0xce56xa]['classList']['remove']('menu-active')
                    };
                    for (let _0xce56xa = 0; _0xce56xa < _0xce56x31['length']; _0xce56xa++) {
                        _0xce56x31[_0xce56xa]['style']['transform'] = 'translateX(-' + 0 + 'px)'
                    }
                })
            })
        };

        const _0xce56x3d = document['querySelectorAll']('[data-back-button]');
        if (_0xce56x3d['length']) {
            _0xce56x3d['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    _0xce56xb['stopPropagation'];
                    _0xce56xb['preventDefault'];
                    window['history']['go'](-1)
                })
            })
        };

        const _0xce56x3e = document['querySelectorAll']('.back-to-top-icon, .back-to-top-badge, .back-to-top');
        if (_0xce56x3e['length']) {
            _0xce56x3e['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    window['scrollTo']({
                        top: 0,
                        behavior: `${'smooth'}`
                    })
                })
            })
        };

        const _0xce56x3f = document['getElementsByClassName']('card');

        function _0xce56x40() {
            var _0xce56x41, _0xce56x42, _0xce56x43;
            var _0xce56x43 = document['querySelectorAll']('.header:not(.header-transparent)')[0];
            var _0xce56x44 = document['querySelectorAll']('#footer-bar')[0];
            _0xce56x43 ? _0xce56x41 = document['querySelectorAll']('.header')[0]['offsetHeight'] : _0xce56x41 = 0;
            _0xce56x44 ? _0xce56x42 = document['querySelectorAll']('#footer-bar')[0]['offsetHeight'] : _0xce56x42 = 0;
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x3f['length']; _0xce56xa++) {
                if (_0xce56x3f[_0xce56xa]['getAttribute']('data-card-height') === 'cover') {
                    if (window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                        var _0xce56x45 = window['outerHeight']
                    };
                    if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                        var _0xce56x45 = window['innerHeight']
                    };
                    var _0xce56x46 = _0xce56x45 - _0xce56x41 - _0xce56x42 + 'px'
                };
                if (_0xce56x3f[_0xce56xa]['hasAttribute']('data-card-height')) {
                    var _0xce56x47 = _0xce56x3f[_0xce56xa]['getAttribute']('data-card-height');
                    _0xce56x3f[_0xce56xa]['style']['height'] = _0xce56x47 + 'px';
                    if (_0xce56x47 === 'cover') {
                        var _0xce56x48 = _0xce56x47;
                        _0xce56x3f[_0xce56xa]['style']['height'] = _0xce56x46
                    }
                }
            }
        }

        if (_0xce56x3f['length']) {
            _0xce56x40();
            window['addEventListener']('resize', _0xce56x40)
        };

        var _0xce56x49 = document['querySelectorAll']('[data-change-highlight]');
        _0xce56x49['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                var _0xce56x4a = _0xce56xc['getAttribute']('data-change-highlight');
                var _0xce56x4b = document['querySelectorAll']('.page-highlight');
                if (_0xce56x4b['length']) {
                    _0xce56x4b['forEach'](function(_0xce56xb) {
                        _0xce56xb['remove']()
                    })
                };
                var _0xce56x4c = document['createElement']('link');
                _0xce56x4c['rel'] = 'stylesheet';
                _0xce56x4c['className'] = 'page-highlight';
                _0xce56x4c['type'] = 'text/css';
                _0xce56x4c['href'] = 'styles/highlights/highlight_' + _0xce56x4a + '.css';
                document['getElementsByTagName']('head')[0]['appendChild'](_0xce56x4c);
                document['body']['setAttribute']('data-highlight', 'highlight-' + _0xce56x4a);
                localStorage['setItem'](_0xce56x4 + '-Highlight', _0xce56x4a)
            })
        });

        var _0xce56x4d = localStorage['getItem'](_0xce56x4 + '-Highlight');
        if (_0xce56x4d) {
            document['body']['setAttribute']('data-highlight', _0xce56x4d);
            var _0xce56x4c = document['createElement']('link');
            _0xce56x4c['rel'] = 'stylesheet';
            _0xce56x4c['className'] = 'page-highlight';
            _0xce56x4c['type'] = 'text/css';
            _0xce56x4c['href'] = 'styles/highlights/highlight_' + _0xce56x4d + '.css';
            if (!document['querySelectorAll']('.page-highlight')['length']) {
                document['getElementsByTagName']('head')[0]['appendChild'](_0xce56x4c);
                document['body']['setAttribute']('data-highlight', 'highlight-' + _0xce56x4d)
            }
        };

        var _0xce56x4e = document['querySelectorAll']('[data-change-background]');
        _0xce56x4e['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                var _0xce56x4f = _0xce56xc['getAttribute']('data-change-background');
                document['body']['setAttribute']('data-gradient', 'body-' + _0xce56x4f + '');
                localStorage['setItem'](_0xce56x4 + '-Gradient', _0xce56x4f)
            })
        });

        var _0xce56x50 = localStorage['getItem'](_0xce56x4 + '-Gradient');
        if (_0xce56x50) {
            document['body']['setAttribute']('data-gradient', 'body-' + _0xce56x50 + '')
        };
        const _0xce56x51 = document['querySelectorAll']('[data-toggle-theme]');

        function _0xce56x52() {
            document['body']['classList']['add']('theme-dark');
            document['body']['classList']['remove']('theme-light', 'detect-theme');
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x51['length']; _0xce56xa++) {
                _0xce56x51[_0xce56xa]['checked'] = 'checked'
            };
            localStorage['setItem'](_0xce56x4 + '-Theme', 'dark-mode')
        }

        function _0xce56x53() {
            document['body']['classList']['add']('theme-light');
            document['body']['classList']['remove']('theme-dark', 'detect-theme');
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x51['length']; _0xce56xa++) {
                _0xce56x51[_0xce56xa]['checked'] = false
            };
            localStorage['setItem'](_0xce56x4 + '-Theme', 'light-mode')
        }

        function _0xce56x54() {
            var _0xce56x55 = document['querySelectorAll']('.btn, .header, #footer-bar, .menu-box, .menu-active');
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x55['length']; _0xce56xa++) {
                _0xce56x55[_0xce56xa]['style']['transition'] = 'all 0s ease'
            }
        }

        function _0xce56x56() {
            var _0xce56x57 = document['querySelectorAll']('.btn, .header, #footer-bar, .menu-box, .menu-active');
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x57['length']; _0xce56xa++) {
                _0xce56x57[_0xce56xa]['style']['transition'] = ''
            }
        }

        function _0xce56x58() {
            const _0xce56x59 = window['matchMedia']('(prefers-color-scheme: dark)')['matches'];
            const _0xce56x5a = window['matchMedia']('(prefers-color-scheme: light)')['matches'];
            const _0xce56x5b = window['matchMedia']('(prefers-color-scheme: no-preference)')['matches'];
            window['matchMedia']('(prefers-color-scheme: dark)')['addListener']((_0xce56xb) => {
                return _0xce56xb['matches'] && _0xce56x52()
            });
            window['matchMedia']('(prefers-color-scheme: light)')['addListener']((_0xce56xb) => {
                return _0xce56xb['matches'] && _0xce56x53()
            });
            if (_0xce56x59) {
                _0xce56x52()
            };
            if (_0xce56x5a) {
                _0xce56x53()
            }
        }

        const _0xce56x5c = document['querySelectorAll']('[data-toggle-theme]');
        _0xce56x5c['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                if (document['body']['className'] == 'theme-light') {
                    _0xce56x54();
                    _0xce56x52()
                } else {
                    if (document['body']['className'] == 'theme-dark') {
                        _0xce56x54();
                        _0xce56x53()
                    }
                };
                setTimeout(function() {
                    _0xce56x56()
                }, 350)
            })
        });

        if (localStorage['getItem'](_0xce56x4 + '-Theme') == 'dark-mode') {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x51['length']; _0xce56xa++) {
                _0xce56x51[_0xce56xa]['checked'] = 'checked'
            };
            document['body']['className'] = 'theme-dark'
        };

        if (localStorage['getItem'](_0xce56x4 + '-Theme') == 'light-mode') {
            document['body']['className'] = 'theme-light'
        };

        if (document['body']['className'] == 'detect-theme') {
            _0xce56x58()
        };

        const _0xce56x5d = document['querySelectorAll']('.detect-dark-mode');
        _0xce56x5d['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                document['body']['classList']['remove']('theme-light', 'theme-dark');
                document['body']['classList']['add']('detect-theme');
                setTimeout(function() {
                    _0xce56x58()
                }, 50)
            })
        });

        const _0xce56x5e = document['querySelectorAll']('.accordion-btn');
        if (_0xce56x5e['length']) {
            _0xce56x5e['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('fa-rotate-180')
                })
            })
        };

        const _0xce56x60 = document['getElementsByClassName']('upload-file');
        if (_0xce56x60['length']) {
            _0xce56x60[0]['addEventListener']('change', _0xce56x61, false);

            function _0xce56x61(_0xce56x5f) {
                if (this['files'] && this['files'][0]) {
                    var _0xce56x62 = document['getElementById']('image-data');
                    _0xce56x62['src'] = URL['createObjectURL'](this['files'][0])
                };
                const _0xce56x63 = _0xce56x5f['target']['files'];
                const _0xce56x64 = _0xce56x63[0]['name'];
                document['getElementsByClassName']('file-data')[0]['classList']['add']('disabled');
                document['getElementsByClassName']('upload-file-data')[0]['classList']['remove']('disabled');
                document['getElementsByClassName']('upload-file-name')[0]['innerHTML'] = _0xce56x63[0]['name'];
                document['getElementsByClassName']('upload-file-modified')[0]['innerHTML'] = _0xce56x63[0]['lastModifiedDate'];
                document['getElementsByClassName']('upload-file-size')[0]['innerHTML'] = _0xce56x63[0]['size'] / 1000 + 'kb';
                document['getElementsByClassName']('upload-file-type')[0]['innerHTML'] = _0xce56x63[0]['type']
            }
        };

        var _0xce56x65 = document['querySelectorAll']('.get-location');
        if (_0xce56x65['length']) {
            var _0xce56x66 = document['getElementsByClassName']('location-support')[0];
            if (typeof(_0xce56x66) != 'undefined' && _0xce56x66 != null) {
                if ('geolocation' in navigator) {
                    _0xce56x66['innerHTML'] = 'Your browser and device <strong class=\"color-green2-dark\">support</strong> Geolocation.'
                } else {
                    _0xce56x66['innerHTML'] = 'Your browser and device <strong class=\"color-red2-dark\">support</strong> Geolocation.'
                }
            };

            function _0xce56x67() {
                const _0xce56x68 = document['querySelector']('.location-coordinates');

                function _0xce56x69(_0xce56x6a) {
                    const _0xce56x6b = _0xce56x6a['coords']['latitude'];
                    const _0xce56x6c = _0xce56x6a['coords']['longitude'];
                    _0xce56x68['innerHTML'] = '<strong>Longitude:</strong> ' + _0xce56x6c + '<br><strong>Latitude:</strong> ' + _0xce56x6b;
                    var _0xce56x6d = 'https://maps.google.com/maps?q=';
                    var _0xce56x6e = _0xce56x6b + ',';
                    var _0xce56x6f = _0xce56x6c;
                    var _0xce56x70 = '&z=18&t=h&output=embed';
                    var _0xce56x71 = '&z=18&t=h';
                    var _0xce56x72 = _0xce56x6d + _0xce56x6e + _0xce56x6f + _0xce56x70;
                    var _0xce56x73 = _0xce56x6d + _0xce56x6e + _0xce56x6f + _0xce56x71;
                    document['getElementsByClassName']('location-map')[0]['setAttribute']('src', _0xce56x72);
                    document['getElementsByClassName']('location-button')[0]['setAttribute']('href', _0xce56x73);
                    document['getElementsByClassName']('location-button')[0]['classList']['remove']('disabled')
                }

                function _0xce56x74() {
                    _0xce56x68['textContent'] = 'Unable to retrieve your location'
                }
                if (!navigator['geolocation']) {
                    _0xce56x68['textContent'] = 'Geolocation is not supported by your browser'
                } else {
                    _0xce56x68['textContent'] = 'Locating';
                    navigator['geolocation']['getCurrentPosition'](_0xce56x69, _0xce56x74)
                }
            }

            var _0xce56x75 = document['getElementsByClassName']('get-location')[0];
            if (typeof(_0xce56x75) != 'undefined' && _0xce56x75 != null) {
                _0xce56x75['addEventListener']('click', function() {
                    this['classList']['add']('disabled');
                    _0xce56x67()
                })
            }
        };

        const _0xce56x76 = document['querySelectorAll']('.card-scale');
        if (_0xce56x76['length']) {
            _0xce56x76['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseenter', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['add']('card-scale-image')
                })
            });
            _0xce56x76['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseleave', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['remove']('card-scale-image')
                })
            })
        };

        const _0xce56x77 = document['querySelectorAll']('.card-hide');
        if (_0xce56x77['length']) {
            _0xce56x77['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseenter', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('.card-center, .card-bottom, .card-top, .card-overlay')[0]['classList']['add']('card-hide-image')
                })
            });
            _0xce56x77['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseleave', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('.card-center, .card-bottom, .card-top, .card-overlay')[0]['classList']['remove']('card-hide-image')
                })
            })
        };

        const _0xce56x78 = document['querySelectorAll']('.card-rotate');
        if (_0xce56x78['length']) {
            _0xce56x78['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseenter', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['add']('card-rotate-image')
                })
            });
            _0xce56x78['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseleave', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['remove']('card-rotate-image')
                })
            })
        };

        const _0xce56x79 = document['querySelectorAll']('.card-grayscale');
        if (_0xce56x79['length']) {
            _0xce56x79['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseenter', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['add']('card-grayscale-image')
                })
            });
            _0xce56x79['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseleave', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['remove']('card-grayscale-image')
                })
            })
        };

        const _0xce56x7a = document['querySelectorAll']('.card-blur');
        if (_0xce56x7a['length']) {
            _0xce56x7a['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseenter', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['add']('card-blur-image')
                })
            });
            _0xce56x7a['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseleave', (_0xce56x5f) => {
                    _0xce56xc['querySelectorAll']('img')[0]['classList']['remove']('card-blur-image')
                })
            })
        };

        var _0xce56x7b = document['querySelectorAll']('.check-visited');
        if (_0xce56x7b['length']) {
            function _0xce56x7c() {
                var _0xce56x7d = JSON['parse'](localStorage['getItem'](_0xce56x4 + '_Visited_Links')) || [];
                var _0xce56x7e = document['querySelectorAll']('.check-visited a');
                for (let _0xce56xa = 0; _0xce56xa < _0xce56x7e['length']; _0xce56xa++) {
                    var _0xce56x7f = _0xce56x7e[_0xce56xa];
                    _0xce56x7f['addEventListener']('click', function(_0xce56xb) {
                        var _0xce56x80 = this['href'];
                        if (_0xce56x7d['indexOf'](_0xce56x80) == -1) {
                            _0xce56x7d['push'](_0xce56x80);
                            localStorage['setItem'](_0xce56x4 + '_Visited_Links', JSON['stringify'](_0xce56x7d))
                        }
                    });
                    if (_0xce56x7d['indexOf'](_0xce56x7f['href']) !== -1) {
                        _0xce56x7f['className'] += ' visited-link'
                    }
                }
            }
            _0xce56x7c()
        };

        var _0xce56x81 = document['querySelectorAll']('.scroll-ad, .header-auto-show');
        if (_0xce56x81['length']) {
            var _0xce56x82 = document['querySelectorAll']('.scroll-ad');
            var _0xce56x83 = document['querySelectorAll']('.header-auto-show');
            window['addEventListener']('scroll', function() {
                if (document['querySelectorAll']('.scroll-ad, .header-auto-show')['length']) {
                    function _0xce56x84() {
                        _0xce56x82[0]['classList']['add']('scroll-ad-visible')
                    }

                    function _0xce56x85() {
                        _0xce56x82[0]['classList']['remove']('scroll-ad-visible')
                    }

                    function _0xce56x86() {
                        _0xce56x83[0]['classList']['add']('header-active')
                    }

                    function _0xce56x87() {
                        _0xce56x83[0]['classList']['remove']('header-active')
                    }
                    var _0xce56x88 = window['outerWidth'];
                    var _0xce56x89 = document['documentElement']['scrollTop'];
                    let _0xce56x8a = _0xce56x89 <= 150;
                    var _0xce56x8b = _0xce56x89 >= 150;
                    let _0xce56x8c = (_0xce56x88 - _0xce56x89 + 1000) <= 150;
                    if (_0xce56x82['length']) {
                        _0xce56x8a ? _0xce56x85() : null;
                        _0xce56x8b ? _0xce56x84() : null;
                        _0xce56x8c ? _0xce56x85() : null
                    };
                    if (_0xce56x83['length']) {
                        _0xce56x8a ? _0xce56x87() : null;
                        _0xce56x8b ? _0xce56x86() : null
                    }
                }
            })
        };

        var _0xce56x8d = document['querySelectorAll']('.stepper-add');
        var _0xce56x8e = document['querySelectorAll']('.stepper-sub');
        if (_0xce56x8d['length']) {
            _0xce56x8d['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    var _0xce56x8f = _0xce56xc['parentElement']['querySelector']('input')['value'];
                    _0xce56xc['parentElement']['querySelector']('input')['value'] = +_0xce56x8f + 1
                })
            });
            _0xce56x8e['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    var _0xce56x8f = _0xce56xc['parentElement']['querySelector']('input')['value'];
                    _0xce56xc['parentElement']['querySelector']('input')['value'] = +_0xce56x8f - 1
                })
            })
        };

        var _0xce56x90 = document['querySelectorAll']('[data-trigger-switch]:not([data-toggle-theme])');
        if (_0xce56x90['length']) {
            _0xce56x90['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    var _0xce56x91 = _0xce56xc['getAttribute']('data-trigger-switch');
                    var _0xce56x92 = document['getElementById'](_0xce56x91);
                    _0xce56x92['checked'] ? _0xce56x92['checked'] = false : _0xce56x92['checked'] = true
                })
            })
        };

        var _0xce56x93 = document['querySelectorAll']('.classic-toggle');
        if (_0xce56x93['length']) {
            _0xce56x93['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    _0xce56xc['querySelector']('i:last-child')['classList']['toggle']('fa-rotate-180');
                    _0xce56xc['querySelector']('i:last-child')['style']['transition'] = 'all 250ms ease'
                })
            })
        };

        var _0xce56x94 = document['querySelectorAll']('[data-toast]');
        if (_0xce56x94['length']) {
            _0xce56x94['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    var _0xce56x95 = _0xce56xc['getAttribute']('data-toast');
                    var _0xce56x96 = document['getElementById'](_0xce56x95);
                    var _0xce56x96 = new bootstrap.Toast(_0xce56x96);
                    _0xce56x96['show']()
                })
            })
        };

        var _0xce56x97 = []['slice']['call'](document['querySelectorAll']('[data-bs-toggle=\"dropdown\"]'));
        if (_0xce56x97['length']) {
            var _0xce56x98 = _0xce56x97['map'](function(_0xce56x99) {
                return new bootstrap.Dropdown(_0xce56x99)
            })
        };

        var _0xce56x9a = document['querySelectorAll']('.show-business-opened, .show-business-closed, .working-hours');
        if (_0xce56x9a['length']) {
            var _0xce56x9b = new Date();
            var _0xce56x9c = _0xce56x9b['getDay']();
            var _0xce56x9d = _0xce56x9b['getHours']() + '.' + _0xce56x9b['getMinutes']();
            var _0xce56x9e = [
                ['Sunday'],
                ['Monday', 9.00, 17.00],
                ['Tuesday', 9.00, 17.00],
                ['Wednesday', 9.00, 17.00],
                ['Thursday', 9.00, 17.00],
                ['Friday', 9.00, 17.00],
                ['Saturday', 9.00, 13.00]
            ];
            var _0xce56x9f = _0xce56x9e[_0xce56x9c];
            var _0xce56xa0 = document['querySelectorAll']('.show-business-opened');
            var _0xce56xa1 = document['querySelectorAll']('.show-business-closed');
            if (_0xce56x9d > _0xce56x9f[1] && _0xce56x9d < _0xce56x9f[2] || _0xce56x9d > _0xce56x9f[3] && _0xce56x9d < _0xce56x9f[4]) {
                _0xce56xa0['forEach'](function(_0xce56xb) {
                    _0xce56xb['classList']['remove']('disabled')
                });
                _0xce56xa1['forEach'](function(_0xce56xb) {
                    _0xce56xb['classList']['add']('disabled')
                })
            } else {
                _0xce56xa0['forEach'](function(_0xce56xb) {
                    _0xce56xb['classList']['add']('disabled')
                });
                _0xce56xa1['forEach'](function(_0xce56xb) {
                    _0xce56xb['classList']['remove']('disabled')
                })
            };
            var _0xce56x9a = document['querySelectorAll']('.working-hours[data-day]');
            _0xce56x9a['forEach'](function(_0xce56xa2) {
                var _0xce56xa3 = _0xce56xa2['getAttribute']('data-day');
                if (_0xce56xa3 === _0xce56x9f[0]) {
                    var _0xce56xa4 = '[data-day=\"' + _0xce56x9f[0] + '\"]';
                    if (_0xce56x9d > _0xce56x9f[1] && _0xce56x9d < _0xce56x9f[2] || _0xce56x9d > _0xce56x9f[3] && _0xce56x9d < _0xce56x9f[4]) {
                        document['querySelectorAll'](_0xce56xa4)[0]['classList']['add']('bg-green-dark');
                        document['querySelectorAll'](_0xce56xa4 + ' p')['forEach'](function(_0xce56xa5) {
                            _0xce56xa5['classList']['add']('color-white')
                        })
                    } else {
                        document['querySelectorAll'](_0xce56xa4)[0]['classList']['add']('bg-red-dark');
                        document['querySelectorAll'](_0xce56xa4 + ' p')['forEach'](function(_0xce56xa5) {
                            _0xce56xa5['classList']['add']('color-white')
                        })
                    }
                }
            })
        };

        var _0xce56xa6 = document['querySelectorAll']('[data-vibrate]');
        if (_0xce56xa6['length']) {
            var _0xce56xa7 = document['getElementsByClassName']('start-vibrating')[0];
            var _0xce56xa8 = document['getElementsByClassName']('stop-vibrating')[0];
            _0xce56xa7['addEventListener']('click', function() {
                var _0xce56xa9 = document['getElementsByClassName']('vibrate-demo')[0]['value'];
                window['navigator']['vibrate'](_0xce56xa9)
            });
            _0xce56xa8['addEventListener']('click', function() {
                window['navigator']['vibrate'](0)
            });
            _0xce56xa6['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    var _0xce56xa9 = _0xce56xc['getAttribute']('data-vibrate');
                    window['navigator']['vibrate'](_0xce56xa9)
                })
            })
        };

        var _0xce56xaa = document['querySelectorAll']('[data-timed-ad]');
        if (_0xce56xaa['length']) {
            _0xce56xaa['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    var _0xce56xab = _0xce56xc['getAttribute']('data-timed-ad');
                    var _0xce56xac = _0xce56xc['getAttribute']('data-menu');
                    var _0xce56xad = _0xce56xab;
                    var _0xce56xae = setInterval(function() {
                        if (_0xce56xad <= 1) {
                            clearInterval(_0xce56xae);
                            document['getElementById'](_0xce56xac)['querySelectorAll']('.fa-times')[0]['classList']['remove']('disabled');
                            document['getElementById'](_0xce56xac)['querySelectorAll']('.close-menu')[0]['classList']['remove']('no-click');
                            document['getElementById'](_0xce56xac)['querySelectorAll']('span')[0]['style']['display'] = 'none'
                        } else {};
                        document['getElementById'](_0xce56xac)['querySelectorAll']('span')[0]['innerHTML'] = _0xce56xad -= 1
                    }, 1000)
                })
            })
        };

        var _0xce56xaf = document['querySelectorAll']('[data-auto-show-ad]');
        if (_0xce56xaf['length']) {
            var _0xce56xb0 = _0xce56xaf[0]['getAttribute']('data-auto-show-ad');
            var _0xce56xae = setInterval(function() {
                if (_0xce56xb0 <= 1) {
                    clearInterval(_0xce56xae);
                    var _0xce56xb1 = _0xce56xaf[0]['getAttribute']('data-menu');
                    document['getElementById'](_0xce56xb1)['classList']['add']('menu-active');
                    var _0xce56xb2 = _0xce56xaf[0]['getAttribute']('data-timed-ad');
                    var _0xce56xb3 = setInterval(function() {
                        if (_0xce56xb2 <= 0) {
                            clearInterval(_0xce56xb3);
                            document['getElementById'](_0xce56xb1)['querySelectorAll']('.fa-times')[0]['classList']['remove']('disabled');
                            document['getElementById'](_0xce56xb1)['querySelectorAll']('.close-menu')[0]['classList']['remove']('no-click');
                            document['getElementById'](_0xce56xb1)['querySelectorAll']('span')[0]['style']['display'] = 'none'
                        };
                        document['getElementById'](_0xce56xb1)['querySelectorAll']('span')[0]['innerHTML'] = _0xce56xb2 -= 1
                    }, 1000)
                };
                _0xce56xb0 -= 1
            }, 1000)
        };

        var _0xce56xb4 = document['querySelectorAll']('.reading-progress-text');
        if (_0xce56xb4['length']) {
            var _0xce56xb5 = _0xce56xb4[0]['innerHTML']['split'](' ')['length'];
            var _0xce56xb6 = Math['floor'](_0xce56xb5 / 250);
            var _0xce56xb7 = _0xce56xb5 % 60;
            document['getElementsByClassName']('reading-progress-words')[0]['innerHTML'] = _0xce56xb5;
            document['getElementsByClassName']('reading-progress-time')[0]['innerHTML'] = _0xce56xb6 + ':' + _0xce56xb7
        };

        var _0xce56xb8 = document['querySelectorAll']('.text-size-changer');
        if (_0xce56xb8['length']) {
            var _0xce56xb9 = document['querySelectorAll']('.text-size-increase');
            var _0xce56xba = document['querySelectorAll']('.text-size-decrease');
            var _0xce56xbb = document['querySelectorAll']('.text-size-default');
            _0xce56xb9[0]['addEventListener']('click', function() {
                _0xce56xb8[0]['querySelectorAll']('*')['forEach'](function(_0xce56xbc) {
                    const _0xce56xbd = window['getComputedStyle'](_0xce56xbc)['fontSize']['split']('px', 2)[0];
                    _0xce56xbc['style']['fontSize'] = (+_0xce56xbd + 1) + 'px'
                })
            });
            _0xce56xba[0]['addEventListener']('click', function() {
                _0xce56xb8[0]['querySelectorAll']('*')['forEach'](function(_0xce56xbc) {
                    const _0xce56xbd = window['getComputedStyle'](_0xce56xbc)['fontSize']['split']('px', 2)[0];
                    _0xce56xbc['style']['fontSize'] = (+_0xce56xbd - 1) + 'px'
                })
            });
            _0xce56xbb[0]['addEventListener']('click', function() {
                _0xce56xb8[0]['querySelectorAll']('*')['forEach'](function(_0xce56xbc) {
                    const _0xce56xbd = window['getComputedStyle'](_0xce56xbc)['fontSize']['split']('px', 2)[0];
                    _0xce56xbc['style']['fontSize'] = ''
                })
            })
        };

        var _0xce56xbe = document['querySelectorAll']('.qr-image');
        if (_0xce56xbe['length']) {
            var _0xce56xbf = window['location']['href'];
            var _0xce56xc0 = document['getElementsByClassName']('generate-qr-auto')[0];
            var _0xce56xc1 = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=';
            if (_0xce56xc0) {
                _0xce56xc0['setAttribute']('src', _0xce56xc1 + _0xce56xbf)
            };
            var _0xce56xc2 = document['getElementsByClassName']('generate-qr-button')[0];
            if (_0xce56xc2) {
                _0xce56xc2['addEventListener']('click', function() {
                    var _0xce56xc3 = document['getElementsByClassName']('qr-url')[0]['value'];
                    var _0xce56xc1 = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=';
                    var _0xce56xc4 = '<img class=\"mx-auto polaroid-effect shadow-l mt-4 delete-qr\" width=\"200\" src=\"' + _0xce56xc1 + _0xce56xc3 + '\" alt=\"img\"><p class=\"font-11 text-center mb-0\">' + _0xce56xc3 + '</p>';
                    document['getElementsByClassName']('generate-qr-result')[0]['innerHTML'] = _0xce56xc4;
                    _0xce56xc2['innerHTML'] = 'Generate New Button'
                })
            }
        };

        if (window['location']['protocol'] === 'file:') {
            var _0xce56xc5 = document['querySelectorAll']('a');
            _0xce56xc5['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('mouseover', (_0xce56x5f) => {})
            })
        };

        var _0xce56xc6 = document['querySelectorAll']('[data-search]');
        if (_0xce56xc6['length']) {
            var _0xce56xc7 = document['querySelectorAll']('.search-results');
            var _0xce56xc8 = document['querySelectorAll']('.search-no-results');
            var _0xce56xc9 = document['querySelectorAll']('.search-results div')[0]['childElementCount'];
            var _0xce56xca = document['querySelectorAll']('.search-trending');

            function _0xce56xcb() {
                var _0xce56xcc = _0xce56xc6[0]['value'];
                if (_0xce56xcc != '') {
                    _0xce56xc7[0]['classList']['remove']('disabled-search-list');
                    var _0xce56xcd = document['querySelectorAll']('[data-filter-item]');
                    for (let _0xce56xa = 0; _0xce56xa < _0xce56xcd['length']; _0xce56xa++) {
                        var _0xce56xce = _0xce56xcd[_0xce56xa]['getAttribute']('data-filter-name');
                        if (_0xce56xce['includes'](_0xce56xcc)) {
                            _0xce56xcd[_0xce56xa]['classList']['remove']('disabled');
                            if (_0xce56xca['length']) {
                                _0xce56xca[0]['classList']['add']('disabled')
                            }
                        } else {
                            _0xce56xcd[_0xce56xa]['classList']['add']('disabled');
                            if (_0xce56xca['length']) {
                                _0xce56xca[0]['classList']['remove']('disabled')
                            }
                        };
                        var _0xce56xcf = document['querySelectorAll']('.search-results div')[0]['getElementsByClassName']('disabled')['length'];
                        if (_0xce56xcf === _0xce56xc9) {
                            _0xce56xc8[0]['classList']['remove']('disabled');
                            if (_0xce56xca['length']) {
                                _0xce56xca[0]['classList']['add']('disabled')
                            }
                        } else {
                            _0xce56xc8[0]['classList']['add']('disabled');
                            if (_0xce56xca['length']) {
                                _0xce56xca[0]['classList']['add']('disabled')
                            }
                        }
                    }
                };
                if (_0xce56xcc === '') {
                    _0xce56xc7[0]['classList']['add']('disabled-search-list');
                    _0xce56xc8[0]['classList']['add']('disabled');
                    if (_0xce56xca['length']) {
                        _0xce56xca[0]['classList']['remove']('disabled')
                    }
                }
            }
            _0xce56xc6[0]['addEventListener']('keyup', function() {
                _0xce56xcb()
            });
            _0xce56xc6[0]['addEventListener']('click', function() {
                _0xce56xcb()
            });
            var _0xce56xd0 = document['querySelectorAll']('.search-trending a');
            _0xce56xd0['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    var _0xce56xd1 = _0xce56xc['querySelectorAll']('span')[0]['textContent']['toLowerCase']();
                    _0xce56xc6[0]['value'] = _0xce56xd1;
                    _0xce56xc6[0]['click']()
                })
            })
        };

        var _0xce56xd2 = document['querySelectorAll']('.shareToFacebook, .shareToTwitter, .shareToLinkedIn');
        if (_0xce56xd2['length']) {
            var _0xce56xd3 = window['location']['href'];
            var _0xce56xd4 = document['title'];
            document['querySelectorAll']('.shareToFacebook')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'https://www.facebook.com/sharer/sharer.php?u=' + _0xce56xd3)
            });
            document['querySelectorAll']('.shareToTwitter')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'http://twitter.com/share?text=' + _0xce56xd3)
            });
            document['querySelectorAll']('.shareToPinterest')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'https://pinterest.com/pin/create/button/?url=' + _0xce56xd3)
            });
            document['querySelectorAll']('.shareToWhatsApp')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'whatsapp://send?text=' + _0xce56xd3)
            });
            document['querySelectorAll']('.shareToMail')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'mailto:?body=' + _0xce56xd3)
            });
            document['querySelectorAll']('.shareToLinkedIn')['forEach']((_0xce56xd5) => {
                return _0xce56xd5['setAttribute']('href', 'https://www.linkedin.com/shareArticle?mini=true&url=' + _0xce56xd3 + '&title=' + _0xce56xd4 + '&summary=&source=')
            })
        };

        var _0xce56xd6 = document['querySelectorAll']('.contact-form');
        if (_0xce56xd6['length']) {
            var _0xce56xd7 = document['getElementById']('contactForm');
            _0xce56xd7['onsubmit'] = function(_0xce56xb) {
                _0xce56xb['preventDefault']();
                var _0xce56xd8 = document['getElementById']('contactNameField');
                var _0xce56xd9 = document['getElementById']('contactEmailField');
                var _0xce56xda = document['getElementById']('contactMessageTextarea');
                var _0xce56xdb = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (_0xce56xd8['value'] === '') {
                    _0xce56xd7['setAttribute']('data-form', 'invalid');
                    _0xce56xd8['classList']['add']('border-red-dark');
                    document['getElementById']('validator-name')['classList']['remove']('disabled')
                } else {
                    _0xce56xd7['setAttribute']('data-form', 'valid');
                    document['getElementById']('validator-name')['classList']['add']('disabled');
                    _0xce56xd8['classList']['remove']('border-red-dark')
                };
                if (_0xce56xd9['value'] === '') {
                    _0xce56xd7['setAttribute']('data-form', 'invalid');
                    _0xce56xd9['classList']['add']('border-red-dark');
                    document['getElementById']('validator-mail1')['classList']['remove']('disabled')
                } else {
                    document['getElementById']('validator-mail1')['classList']['add']('disabled');
                    if (!_0xce56xdb['test'](_0xce56xd9['value'])) {
                        _0xce56xd7['setAttribute']('data-form', 'invalid');
                        _0xce56xd9['classList']['add']('border-red-dark');
                        document['getElementById']('validator-mail2')['classList']['remove']('disabled')
                    } else {
                        _0xce56xd7['setAttribute']('data-form', 'valid');
                        document['getElementById']('validator-mail2')['classList']['add']('disabled');
                        _0xce56xd9['classList']['remove']('border-red-dark')
                    }
                };
                if (_0xce56xda['value'] === '') {
                    _0xce56xd7['setAttribute']('data-form', 'invalid');
                    _0xce56xda['classList']['add']('border-red-dark');
                    document['getElementById']('validator-text')['classList']['remove']('disabled')
                } else {
                    _0xce56xd7['setAttribute']('data-form', 'valid');
                    document['getElementById']('validator-text')['classList']['add']('disabled');
                    _0xce56xda['classList']['remove']('border-red-dark')
                };
                if (_0xce56xd7['getAttribute']('data-form') === 'valid') {
                    document['querySelectorAll']('.form-sent')[0]['classList']['remove']('disabled');
                    document['querySelectorAll']('.contact-form')[0]['classList']['add']('disabled');
                    var _0xce56xdc = {};
                    for (let _0xce56xa = 0, _0xce56xdd = _0xce56xd7['length']; _0xce56xa < _0xce56xdd; ++_0xce56xa) {
                        let _0xce56xde = _0xce56xd7[_0xce56xa];
                        if (_0xce56xde['name']) {
                            _0xce56xdc[_0xce56xde['name']] = _0xce56xde['value']
                        }
                    };
                    var _0xce56xdf = new XMLHttpRequest();
                    _0xce56xdf['open'](_0xce56xd7['method'], _0xce56xd7['action'], true);
                    _0xce56xdf['setRequestHeader']('Accept', 'application/json; charset=utf-8');
                    _0xce56xdf['setRequestHeader']('Content-Type', 'application/json; charset=UTF-8');
                    _0xce56xdf['send'](JSON['stringify'](_0xce56xdc));
                    _0xce56xdf['onloadend'] = function(_0xce56xe0) {
                        if (_0xce56xe0['target']['status'] === 200) {
                            console['log']('Form Submitted')
                        }
                    }
                }
            }
        };

        var _0xce56xe1 = document['querySelectorAll']('[data-bs-toggle=\"collapse\"]:not(.no-effect)');
        if (_0xce56xe1['length']) {
            _0xce56xe1['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    if (_0xce56xc['querySelectorAll']('i')['length']) {
                        _0xce56xc['querySelector']('i')['classList']['toggle']('fa-rotate-180')
                    }
                })
            })
        };

        var _0xce56xe2 = document['querySelectorAll']('.tab-controls a');
        if (_0xce56xe2['length']) {
            _0xce56xe2['forEach'](function(_0xce56xb) {
                if (_0xce56xb['hasAttribute']('data-active')) {
                    var _0xce56xe3 = _0xce56xb['parentNode']['getAttribute']('data-highlight');
                    _0xce56xb['classList']['add'](_0xce56xe3);
                    _0xce56xb['classList']['add']('no-click')
                }
            });
            _0xce56xe2['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                    var _0xce56xe3 = _0xce56xc['parentNode']['getAttribute']('data-highlight');
                    var _0xce56xe4 = _0xce56xc['parentNode']['querySelectorAll']('a');
                    _0xce56xe4['forEach'](function(_0xce56xb) {
                        _0xce56xb['classList']['remove'](_0xce56xe3);
                        _0xce56xb['classList']['remove']('no-click')
                    });
                    _0xce56xc['classList']['add'](_0xce56xe3);
                    _0xce56xc['classList']['add']('no-click')
                })
            })
        };

        function _0xce56x34(_0xce56xe5, _0xce56xe6, _0xce56xe7) {
            setTimeout(function() {
                if (_0xce56xe6 === 'show') {
                    return document['getElementById'](_0xce56xe5)['classList']['add']('menu-active'), document['querySelectorAll']('.menu-hider')[0]['classList']['add']('menu-active')
                } else {
                    return document['getElementById'](_0xce56xe5)['classList']['remove']('menu-active'), document['querySelectorAll']('.menu-hider')[0]['classList']['remove']('menu-active')
                }
            }, _0xce56xe7)
        }

        var _0xce56xe8 = document['querySelectorAll']('[data-auto-activate]');
        if (_0xce56xe8['length']) {
            setTimeout(function() {
                _0xce56xe8[0]['classList']['add']('menu-active');
                _0xce56xd[0]['classList']['add']('menu-active')
            }, 0)
        };

        var _0xce56xe9 = document['getElementById']('copyright-year');
        if (_0xce56xe9) {
            var _0xce56xea = new Date();
            const _0xce56xeb = _0xce56xea['getFullYear']();
            _0xce56xe9['textContent'] = _0xce56xeb
        };

        var _0xce56xec = document['querySelectorAll']('.check-age');
        if (_0xce56xec['length']) {
            _0xce56xec[0]['addEventListener']('click', function() {
                var _0xce56xed = document['querySelectorAll']('#date-birth-day')[0]['value'];
                var _0xce56xee = document['querySelectorAll']('#date-birth-month')[0]['value'];
                var _0xce56xef = document['querySelectorAll']('#date-birth-year')[0]['value'];
                var _0xce56xf0 = 18;
                var _0xce56xf1 = new Date();
                _0xce56xf1['setFullYear'](_0xce56xef, _0xce56xee - 1, _0xce56xed);
                var _0xce56xf2 = new Date();
                var _0xce56xf3 = new Date();
                _0xce56xf3['setFullYear'](_0xce56xf1['getFullYear']() + _0xce56xf0, _0xce56xee - 1, _0xce56xed);
                var _0xce56xf4 = document['querySelectorAll']('#menu-age');
                var _0xce56xf5 = document['querySelectorAll']('#menu-age-fail');
                var _0xce56xf6 = document['querySelectorAll']('#menu-age-okay');
                console['log'](_0xce56xf2);
                console['log'](_0xce56xf3);
                console['log'](_0xce56xee);
                if ((_0xce56xf2 - _0xce56xf3) > 0) {
                    console['log']('above 18');
                    _0xce56xf4[0]['classList']['remove']('menu-active');
                    _0xce56xf6[0]['classList']['add']('menu-active')
                } else {
                    _0xce56xf4[0]['classList']['remove']('menu-active');
                    _0xce56xf5[0]['classList']['add']('menu-active')
                };
                return true
            })
        };

        var _0xce56xf7 = document['querySelectorAll']('.offline-message');
        if (!_0xce56xf7['length']) {
            const _0xce56xf8 = document['createElement']('p');
            const _0xce56xf9 = document['createElement']('p');
            _0xce56xf8['className'] = 'offline-message bg-red-dark color-white';
            _0xce56xf8['textContent'] = 'No internet connection detected';
            _0xce56xf9['className'] = 'online-message bg-green-dark color-white';
            _0xce56xf9['textContent'] = 'You are back online';
            document['getElementsByTagName']('body')[0]['appendChild'](_0xce56xf8);
            document['getElementsByTagName']('body')[0]['appendChild'](_0xce56xf9)
        };

        function _0xce56xfa() {
            var _0xce56xfb = document['querySelectorAll']('a');
            _0xce56xfb['forEach'](function(_0xce56xb) {
                var _0xce56xfc = _0xce56xb['getAttribute']('href');
                if (_0xce56xfc['match'](/.html/)) {
                    _0xce56xb['classList']['add']('show-offline');
                    _0xce56xb['setAttribute']('data-link', _0xce56xfc);
                    _0xce56xb['setAttribute']('href', '#')
                }
            });
            var _0xce56xfd = document['querySelectorAll']('.show-offline');
            _0xce56xfd['forEach']((_0xce56xc) => {
                return _0xce56xc['addEventListener']('click', (_0xce56x5f) => {
                    document['getElementsByClassName']('offline-message')[0]['classList']['add']('offline-message-active');
                    setTimeout(function() {
                        document['getElementsByClassName']('offline-message')[0]['classList']['remove']('offline-message-active')
                    }, 1500)
                })
            })
        }

        function _0xce56xfe() {
            var _0xce56xff = document['querySelectorAll']('[data-link]');
            _0xce56xff['forEach'](function(_0xce56xb) {
                var _0xce56xfc = _0xce56xb['getAttribute']('data-link');
                if (_0xce56xfc['match'](/.html/)) {
                    _0xce56xb['setAttribute']('href', _0xce56xfc);
                    _0xce56xb['removeAttribute']('data-link', '')
                }
            })
        }

        var _0xce56x100 = document['getElementsByClassName']('offline-message')[0];
        var _0xce56x101 = document['getElementsByClassName']('online-message')[0];

        function _0xce56x102() {
            _0xce56xfe();
            _0xce56x101['classList']['add']('online-message-active');
            setTimeout(function() {
                _0xce56x101['classList']['remove']('online-message-active')
            }, 2000);
            console['info']('Connection: Online')
        }

        function _0xce56x103() {
            _0xce56xfa();
            _0xce56x100['classList']['add']('offline-message-active');
            setTimeout(function() {
                _0xce56x100['classList']['remove']('offline-message-active')
            }, 2000);
            console['info']('Connection: Offline')
        }

        var _0xce56x104 = document['querySelectorAll']('.simulate-offline');
        var _0xce56x105 = document['querySelectorAll']('.simulate-online');
        if (_0xce56x104['length']) {
            _0xce56x104[0]['addEventListener']('click', function() {
                _0xce56x103()
            });
            _0xce56x105[0]['addEventListener']('click', function() {
                _0xce56x102()
            })
        };

        function _0xce56x106(_0xce56x5f) {
            var _0xce56x107 = navigator['onLine'] ? 'online' : 'offline';
            _0xce56x102()
        }

        function _0xce56x108(_0xce56x5f) {
            _0xce56x103()
        }

        window['addEventListener']('online', _0xce56x106);
        window['addEventListener']('offline', _0xce56x108);
        const _0xce56x109 = document['querySelectorAll']('.simulate-iphone-badge');
        _0xce56x109['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                document['getElementsByClassName']('add-to-home')[0]['classList']['add']('add-to-home-visible', 'add-to-home-ios');
                document['getElementsByClassName']('add-to-home')[0]['classList']['remove']('add-to-home-android')
            })
        });
        const _0xce56x10a = document['querySelectorAll']('.simulate-android-badge');
        _0xce56x10a['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                document['getElementsByClassName']('add-to-home')[0]['classList']['add']('add-to-home-visible', 'add-to-home-android');
                document['getElementsByClassName']('add-to-home')[0]['classList']['remove']('add-to-home-ios')
            })
        });
        const _0xce56x10b = document['querySelectorAll']('.add-to-home');
        _0xce56x10b['forEach']((_0xce56xc) => {
            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                document['getElementsByClassName']('add-to-home')[0]['classList']['remove']('add-to-home-visible')
            })
        });

        if (_0xce56x6 === true) {
            caches['delete']('workbox-runtime')['then'](function() {});
            sessionStorage['clear']();
            caches['keys']()['then']((_0xce56x11a) => {
                _0xce56x11a['forEach']((_0xce56x11b) => {
                    caches['delete'](_0xce56x11b)
                })
            })
        };


        let _0xce56x10c = {
            Android: function() {
                return navigator['userAgent']['match'](/Android/i)
            },
            iOS: function() {
                return navigator['userAgent']['match'](/iPhone|iPad|iPod/i)
            },
            any: function() {
                return (_0xce56x10c.Android() || _0xce56x10c['iOS']())
            }
        };
        const _0xce56x10d = document['getElementsByClassName']('show-android');
        const _0xce56x10e = document['getElementsByClassName']('show-ios');
        const _0xce56x10f = document['getElementsByClassName']('show-no-device');
        if (!_0xce56x10c['any']()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10e['length']; _0xce56xa++) {
                _0xce56x10e[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10d['length']; _0xce56xa++) {
                _0xce56x10d[_0xce56xa]['classList']['add']('disabled')
            }
        };
        if (_0xce56x10c['iOS']()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10f['length']; _0xce56xa++) {
                _0xce56x10f[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10d['length']; _0xce56xa++) {
                _0xce56x10d[_0xce56xa]['classList']['add']('disabled')
            }
        };
        if (_0xce56x10c.Android()) {
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10e['length']; _0xce56xa++) {
                _0xce56x10e[_0xce56xa]['classList']['add']('disabled')
            };
            for (let _0xce56xa = 0; _0xce56xa < _0xce56x10f['length']; _0xce56xa++) {
                _0xce56x10f[_0xce56xa]['classList']['add']('disabled')
            }
        };

        if (_0xce56x2 === true) {
            var _0xce56x110 = document['getElementsByTagName']('html')[0];
            if (!_0xce56x110['classList']['contains']('isPWA')) {
                if ('serviceWorker' in navigator) {
                    window['addEventListener']('load', function() {
                        navigator['serviceWorker']['register'](_0xce56x8, {
                            scope: _0xce56x7
                        });
                    })
                };
                var _0xce56x111 = _0xce56x5 * 24;
                var _0xce56x9d = Date['now']();
                var _0xce56x112 = localStorage['getItem'](_0xce56x4 + '-PWA-Timeout-Value');
                if (_0xce56x112 == null) {
                    localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d)
                } else {
                    if (_0xce56x9d - _0xce56x112 > _0xce56x111 * 60 * 60 * 1000) {
                        localStorage['removeItem'](_0xce56x4 + '-PWA-Prompt');
                        localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d)
                    }
                };
                const _0xce56x113 = document['querySelectorAll']('.pwa-dismiss');
                _0xce56x113['forEach']((_0xce56xc) => {
                    return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                        const _0xce56x114 = document['querySelectorAll']('#menu-install-pwa-android, #menu-install-pwa-ios');
                        for (let _0xce56xa = 0; _0xce56xa < _0xce56x114['length']; _0xce56xa++) {
                            _0xce56x114[_0xce56xa]['classList']['remove']('menu-active')
                        };
                        localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d);
                        localStorage['setItem'](_0xce56x4 + '-PWA-Prompt', 'install-rejected');
                        console['log']('PWA Install Rejected. Will Show Again in ' + (_0xce56x5) + ' Days')
                    })
                });
                const _0xce56x114 = document['querySelectorAll']('#menu-install-pwa-android, #menu-install-pwa-ios');
                if (_0xce56x114['length']) {
                    if (_0xce56x10c.Android()) {
                        if (localStorage['getItem'](_0xce56x4 + '-PWA-Prompt') != 'install-rejected') {
                            function _0xce56x115() {
                                setTimeout(function() {
                                    if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                        console['log']('Triggering PWA Window for Android');
                                        document['getElementById']('menu-install-pwa-android')['classList']['add']('menu-active');
                                        document['querySelectorAll']('.menu-hider')[0]['classList']['add']('menu-active')
                                    }
                                }, 1000)
                            }
                            var _0xce56x116;
                            window['addEventListener']('beforeinstallprompt', (_0xce56xb) => {
                                _0xce56xb['preventDefault']();
                                _0xce56x116 = _0xce56xb;
                                _0xce56x115()
                            })
                        };
                        const _0xce56x117 = document['querySelectorAll']('.pwa-install');
                        _0xce56x117['forEach']((_0xce56xc) => {
                            return _0xce56xc['addEventListener']('click', (_0xce56xb) => {
                                _0xce56x116['prompt']();
                                _0xce56x116['userChoice']['then']((_0xce56x118) => {
                                    if (_0xce56x118['outcome'] === 'accepted') {
                                        console['log']('Added')
                                    } else {
                                        localStorage['setItem'](_0xce56x4 + '-PWA-Timeout-Value', _0xce56x9d);
                                        localStorage['setItem'](_0xce56x4 + '-PWA-Prompt', 'install-rejected');
                                        setTimeout(function() {
                                            if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                                document['getElementById']('menu-install-pwa-android')['classList']['remove']('menu-active');
                                                document['querySelectorAll']('.menu-hider')[0]['classList']['remove']('menu-active')
                                            }
                                        }, 50)
                                    };
                                    _0xce56x116 = null
                                })
                            })
                        });
                        window['addEventListener']('appinstalled', (_0xce56x119) => {
                            document['getElementById']('menu-install-pwa-android')['classList']['remove']('menu-active');
                            document['querySelectorAll']('.menu-hider')[0]['classList']['remove']('menu-active')
                        })
                    };
                    if (_0xce56x10c['iOS']()) {
                        if (localStorage['getItem'](_0xce56x4 + '-PWA-Prompt') != 'install-rejected') {
                            setTimeout(function() {
                                if (!window['matchMedia']('(display-mode: fullscreen)')['matches']) {
                                    console['log']('Triggering PWA Window for iOS');
                                    document['getElementById']('menu-install-pwa-ios')['classList']['add']('menu-active');
                                    document['querySelectorAll']('.menu-hider')[0]['classList']['add']('menu-active')
                                }
                            }, 1000)
                        }
                    }
                }
            };
            _0xce56x110['setAttribute']('class', 'isPWA')
        };
        
        var _0xce56x121 = '/';
        let _0xce56x122 = [
            //SCRIPTS/STYLES FOR PAGES
            {
                id: 'custom',
                call: 'scripts/custom.js',
                style: 'styles/custom.css',
                trigger: '#custom'
            },
            {
                id: 'auth',
                call: 'scripts/pages/auth/auth.js',
                trigger: '#auth'
            },
            {
                id: 'meet',
                call: 'scripts/pages/meet/meet.js',
                trigger: '#meet'
            },
            //SCRIPTS/STYLES FOR PLUGINS
            {
                id: 'uniqueID',
                plug: 'scripts/pluginName/plugin.js',
                call: 'scripts/pluginName/pluginName-call.js',
                style: 'scripts/pluginName/pluginName-style.css',
                trigger: '.pluginTriggerClass'
            }, {
                id: 'chart',
                plug: 'scripts/plugins/charts/charts.js',
                call: 'scripts/plugins/charts/charts-call-charts.js',
                trigger: '.chart'
            }, {
                id: 'chart',
                plug: 'scripts/plugins/charts/charts.js',
                call: 'scripts/plugins/charts/charts-call-wallet.js',
                trigger: '.wallet-chart'
            }, {
                id: 'graph',
                plug: 'scripts/plugins/charts/charts.js',
                call: 'scripts/plugins/charts/charts-call-graphs.js',
                trigger: '.graph'
            }, {
                id: 'count',
                plug: 'scripts/plugins/countdown/countdown.js',
                trigger: '.countdown'
            }, {
                id: 'gallery',
                plug: 'scripts/plugins/glightbox/glightbox.js',
                call: 'scripts/plugins/glightbox/glightbox-call.js',
                style: 'scripts/plugins/glightbox/glightbox.css',
                trigger: '[data-gallery]'
            }, {
                id: 'gallery-views',
                call: 'scripts/plugins/galleryViews/gallery-views.js',
                trigger: '.gallery-view-controls'
            }, {
                id: 'filter',
                plug: 'scripts/plugins/filterizr/filterizr.js',
                call: 'scripts/plugins/filterizr/filterizr-call.js',
                style: 'scripts/plugins/filterizr/filterizr.css',
                trigger: '.gallery-filter'
            }, {
                id: 'ba-slider',
                call: 'scripts/plugins/before-after/before-after.js',
                style: 'scripts/plugins/before-after/before-after.css',
                trigger: '#before-after-slider'
            }
    
        ];

        for (let _0xce56xa = 0; _0xce56xa < _0xce56x122['length']; _0xce56xa++) {
            if (document['querySelectorAll']('.' + _0xce56x122[_0xce56xa]['id'] + '-c')['length']) {
                document['querySelectorAll']('.' + _0xce56x122[_0xce56xa]['id'] + '-c')[0]['remove']()
            };
            var _0xce56x123 = document['querySelectorAll'](_0xce56x122[_0xce56xa]['trigger']);
            if (_0xce56x123['length']) {
                var _0xce56x124 = document['getElementsByTagName']('script')[1],
                    _0xce56x125 = document['createElement']('script');
                _0xce56x125['type'] = 'text/javascript';
                _0xce56x125['className'] = _0xce56x122[_0xce56xa]['id'] + '-p';
                _0xce56x125['src'] = _0xce56x121 + _0xce56x122[_0xce56xa]['plug'];
                _0xce56x125['addEventListener']('load', function() {
                    if (_0xce56x122[_0xce56xa]['call'] !== undefined) {
                        var _0xce56x126 = document['getElementsByTagName']('script')[2],
                            _0xce56x127 = document['createElement']('script');
                        _0xce56x127['type'] = 'text/javascript';
                        _0xce56x127['className'] = _0xce56x122[_0xce56xa]['id'] + '-c';
                        _0xce56x127['src'] = _0xce56x121 + _0xce56x122[_0xce56xa]['call'];
                        _0xce56x126['parentNode']['insertBefore'](_0xce56x127, _0xce56x126)
                    }
                });
                if (!document['querySelectorAll']('.' + _0xce56x122[_0xce56xa]['id'] + '-p')['length'] && _0xce56x122[_0xce56xa]['plug'] !== undefined) {
                    _0xce56x124['parentNode']['insertBefore'](_0xce56x125, _0xce56x124)
                } else {
                    if(_0xce56x122[_0xce56xa]['call'] !== undefined)
                    {
                        setTimeout(function() {
                            var _0xce56x124 = document['getElementsByTagName']('script')[1],
                                _0xce56x125 = document['createElement']('script');
                            _0xce56x125['type'] = 'text/javascript';
                            _0xce56x125['className'] = _0xce56x122[_0xce56xa]['id'] + '-c';
                            _0xce56x125['src'] = _0xce56x121 + _0xce56x122[_0xce56xa]['call'];
                            _0xce56x124['parentNode']['insertBefore'](_0xce56x125, _0xce56x124)
                        }, 50)
                    } 
                };
                if (_0xce56x122[_0xce56xa]['style'] !== undefined) {
                    if (!document['querySelectorAll']('.' + _0xce56x122[_0xce56xa]['id'] + '-s')['length']) {
                        var _0xce56x128 = document['createElement']('link');
                        _0xce56x128['className'] = _0xce56x122[_0xce56xa]['id'] + '-s';
                        _0xce56x128['rel'] = 'stylesheet';
                        _0xce56x128['type'] = 'text/css';
                        _0xce56x128['href'] = _0xce56x121 + _0xce56x122[_0xce56xa]['style'];
                        document['getElementsByTagName']('head')[0]['appendChild'](_0xce56x128)
                    }
                }
            }
        }  
    }

    if ('scrollRestoration' in window['history']) {
        window['history']['scrollRestoration'] = 'manual'
    };

    if (_0xce56x3 === true) {
        if (window['location']['protocol'] !== 'file:') {
            const swupOtions = {
                containers: ['#page'],
                cache: false,
                animateHistoryBrowsing: false,
                plugins: [
                    new SwupPreloadPlugin()
                ],
                linkSelector: 'a:not(.external-link):not(.default-link):not([href^=\"https\"]):not([href^=\"http\"]):not([data-gallery])',
            };
            swup = new Swup(swupOtions);
            document['addEventListener']('swup:pageView', (_0xce56xb) => {
                _init()
                _initCopyBtn();
                _initBtnLoader();
            })
        }
    } 
  
    _init();
    _initCopyBtn();
    _initBtnLoader();
})

