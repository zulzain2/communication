///////////////////////////////////////////////////////////////////////
//for footer
if (document.querySelector('#footer-bar')) {
    if (window.location.href.indexOf("home") > -1) 
    {
        $('#notification').removeClass('color-highlight');
        $('#home').addClass('active-nav');
        $('#chat').removeClass('active-nav');
        $('#meet').removeClass('active-nav');
        $('#file').removeClass('active-nav');
        $('#setting').removeClass('active-nav');
    }
    else if (window.location.href.indexOf("chat") > -1) 
    {
        $('#notification').removeClass('color-highlight');
        $('#home').removeClass('active-nav');
        $('#chat').addClass('active-nav');
        $('#meet').removeClass('active-nav');
        $('#file').removeClass('active-nav');
        $('#setting').removeClass('active-nav');
    }
    else if(window.location.href.indexOf("meet") > -1)
    {
        $('#notification').removeClass('color-highlight');
        $('#home').removeClass('active-nav');
        $('#chat').removeClass('active-nav');
        $('#meet').addClass('active-nav');
        $('#file').removeClass('active-nav');
        $('#setting').removeClass('active-nav');
    }
    else if(window.location.href.indexOf("file") > -1)
    {
        $('#notification').removeClass('color-highlight');
        $('#home').removeClass('active-nav');
        $('#chat').removeClass('active-nav');
        $('#meet').removeClass('active-nav');
        $('#file').addClass('active-nav');
        $('#setting').removeClass('active-nav');
    }
    else if(window.location.href.indexOf("setting") > -1)
    {
        $('#notification').removeClass('color-highlight');
        $('#home').removeClass('active-nav');
        $('#chat').removeClass('active-nav');
        $('#meet').removeClass('active-nav');
        $('#file').removeClass('active-nav');
        $('#setting').addClass('active-nav');
    }
    else if(window.location.href.indexOf("notification") > -1)
    {
        $('#notification').addClass('color-highlight');
        $('#home').removeClass('active-nav');
        $('#chat').removeClass('active-nav');
        $('#meet').removeClass('active-nav');
        $('#file').removeClass('active-nav');
        $('#setting').removeClass('active-nav');
    }
}
///////////////////////////////////////////////////////////////////////

 setTimeout(function() {

    ///////////////////////////////////////////////////////////////////////
    // for append csrf-token
    if (document.querySelector('.csrf-token')) {
        ///////////////////////////////////////////////////////////////////////
        // fetch csrf token and append back to selected element
        fetch('/fetch/csrf').then(function(response) {
            return response.json();
        }).then(function(data) {

            var results = data

            document.querySelector('meta[name="csrf-token"]').setAttribute("content", results);
            $('.csrftoken').val(results);

        }).catch(function(err) {
            console.log('Error CSRF: ' + err);
        });
        ///////////////////////////////////////////////////////////////////////
    }
    ///////////////////////////////////////////////////////////////////////  

    ///////////////////////////////////////////////////////////////////////
    // for checking user auth
    if (document.querySelector('.check-auth')) {
        
        // fetch auth status and if no auth kick user to login
        fetch('/fetch/checkAuth').then(function(response) { 
            return response.json();
        }).then(function(data) {
            var results = data

            if(results === 'true')
            {
                if(window.location.href.indexOf("splashscreen") > -1){
                    swup.loadPage({
                        url: 'home',
                        method: 'GET',
                        customTransition: '' 
                    });
                }
                else if(window.location.href.indexOf("meetroom") > -1)
                {
                    // console.log('Authenticated');
                    var url = new URL(window.location.href);
                    var roomName = url.searchParams.get("roomName");
                    if(roomName){
                        // window.location.href = 'meet?roomName='+roomName+'';
                        swup.loadPage({
                            url: 'meet?roomName='+roomName+'',
                            method: 'GET',
                            customTransition: '' 
                        });
                    }
                }
            }
            else
            {
                if(window.location.href.indexOf("meetroom") > -1)
                {
                    // console.log('Unauthenticated');
                }
                else
                {
                    swup.loadPage({
                        url: 'login?prevUrl='+window.location.pathname+'',
                        method: 'GET',
                        customTransition: '' 
                    });
                }
            }

        }).catch(function(err) {
            console.log('Error Check Auth: ' + err);
        });
    }
    ///////////////////////////////////////////////////////////////////////   

    ///////////////////////////////////////////////////////////////////////
    //for connect user button
    $('#logoutBtn').on('click' , function(event){

        if (navigator.onLine) {

            $('#logoutBtn').addClass('off-btn').trigger('classChange');

            fetch("/logout", {
                method: 'post',
                credentials: "same-origin",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .then(function(response){
                return response.json();
            }).then(function(resultsJSON){

                var results = resultsJSON

                        if(results.status == 'success'){

                            $('#logoutBtn').removeClass('off-btn').trigger('classChange');

                            $('.menu-hider').removeClass('menu-active');

                            swup.loadPage({
                                url: '/login', 
                                method: 'GET',
                                customTransition: '' 
                            });

                        }
                        else{

                        }

            })
            .catch(function(err) {
                console.log(err);
            });
        } else {
            menu('menu-offline', 'show', 250);
        } 


    });
    ///////////////////////////////////////////////////////////////////////

}, 250);