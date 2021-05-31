<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',Auth()->id())->get();
        // $users = User::all();
        return view('chat.index')->with(compact('users'));
    }

    //function to get the message.
    public function getMessage($user_id){

      $my_id = auth()->user()->id;
      //get unread message
      Chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

      //get the information of selected user
      $friendInfo = User::findOrFail($user_id);

      //getting all messages from selected user
      //getting those message which is from = auth()->id() and to=user_id or vice versa
      $chat_message = Chat::where(function ($query) use ($user_id, $my_id) {
          $query->where('from', $user_id)->where('to', $my_id);
      })->orWhere(function ($query) use ($user_id, $my_id) {
          $query->where('from', $my_id)->where('to', $user_id);
      })->get();
      //
      return view('chat.messages')->with(compact('chat_message','friendInfo'));
    }

    //function to send the message
    public function sendMessage(Request $request){
      $from = auth()->user()->id;
      $to = $request->receiver_id;
      $message = $request->message;

      $data = new Chat();
      $data->from = $from;
      $data->to = $to;
      $data->message = $message;
      $data->is_read = 0; // default is 0 which is unread
      $data->save();

      // pusher
        $options = array(
          'cluster' => 'ap1',
          'useTLS' => true
      );

      $pusher = new Pusher(
          env('PUSHER_APP_KEY'),
          env('PUSHER_APP_SECRET'),
          env('PUSHER_APP_ID'),
          $options
      );

      $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
      $pusher->trigger('my-channel', 'my-event', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $users = User::where('id','!=',Auth()->id())->get();
        $friendInfo = User::findOrFail($user_id);
        $myInfo = User::find(auth()->id());
        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['user_id'] = $user_id;
        // $topBarTitle = 'Chat Show';
        // $topBarPrevUrl = 'chat';
        return view('chat.show')->with($this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
