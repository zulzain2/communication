setTimeout(function() {

            ///////////////////////////////////////////////////////////////////////
            //for meet.index.blade.php 
            if (document.querySelector('#meet')) {

                function scheduleLogBuilder(data){

                    let start = new Date(data.datetime);
                    let end = new Date(data.end_datetime);
                    
                    var date = moment(start).format('MMMM Do');
                    var time_start = moment(start).format('h:mm a');
                    var time_end = moment(end).format('h:mm a');

                    return `
                    <div class="row mb-3">
                        <div class="col-3">
                            <small>${date}<br>${time_start}</small>
                            
                        </div>
                        <div class="col-6">
                            <h5>${data.room_name}</h5>
                            <small><i class="far fa-clock"></i> ${time_start} - ${time_end}</small>
                        </div>
                        <div class="col-3">                                              
                            <a href="#" 
                            data-menu="menu-meeting-schedule-config" 
                            data-meeting-name="${data.room_name}"
                            data-meeting-id="${data.id}"
                            class="menu-meeting-schedule-config icon icon-xs rounded-sm me-1 shadow-l bg-highlight my-2" 
                            style="float:right"><i class="fas fa-ellipsis-v"></i></a>
                        </div>
                    </div>

                    <div class="divider mb-3"></div>
                    `;
                }

                function startMeetingBuilder(room_name){
                    $('#start-schedule-meeting').attr('data-id-meeting' , room_name);
                }

                function shareMeetingBuilder(room_name){
                    $('#copy-meet-link').html(window.location.hostname + '/meetroom?roomName=' + room_name);
                    $('#whatsapp-link-schedule').attr('onclick' , 'location.href="whatsapp://send?text='+window.location.hostname+'/meetroom?roomName='+room_name+'"');
                    $('#mail-link-schedule').attr('onclick' , 'location.href="mailto:?body='+window.location.hostname+'/meetroom?roomName='+room_name+'"');
                    $('#gmail-link-schedule').attr('onclick' , 'window.open("https://mail.google.com/mail/u/0/?fs=1&su=Join+Communicationt+Meeting&body='+window.location.hostname+'/meetroom?roomName='+room_name+'&tf=cm","_blank")');
                    $('#outlook-link-schedule').attr('onclick' , 'window.open("https://outlook.office.com/mail/deeplink/compose?subject=Join+Communicationt+Meeting&body='+window.location.hostname+'/meetroom?roomName='+room_name+'","_blank")');

                    // $('#copyMeet').attr('data-meeting-name', room_name);
                    // $('#meetEmail').attr('data-meeting-name', room_name);
                    // $('#meetGmail').attr('data-meeting-name', room_name);
                    // $('#meetOutlook').attr('data-meeting-name', room_name);
                }

                function editMeetingBuilder(meetingId){

                    fetch('/fetch/scheduleLog/'+meetingId+'')
                    .then(function(response) { 
                        return response.json();
                    }).then(function(data){
                    
                        $('#meetingIdScheduleEdit').val(data.id);
                        $('#meetingNameScheduleEdit').val(data.room_name);
                        $('#meetingDateScheduleEdit').val(moment(data.datetime).format('yyyy-MM-DD'));
                        $('#meetingStartScheduleEdit').val(moment(data.datetime).format('HH:mm:ss'));
                        $('#meetingEndScheduleEdit').val(moment(data.end_datetime).format('HH:mm:ss'));
                       
                    })
                    .catch(function(err) {
                        console.log('Error Schedule Log: ' + err);
                    });
                }

                function deleteMeetingBuilder(meetingId){
                    $('#meetingIdScheduleDelete').val(meetingId);
                }

                function updateMeetingLog(data){
                    var results = data

                    if (results.length) {
                        $('#meeting-log-list').html('');
                        results.map(meetinglog => {

                            let now = new Date(meetinglog.datetime);
                            
                            var dateStringWithTime = moment(now).format('MMMM Do YYYY, h:mm:ss a');

                            $('#meeting-log-list').append(`
                                <div class="row mb-0">
                                    <div class="col-6">
                                        <h5 class="mb-0">${meetinglog.room_name}</h5> 
                                        <small>as ${meetinglog.display_name}</small>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="mt-2 badge bg-highlight" style="font-size: 9px;">${dateStringWithTime}</span>
                                    </div>
                                </div>
                                <div class="divider my-3"></div>
                            `)
                        })

                    }
                    else{
                        $('#meeting-log-list').html('');

                        $('#meeting-log-list').append(`
                            <p class="text-center"><br>Your recent list is currently empty. Chat with your team and you will find all your recent meetings here.<br><br></p>
                        `);
                    }
                }

                async function updateScheduleLog(data){
                    var results = data

                    if (results.length) {
                        $('#schedule-log-list').html('');
                        await results.map(scheduleLog => {

                            $('#schedule-log-list').append(``+scheduleLogBuilder(scheduleLog)+``);
                        })
                         
                        $('.menu-meeting-schedule-config').on('click' , function(){
                            var meetingName = $(this).data('meeting-name');
                            var meetingId = $(this).data('meeting-id');

                            startMeetingBuilder(meetingId);

                            shareMeetingBuilder(meetingId);

                            editMeetingBuilder(meetingId);

                            deleteMeetingBuilder(meetingId);

                            menu('menu-meeting-schedule-config',  'show' , '')
                        });

                        $('.menu-meeting-share').on('click' , function(){
                            menu('menu-meeting-share',  'show' , '')
                        });

                    }
                    else{
                        $('#schedule-log-list').html('');

                        $('#schedule-log-list').append(`
                            <p id="emptyScheduleLog" class="text-center mx-0"><br>Your schedule list is currently empty. Create one to start with scheduled meeting.<br><br></p>
                        `);
                    }
                }

                function initializeMeeting(meetingId, usrName) {

                    $('#inviteBtn').addClass('off-btn').trigger('classChange');

                    $('#inviteBtn').on('click' , function() {
                        $('#menu-meeting-invitation').addClass('menu-active');
                    });

                    $('.close-menu-meeting-invitation').on('click' , function() {
                        $('#menu-meeting-invitation').removeClass('menu-active');
                    }); 

                    var domain = 'meet.tvetxr.ga';
                    var options = {
                        roomName: meetingId ? meetingId : 'MaGICXMeetRoom',
                        width: '100%',
                        height: '100%',
                        parentNode: document.querySelector('#meet_iframe'),
                        userInfo: {
                            displayName: usrName ? usrName : 'Fellow MaGICXian',
                        },
                        configOverwrite:{
                            prejoinPageEnabled: true,
                            disableDeepLinking: true,
                            apiLogLevels: ['log'],                    
                        },
                        interfaceConfigOverwrite: {
                            TOOLBAR_BUTTONS: [
                                'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                                'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
                                'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
                                'videoquality', 'filmstrip', 'feedback', 'stats', 'shortcuts',
                                'tileview', 'select-background', 'download', 'help', 'mute-everyone', 'mute-video-everyone', 'security'
                            ],
                        },
                    };
                    apiObj = new JitsiMeetExternalAPI(domain, options);
                    
                    apiObj.addEventListeners({
                        videoConferenceJoined: function(data) {

                            ///////////////////////////////////////////////////////////////////////
                            //for invite meeting button while in meeting
                            $('#invite-meeting-name').html(decodeURIComponent(data.roomName));
                            $('#invite-invitor').html(data.displayName);
                            $('#invite-link').html(window.location.hostname + '/meetroom?roomName=' + data.roomName);
                            
                            $('#whatsapp-link').attr('onclick' , 'location.href="whatsapp://send?text='+window.location.hostname+'/meetroom?roomName='+data.roomName+'"');
                            $('#mail-link').attr('onclick' , 'location.href="mailto:?body='+window.location.hostname+'/meetroom?roomName='+data.roomName+'"');
                            $('#gmail-link').attr('onclick' , 'window.open("https://mail.google.com/mail/u/0/?fs=1&su=Join+Communicationt+Meeting&body='+window.location.hostname+'/meetroom?roomName='+data.roomName+'&tf=cm","_blank")');
                            $('#outlook-link').attr('onclick' , 'window.open("https://outlook.office.com/mail/deeplink/compose?subject=Join+Communicationt+Meeting&body='+window.location.hostname+'/meetroom?roomName='+data.roomName+'","_blank")');
                            ///////////////////////////////////////////////////////////////////////

                            var currentdate = new Date();

                            var datetimefordb =  currentdate.getFullYear() + "-"
                                            + (currentdate.getMonth()+1)  + "-" 
                                            + currentdate.getDate() + " "  
                                            + currentdate.getHours() + ":"  
                                            + currentdate.getMinutes() + ":" 
                                            + currentdate.getSeconds();

                            var dataMeetingLog = new URLSearchParams();
                            dataMeetingLog.append('id_meetinglog', decodeURIComponent(data.roomName));
                            dataMeetingLog.append('display_name', data.displayName);
                            dataMeetingLog.append('datetime', datetimefordb);

                            fetch("fetch/storeMeetingInProgress", {
                                method: 'post',
                                credentials: "same-origin",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                body: dataMeetingLog,
                            })
                            .then(function(response){
                                return response.json();
                            }).then(function(resultsJSON){

                                updateMeetingLog(resultsJSON);

                            })
                            .catch(function(err) {
                                console.log(err);
                            });

                        },
                        participantRoleChanged: function(data) {
                            if(data.role === 'moderator') {
                                $('#inviteBtn').removeClass('off-btn').trigger('classChange');
                            }
                        },
                        readyToClose: function () {

                            var _0xce56x32 = document['querySelectorAll']('.menu-active');

                            for (let _0xce56xa = 0; _0xce56xa < _0xce56x32['length']; _0xce56xa++) {
                                _0xce56x32[_0xce56xa]['classList']['remove']('menu-active')
                            };

                            var id_meeting = $('#invite-meeting-name').html();

                            var currentdate = new Date();

                            var datetimefordb =  currentdate.getFullYear() + "-"
                                            + (currentdate.getMonth()+1)  + "-" 
                                            + currentdate.getDate() + " "  
                                            + currentdate.getHours() + ":"  
                                            + currentdate.getMinutes() + ":" 
                                            + currentdate.getSeconds();

                            var dataMeetingLog = new URLSearchParams();
                            dataMeetingLog.append('id_meetinglog', id_meeting);
                            dataMeetingLog.append('end_datetime', datetimefordb);

                            fetch("fetch/storeMeetingPass", {
                                method: 'post',
                                credentials: "same-origin",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                body: dataMeetingLog,
                            })
                            .then(function(response){
                                return response.json();
                            }).then(function(resultsJSON){

                                updateMeetingLog(resultsJSON);

                            })
                            .catch(function(err) {
                                console.log(err);
                            });


                            apiObj.dispose();
                        
                        }
                        
                    });
                }
            
                ///////////////////////////////////////////////////////////////////////
                //append data to meet public page when parameters available in link
                if (document.querySelector('#meetPublic')) {
                        
                    var url = new URL(window.location.href);
                    var roomName = url.searchParams.get("roomName");
                
                    if(roomName){
                        $('#meetingIdJoin').val(''+roomName+'');
                        $('#loginFirst').attr("href", '/login?prevUrl=/meet?roomName='+roomName+'')
                    }

                    $('body').removeClass('theme-light');
                    $('body').addClass('theme-dark');
                };
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //make join meeting tab active when roomName parameters available in link
                var url = new URL(window.location.href);
                var roomName = url.searchParams.get("roomName");
                if(roomName)
                {
                    $('#meeting-tab-1').removeClass('bg-highlight no-click');
                    $('#meetingIdJoin').val(roomName);
                    
                    $('#meeting-tab-1').addClass('collapsed');

                    $('#meeting-tab-2').removeClass('collapsed');
                    $('#meeting-tab-2').addClass('bg-highlight no-click');
                    
                    $('#tab-1').removeClass('show');
                    $('#tab-2').addClass('show');
                }
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                // fetch user and append back to selected element
                fetch('/fetch/user').then(function(response) {
                    return response.json();
                }).then(function(data) {
                    var results = data

                    if(results === 'false')
                    {

                    }
                    else
                    {
                        $('.usrName').val(results.name);
                    }
                }).catch(function(err) {
                    console.log('Error User: ' + err);
                });
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                // for offline checkbox
                $('#toggle-id').change(function() {
                    if (this.checked) {
                        $('#password_meeting').show();
                    } else {
                        $('#password_meeting').hide();
                    }
                });

                $('#toggle-id-schedule').change(function() {
                    if (this.checked) {
                        $('#password_meeting_schedule').show();
                    } else {
                        $('#password_meeting_schedule').hide();
                    }
                });
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //for start meeting button
                $('#start-meeting').on('click' , function(event){
                        
                    if (navigator.onLine) {
                    
                        var fsm = $("#createMeetingForm");

                        // Loop over them and prevent submission
                        Array.prototype.slice.call(fsm)
                        .forEach(function (form) {
                            if (!form.checkValidity()) 
                            {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            else
                            {

                                $('#start-meeting').addClass('off-btn').trigger('classChange');

                                var meetingName = $('#meetingName').val();
                                var usrName = $('#usrName').val();
                           

                                var dataForm = new URLSearchParams();
                                dataForm.append('room_name', meetingName);
                                dataForm.append('display_name', usrName);
                          
                                fetch("fetch/storeMeetingNotStart", {
                                    method: 'post',
                                    credentials: "same-origin",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    body: dataForm,
                                })
                                .then(function(response){
                                    return response.json();
                                }).then(function(resultsJSON){
                
                                    var results = resultsJSON
                                    
                                    if(results.status == 'success'){

                                        $('#start-meeting').removeClass('off-btn').trigger('classChange');

                                        $('#portfolio-2').addClass('menu-active');

                                        var meetingId = results.data.id;
                                        var usrName = results.data.display_name;
                            
                                        initializeMeeting(meetingId, usrName);

                                    }
                                    else{
                                            
                                        if(results.type == 'Validation Error')
                                        {
                                            $('#start-meeting').removeClass('off-btn').trigger('classChange');

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
                //for start meeting button
                $('#start-schedule-meeting').on('click' , function(event){
                        
                    if (navigator.onLine) {

                        $('#start-schedule-meeting').addClass('off-btn').trigger('classChange');

                        var meeting_id = $(this).data('id-meeting');

                        var dataForm = new URLSearchParams();
                        dataForm.append('meeting_id', meeting_id);
                    
                        fetch("fetch/getScheduleMeeting", {
                            method: 'post',
                            credentials: "same-origin",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: dataForm,
                        })
                        .then(function(response){
                            return response.json();
                        }).then(function(resultsJSON){
        
                            var results = resultsJSON
                            
                            if(results.status == 'success'){

                                $('#start-schedule-meeting').removeClass('off-btn').trigger('classChange');

                                menu('menu-meeting-schedule-config', 'hide', 250);

                                $('#portfolio-2').addClass('menu-active');

                                var meetingName = results.data.id;
                                var usrName = results.data.display_name;
                    
                                initializeMeeting(meetingName, usrName);

                            }
                            else{
                                    
                                if(results.type == 'Validation Error')
                                {
                                    $('#start-schedule-meeting').removeClass('off-btn').trigger('classChange');

                                    menu('menu-meeting-schedule-config', 'hide', 250);

                                    validationErrorBuilder(results);
                                }
                                else{

                                    $('#start-schedule-meeting').removeClass('off-btn').trigger('classChange');

                                    menu('menu-meeting-schedule-config', 'hide', 250);
                                    
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
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //for join meeting button
                $('#join-meeting').on('click' , function(event){
                        
                    if (navigator.onLine) {

                        var fsm = $("#joinMeetingForm");

                        // Loop over them and prevent submission
                        Array.prototype.slice.call(fsm)
                        .forEach(function (form) {
                            if (!form.checkValidity()) 
                            {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            else
                            {
                                $('#join-meeting').addClass('off-btn').trigger('classChange');

                                var meetingId = $('#meetingIdJoin').val();
                                var usrName = $('#usrNameJoin').val();

                                var dataForm = new URLSearchParams();
                                dataForm.append('id_meeting', meetingId);
                                dataForm.append('display_name', usrName);
                          
                                fetch("fetch/getMeetingInProgress", {
                                    method: 'post',
                                    credentials: "same-origin",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    body: dataForm,
                                })
                                .then(function(response){
                                    return response.json();
                                }).then(function(resultsJSON){
                
                                    var results = resultsJSON
                                    
                                    if(results.status == 'success'){

                                        $('#join-meeting').removeClass('off-btn').trigger('classChange');

                                        $('#portfolio-2').addClass('menu-active');

                                        var meetingId = results.data.id;
                            
                                        initializeMeeting(meetingId, usrName);

                                    }
                                    else{
                                            
                                        if(results.type == 'Validation Error')
                                        {
                                            $('#join-meeting').removeClass('off-btn').trigger('classChange');

                                            validationErrorBuilder(results);
                                        }
                                        else{

                                            $('#join-meeting').removeClass('off-btn').trigger('classChange');

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
                //fetch data for meeting log
                if (document.querySelector('#meeting-log')) {
                    // var networkDataReceived = false;

                    // fetch fresh meeting log
                    var networkUpdate = fetch('/fetch/meetingLog')
                    .then(function(response) { 
                        return response.json();
                    }).then(function(data){
                        // networkDataReceived = true;
                        
                        updateMeetingLog(data);
                    })
                    .catch(function(err) {
                        console.log('Error Meeting Log: ' + err);
                    });

                    // fetch cached meeting log
                    // caches.match('/fetch/meetingLog')
                    // .then(function(response) {
                    //     if (!response) throw Error("No data");
                    //     return response.json();
                    // }).then(function(data) {
                    //     // don't overwrite newer network data
                    //     if (!networkDataReceived) {
                        
                    //         updateMeetingLog(data)

                    //     }
                    // }).catch(function() {
                    //     // we didn't get cached data, the network is our last hope:
                    //     return networkUpdate;
                    // }).catch(function(err) {
                    //     console.log('Error Meeting Log: ' + err);
                    // });

                    
                };
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //for schedule meeting button
                $('#schedule-meeting').on('click' , function(event){
                        
                    if (navigator.onLine) {

                        var fsm = $("#scheduleMeetingForm");

                        // Loop over them and prevent submission
                        Array.prototype.slice.call(fsm)
                        .forEach(function (form) {
                            if (!form.checkValidity()) 
                            {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            else
                            {
                                
                                $('#schedule-meeting').addClass('off-btn').trigger('classChange');

                                var meetingName = $('#meetingNameSchedule').val();
                                var meetingDate = $('#meetingDateSchedule').val();
                                var meetingStart = $('#meetingStartSchedule').val();
                                var meetingEnd = $('#meetingEndSchedule').val();

                                var dataMeetingSchedule = new URLSearchParams();
                                dataMeetingSchedule.append('meeting_name', meetingName);
                                dataMeetingSchedule.append('meeting_date', meetingDate);
                                dataMeetingSchedule.append('meeting_start', meetingStart);
                                dataMeetingSchedule.append('meeting_end', meetingEnd);

                                fetch("fetch/storeMeetingSchedule", {
                                    method: 'post',
                                    credentials: "same-origin",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    body: dataMeetingSchedule,
                                })
                                .then(function(response){
                                    return response.json();
                                }).then(function(resultsJSON){
                
                                    var results = resultsJSON

                                    if(results.status == 'success'){
                                        // let now = new Date(meetinglog.datetime);
                                    
                                        // var dateStringWithTime = moment(now).format('MMMM Do YYYY, h:mm:ss a');
                                        $('#emptyScheduleLog').remove();

                                        snackbar('success' , results.message)
                                        $('#schedule-meeting').removeClass('off-btn').trigger('classChange');

                                        $('#meetingNameSchedule').val('');
                                        $('#meetingDateSchedule').val('');
                                        $('#meetingStartSchedule').val('');
                                        $('#meetingEndSchedule').val('');

                                        $('#schedule-log-list').prepend(``+scheduleLogBuilder(results.data)+``);

                                        $('.menu-meeting-schedule-config').on('click' , function(){
                                            var meetingName = $(this).data('meeting-name');
                                            
                                            startMeetingBuilder(results.data.id);

                                            shareMeetingBuilder(results.data.id);

                                            editMeetingBuilder(results.data.id);

                                            deleteMeetingBuilder(results.data.id);

                                            menu('menu-meeting-schedule-config',  'show' , '')
                                        });
            
                                        $('.menu-meeting-share').on('click' , function(){
                                            menu('menu-meeting-share',  'show' , '')
                                        });
                                        
                                    }
                                    else{
                                    
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
                //fetch data for schedule meeting log
                if (document.querySelector('#schedule-log')) {
                    var networkDataReceived = false;

                    // fetch fresh schedule log
                    var networkUpdate = fetch('/fetch/scheduleLog')
                    .then(function(response) { 
                        return response.json();
                    }).then(function(data){
                        networkDataReceived = true;
                        
                        updateScheduleLog(data);
                    })
                    .catch(function(err) {
                        console.log('Error Schedule Log: ' + err);
                    });
                };
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //for submit edit meeting button
                $('#edit-schedule-meeting').on('click' , function(event){

                    if (navigator.onLine) {
                        var fsm = $("#editScheduleMeetingForm");

                         // Loop over them and prevent submission
                         Array.prototype.slice.call(fsm)
                         .forEach(function (form) {
                            if (!form.checkValidity()) 
                            {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            else
                            {
                                $('#edit-schedule-meeting').addClass('off-btn').trigger('classChange');

                                var editMeetingId = $('#meetingIdScheduleEdit').val();
                                var editMeetingName = $('#meetingNameScheduleEdit').val();
                                var editMmeetingDate = $('#meetingDateScheduleEdit').val();
                                var editMmeetingStart = $('#meetingStartScheduleEdit').val();
                                var editMeetingEnd = $('#meetingEndScheduleEdit').val();

                                var dataForm = new URLSearchParams();
                                dataForm.append('meeting_name', editMeetingName);
                                dataForm.append('meeting_date', editMmeetingDate);
                                dataForm.append('meeting_start', editMmeetingStart);
                                dataForm.append('meeting_end', editMeetingEnd);

                                fetch("fetch/updateMeetingSchedule/"+editMeetingId+"", {
                                    method: 'post',
                                    credentials: "same-origin",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    body: dataForm,
                                })
                                .then(function(response){
                                    return response.json();
                                }).then(function(resultsJSON){
                
                                    var results = resultsJSON

                                    if(results.status == 'success'){

                                        fetch('/fetch/scheduleLog')
                                        .then(function(response) { 
                                            return response.json();
                                        }).then(function(data){
                                            
                                            updateScheduleLog(data);
                                        })
                                        .catch(function(err) {
                                            console.log('Error Schedule Log: ' + err);
                                        });

                                        $('#edit-schedule-meeting').removeClass('off-btn').trigger('classChange');

                                        menu('menu-edit-meeting', 'hide', 250);

                                        snackbar(results.status , results.message)

                                    }
                                    else{
                                        if(results.type == 'Validation Error')
                                        {
                                            $('#edit-schedule-meeting').removeClass('off-btn').trigger('classChange');

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

                                form.classList.add('was-validated');
                            }
                        });
                    }
                    else{
                        menu('menu-offline', 'show', 250);
                    }
                });
                ///////////////////////////////////////////////////////////////////////

                ///////////////////////////////////////////////////////////////////////
                //for delete meeting button
                $('#delete-schedule-meeting').on('click' , function(event){

                    if (navigator.onLine) {
                        var fsm = $("#deleteScheduleMeetingForm");

                         // Loop over them and prevent submission
                         Array.prototype.slice.call(fsm)
                         .forEach(function (form) {
                            if (!form.checkValidity()) 
                            {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            else
                            {
                                $('#delete-schedule-meeting').addClass('off-btn').trigger('classChange');

                                var editMeetingId = $('#meetingIdScheduleDelete').val();

                                var dataForm = new URLSearchParams();
                                dataForm.append('meeting_id', editMeetingId);

                                fetch("fetch/deleteMeetingSchedule/"+editMeetingId+"", {
                                    method: 'post',
                                    credentials: "same-origin",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    body: dataForm,
                                })
                                .then(function(response){
                                    return response.json();
                                }).then(function(resultsJSON){
                
                                    var results = resultsJSON

                                    if(results.status == 'success'){

                                        fetch('/fetch/scheduleLog')
                                        .then(function(response) { 
                                            return response.json();
                                        }).then(function(data){
                                            
                                            updateScheduleLog(data);
                                        })
                                        .catch(function(err) {
                                            console.log('Error Schedule Log: ' + err);
                                        });

                                        $('#delete-schedule-meeting').removeClass('off-btn').trigger('classChange');

                                        menu('menu-delete-meeting', 'hide', 250);

                                        snackbar(results.status , results.message)

                                    }
                                    else{
                                        if(results.type == 'Validation Error')
                                        {
                                            $('#delete-schedule-meeting').removeClass('off-btn').trigger('classChange');

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

                                form.classList.add('was-validated');
                            }
                        });
                    }
                    else{
                        menu('menu-offline', 'show', 250);
                    }
                });
                ///////////////////////////////////////////////////////////////////////

                
        }
        ///////////////////////////////////////////////////////////////////////

    }, 250);