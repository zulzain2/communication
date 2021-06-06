@extends('layouts.app')

@section('content')
  <div class="header header-fixed header-logo-center">
    <a href="" class="header-title">
      <span class="name-image bg-highlight">
        {{ substr($friendInfo->name, 0, 1) }}
      </span>
      {{ $friendInfo->name }}
    </a>
    <a href="/chat" data-back-button="" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
    <a href="#" data-toggle-theme="" class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
  </div>
  <div class="content" style="height:83vh;overflow-y: scroll;" id="context">
    <ul class="no-bullet" style="margin-top: 5%;">
      @foreach ($chat_message as $message)
        <li class="clearfix">
          {{-- if message from id is equal to auth id then it is sent by logged in user --}}
          <div
            class="{{ $message->from == Auth::id() ? 'speech-bubble speech-left bg-highlight' : 'speech-bubble speech-right color-black' }}">
            {{ $message->message }}
            <br>
            <small>{{ date('h:i a', strtotime($message->created_at)) }}</small>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@endsection

@section('content2')
  <div id="footer-bar" class="d-flex">
    <form id="message_form" class="form-control" autocomplete="off">
      <table>
        <tr>
          <td width="2%">
            <div class="me-3 speach-icon margin-negative">
              <a href="#" data-menu="menu-upload" class="bg-gray-dark ms-2"><i class="fa fa-plus pt-2"></i></a>
            </div>
         </td>
          <td width="96%">
            <div class="speach-input">
              <input name="message" type="text" id="myInput" class="form-control" placeholder="Enter your Message here">
            </div>
         </td>
          <td width="2%">
            <div class="ms-3 speach-icon margin-negative" id="submit">
              <a href="#" id="submitButton" class="bg-blue-dark me-2"><i class="fa fa-arrow-up pt-2"></i></a>
            </div>
          </td>
        </tr>
      </table>
    </form>
  </div>

  <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255"
    data-menu-effect="menu-over">
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
      <a href="#">
        <i class="font-14 fa fa-map-marker color-gray-dark"></i>
        <span class="font-13">Location</span>
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>
@endsection



@push('scripts')
  <script>
    let ip_address = '127.0.0.1';
    let socket_port = '3000';
    let socket = io(ip_address + ':' + socket_port);

    var receiver_id = "{{ $friendInfo->id }}";
    var my_id = "{{ Auth()->id() }}";

    $(document).ready(function() {
      initiateChat();
      scrollToBottomFunc();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      const sendMessageForm = $('form#message_form');
      // untuk send message ke org lain guna button submit
      $('#submitButton').click((e) => {
        e.preventDefault()
        sendMessageForm.submit()
      })
      const socketSendMessage = ({
        message
      }) => {
        socket.emit('send_message', {
          my_id,
          receiver_id,
          message
        })
      }

      sendMessageForm.submit(e => {
        e.preventDefault();
        const messageContainer = $(e.target.message)
        var message = messageContainer.val()
        var datastr = "receiver_id=" + receiver_id + "&message=" + message;
        if (message != '' && receiver_id != '') {
          messageContainer.val('');
          //go to send message untuk save data ke db
          sendMessage(datastr);
          socketSendMessage({
            message
          })
          appendMessage(message)
        }
      })

      const appendMessage = (message, sender = true) => {
        $('#context').append
        (`
          <ul class="no-bullet">
              <li class="clearfix">
                  {{-- if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="speech-bubble ${sender ? 'speech-left bg-highlight' :'speech-right color-black'} " >
                      ${message}
                      <br>
                    <small>{{ date('h:i a', strtotime($message->created_at)) }}</small>
                </div>
              </li>
          </ul>
        `)
      }

      socket.on('receive_message', (message) => {
        appendMessage(message, false)
      })
    })

    function sendMessage(datastr) {
      $.ajax({
        type: 'post',
        url: '/message',
        data: datastr,
        cache: false,
        success: function(data) {

        },
        error: function(jqXHR, status, err) {},
        complete: function(data) {
          console.log(data);
          scrollToBottomFunc();
        }
      })
    }

    function scrollToBottomFunc() {
      $('#context').animate({
        scrollTop: $('#context').get(0).scrollHeight
      }, 0);
    }

    socket.on('connected', msg => {
      console.log({
        msg
      })
    })

    function initiateChat() {
      socket.emit('connect_chat', {
        user_id: my_id,
        receiver: receiver_id,
      });
    }

  </script>


@endpush
