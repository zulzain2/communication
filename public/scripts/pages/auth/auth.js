

setTimeout(function() {

    ///////////////////////////////////////////////////////////////////////
    // redirect user back to prev url if unauthenticated
    if (document.querySelector('#loginPage') || document.querySelector('#registerOtpPage')) {
        var url = new URL(window.location.href);
        var prevUrl = url.searchParams.get("prevUrl");
        if(prevUrl){
            $('#prevUrl').val(prevUrl);
        }
    }
    ///////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////
    //for connect user button
    $('#connectBtn').on('click' , function(event){
        
        if (navigator.onLine) {

            var form = $("#connectForm");

            // Loop over them and prevent submission
            Array.prototype.slice.call(form)
            .forEach(function (form) {
                if (!form.checkValidity()) 
                {
                    event.preventDefault()
                    event.stopPropagation()
                }
                else
                {
                    $('#connectBtn').addClass('off-btn').trigger('classChange');

                    var datas = {};
                    var datas = new URLSearchParams();
                    $.each($('#connectForm').serializeArray(), function(i, field) {
                        datas.append(field.name, field.value);
                    });
                    // console.log(datas);
                    fetch("/login", {
                        method: 'post',
                        credentials: "same-origin",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: datas,
                    })
                    .then(function(response){
                        return response.json();
                    }).then(function(resultsJSON){
                        // console.log(resultsJSON);
                        var results = resultsJSON

                                if(results.status == 'success'){
                                    
                                    $('#connectBtn').removeClass('off-btn').trigger('classChange');
                                    window.location.href = '/verifyOtp?tempuser_id='+results.user_id+'&type=login&prevUrl='+results.prevUrl+'';

                                    // swup.loadPage({
                                    //     url: '/verifyOtp?tempuser_id='+results.user_id+'&type=login&prevUrl='+results.prevUrl+'', 
                                    //     method: 'GET',
                                    //     customTransition: '' 
                                    // });

                                }
                                else{

                                    if(results.type == 'Validation Error')
                                    {
                                        $('#connectBtn').removeClass('off-btn').trigger('classChange');

                                        validationErrorBuilder(results);

                                    }
                                    else
                                    {
                                        $('#connectBtn').removeClass('off-btn').trigger('classChange');
                                        snackbar(results.status , results.message)
                                    }
                                }

                    })
                    .catch(function(err) {
                        console.log(err);
                    });

                }
                    form.classList.add('was-validated')
            })
        


        } else {
            menu('menu-offline', 'show', 250);
        } 
    });
    ///////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////
    //for register user button
    $('#registerBtn').on('click' , function(event){

    if (navigator.onLine) {

        var form = $("#registerForm");

        // Loop over them and prevent submission
        Array.prototype.slice.call(form)
        .forEach(function (form) {
            if (!form.checkValidity()) 
            {
                event.preventDefault()
                event.stopPropagation()
            }
            else
            {
                $('#registerBtn').addClass('off-btn').trigger('classChange');

                var datas = {};
                var datas = new URLSearchParams();
                $.each($('#registerForm').serializeArray(), function(i, field) {
                    datas.append(field.name, field.value);
                });
                // console.log(datas);
                fetch("/register", {
                    method: 'post',
                    credentials: "same-origin",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: datas,
                })
                .then(function(response){
                    return response.json();
                }).then(function(resultsJSON){
                    // console.log(resultsJSON);
                    var results = resultsJSON

                            if(results.status == 'success'){
                                
                                $('#registerBtn').removeClass('off-btn').trigger('classChange');

                                window.location.href = '/verifyOtp?tempuser_id='+results.user_id+'&type=register';

                                // swup.loadPage({
                                //     url: '/verifyOtp?tempuser_id='+results.user_id+'&type=register', 
                                //     method: 'GET',
                                //     customTransition: '' 
                                // });

                            }
                            else{
                                if(results.type == 'Validation Error')
                                {
                                    $('#registerBtn').removeClass('off-btn').trigger('classChange');

                                    validationErrorBuilder(results);

                                }
                                else
                                {
                                    $('#registerBtn').removeClass('off-btn').trigger('classChange');
                                    snackbar(results.status , results.message)
                                }
                            }

                })
                .catch(function(err) {
                    console.log(err);
                });

            }
                form.classList.add('was-validated')
        })

    } else {
        menu('menu-offline', 'show', 250);
    } 
    });
    ///////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////
    // for verify otp
    if (document.querySelector('#verifyOtpPage')) {

    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());
            
            if(e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));
                
                if(prev.length) {
                    $(prev).select();
                }
            } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));
                
                if(next.length) {
                    $(next).select();
                } else {
                    if(parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });

    ///////////////////////////////////////////////////////////////////////
    //for verify otp user button
    $('#verifyOtpBtn').on('click' , function(event){
        if (navigator.onLine) {
        
            var form = $("#verifyOtpForm");

            // Loop over them and prevent submission
            Array.prototype.slice.call(form)
            .forEach(function (form) {
                if (!form.checkValidity()) 
                {
                    event.preventDefault()
                    event.stopPropagation()
                }
                else
                {
                    $('#verifyOtpBtn').addClass('off-btn').trigger('classChange');

                    var datas = {};
                    var datas = new URLSearchParams();
                    $.each($('#verifyOtpForm').serializeArray(), function(i, field) {
                        datas.append(field.name, field.value);
                    });
                    // console.log(datas);
                    fetch("/verifyOtp", {
                        method: 'post',
                        credentials: "same-origin",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: datas,
                    })
                    .then(function(response){
                        return response.json();
                    }).then(function(resultsJSON){
                        // console.log(resultsJSON);
                        var results = resultsJSON

                                if(results.status === 'success'){
                                    
                                    $('#verifyOtpBtn').removeClass('off-btn').trigger('classChange');

                                    // Flutter function - Save FCM Token & Device Info 
                                    if(window.flutter_inappwebview)
                                    {
                                        const args = [results.user_id];
                                        window.flutter_inappwebview.callHandler('fcmHandler', ...args);
                                    }

                                    if(results.prevUrl)
                                    {
                                        window.location.href = results.prevUrl;

                                        // swup.loadPage({
                                        //     url: results.prevUrl, 
                                        //     method: 'GET',
                                        //     customTransition: '' 
                                        // });
                                    }
                                    else
                                    {
                                        window.location.href = '/chat';
                                        
                                        // swup.loadPage({
                                        //     url: '/home', 
                                        //     method: 'GET',
                                        //     customTransition: '' 
                                        // });
                                    }

                                    

                                }
                                else{

                                    if(results.type === 'Expired OTP')
                                    {
                                        $('#digit-1').val('');
                                        $('#digit-2').val('');
                                        $('#digit-3').val('');
                                        $('#digit-4').val('');
                                        $('#verifyOtpBtn').removeClass('off-btn').trigger('classChange');
                                        snackbar(results.status , results.message)

                                        setTimeout(function() {
                                            window.history.back();
                                        }, 3000);
                                    }
                                    else if (results.type == 'Invalid OTP'){
                                        $('#digit-1').val('');
                                        $('#digit-2').val('');
                                        $('#digit-3').val('');
                                        $('#digit-4').val('');
                                        $('#verifyOtpBtn').removeClass('off-btn').trigger('classChange');
                                        snackbar(results.status , results.message)
                                    }
                                    else if(results.type == 'Validation Error')
                                    {
                                        $('#verifyOtpBtn').removeClass('off-btn').trigger('classChange');

                                        validationErrorBuilder(results);
                                        
                                    }
                                    else{
                                        snackbar(results.status , results.message)
                                    }

                                }

                    })
                    .catch(function(err) {
                        console.log(err);
                    });

                }
                    form.classList.add('was-validated')
            })
        
        } else {
            menu('menu-offline', 'show', 250);
        } 
    });
    ///////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////
    //for try again otp user button
    $('#tryAgainOtp').on('click' , function(event){
        if (navigator.onLine) {
        
                    $('#tryAgainOtp').addClass('off-btn').trigger('classChange');

                    var url = new URL(window.location.href);

                    var  tryAgainOtp = new URLSearchParams();
                    tryAgainOtp.append('user_id', url.searchParams.get("tempuser_id"));
                    tryAgainOtp.append('type', url.searchParams.get("type"));

                    fetch("/tryAgainOtp", {
                        method: 'post',
                        credentials: "same-origin",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: tryAgainOtp,
                    })
                    .then(function(response){
                        return response.json();
                    }).then(function(resultsJSON){
                    
                        var results = resultsJSON

                                if(results.status === 'success'){
                                    
                                    $('#tryAgainOtp').removeClass('off-btn').trigger('classChange');

                                    snackbar(results.status , results.message)
                                    
                                    $('#seconds-counter').html('');
                                    $('#seconds-counter').show();
                                    $('#tryAgainOtp').prop('disabled', true);

                                    var seconds = 60;
                                    var el = document.getElementById('seconds-counter');
                                    // console.log(el);

                                    function incrementSeconds() {
                                        seconds -= 1;

                                        if(seconds >= 0)
                                        {
                                            el.innerHTML = ''+seconds+' Seconds';
                                        }

                                        if(seconds == 0){
                                            $('#tryAgainOtp').prop('disabled', false);
                                            $('#seconds-counter').hide();
                                        }
                                    }

                                    var cancel = setInterval(incrementSeconds, 1000);                                 

                                }
                                else{

                                    if(results.type == 'Validation Error')
                                    {
                                        $('#tryAgainOtp').removeClass('off-btn').trigger('classChange');

                                        validationErrorBuilder(results);
                                    }
                                    else{
                                        snackbar(results.status , results.message)
                                    }

                                }

                    })
                    .catch(function(err) {
                        console.log(err);
                    });

                
        
        
        } else {
            menu('menu-offline', 'show', 250);
        } 
    });

    if (document.querySelector('#seconds-counter')) 
    {
        var seconds = 60;
        var el = document.getElementById('seconds-counter');
        // console.log(el);

        function incrementSeconds() {
            seconds -= 1;
            if(seconds >= 0)
            {
                el.innerHTML = ''+seconds+' Seconds';
            }
            if(seconds == 0){
                $('#tryAgainOtp').prop('disabled', false);
                $('#seconds-counter').hide();
            }
        }

        var cancel = setInterval(incrementSeconds, 1000);
    }
    ///////////////////////////////////////////////////////////////////////

    };
    ///////////////////////////////////////////////////////////////////////

}, 250);

