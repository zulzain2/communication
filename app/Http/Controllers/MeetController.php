<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scheduler;
use App\Models\MeetingLog;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('index' , 'indexpublic' , 'storeMeetingNotStart' , 'storeMeetingInProgress' , 'storeMeetingPass');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topBarTitle = 'Meet';

        // $meetinglogs = MeetingLog::where([
		// 	['id_users', '=' , auth()->user()->id]
		// ])->orderByDesc('datetime')->get();

        return view('meet.index')->with(compact('topBarTitle'));
    }

    public function indexpublic()
    {
        return view('meet.public.index');
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
    public function show($id)
    {
        //
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

    public function meetingLog()
    {
       
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id],
            ['status', '=' , 'P']
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function scheduleLog()
    {
        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user()->id],
            ['status', '=' , 'S']
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function scheduleLogSpecific($id)
    {
        $meetinglog = MeetingLog::find($id);

        return json_encode($meetinglog);
    }

    public function storeMeetingNotStart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_name' 	=> 'required',
            'display_name' 		=> 'required',
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $add = New MeetingLog;
        $add->id_users = auth()->user() ? auth()->user()->id : 0;
        $add->room_name = $request->room_name;
        $add->display_name = $request->display_name;
        $add->datetime = date('Y-m-d H:i:s');
        $add->status = 'N';
        $add->save();

        $data = [
            'status' => 'success', 
            'message' => 'Successfully start a meeting.',
            'data' => $add,
        ];
        return json_encode($data);
    }

    public function storeMeetingInProgress(Request $request)
    {
        $request->validate([
            'id_meetinglog' 	=> 'required',
            'display_name' 		=> 'required',
            'datetime' 			=> 'required',
        ]);

        $update = MeetingLog::find($request->id_meetinglog);
        // $update->id_users = auth()->user() ? auth()->user()->id : 0;
        // $update->display_name = $request->display_name;
        $update->datetime = date('Y-m-d H:i:s' , strtotime($request->datetime));
        $update->status = 'I';
        $update->save();

        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user() ? auth()->user()->id : 0]
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function storeMeetingPass(Request $request)
    {
        $request->validate([
            'id_meetinglog' 	=> 'required',
            'end_datetime' 			=> 'required',
        ]);

        $update = MeetingLog::find($request->id_meetinglog);
        // $update->id_users = auth()->user() ? auth()->user()->id : 0;
        $update->end_datetime = date('Y-m-d H:i:s' , strtotime($request->end_datetime));
        $update->status = 'P';
        $update->save();

        $meetinglog = MeetingLog::where([
			['id_users', '=' , auth()->user() ? auth()->user()->id : 0]
		])->orderByDesc('datetime')->get();

        return json_encode($meetinglog);
    }

    public function storeMeetingSchedule(Request $request){
        $request->validate([
            'meeting_name' 	    => 'required',
            'meeting_date' 		=> 'required',
            'meeting_start' 	=> 'required',
            'meeting_end' 		=> 'required'
        ]);

        $add1 = New MeetingLog;
        $add1->id_users = auth()->user()->id;
        $add1->room_name = $request->meeting_name;
        $add1->display_name = auth()->user()->name;
        $add1->datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_start.''));
        $add1->end_datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_end.''));
        $add1->status = 'S';
        $add1->save();


        if((strtotime(''.$request->meeting_date.' '.$request->meeting_start.'') - strtotime(date('Y-m-d H:i:s'))) > (1 * 30 * 60))
        {
            //NOTIFICATION FCM SCHEDULE
            $noti = new Notification;
            $noti->to_user =  auth()->user()->id;
            $noti->tiny_img_url = '';
            $noti->title = 'Meeting ['.$request->meeting_name.']';
            $noti->desc =  ''.$request->meeting_name.' - You have meeting scheduled on '.date('j F Y' , strtotime($request->meeting_date)).' at '.date('g:i a' , strtotime($request->meeting_start)).' and will end on '.date('g:i a' , strtotime($request->meeting_end)).'';
            $noti->type = 'I';
            $noti->click_url = '/meet?roomName='.$request->meeting_name.'';
            $noti->send_status = 'S';
            $noti->status = '';
            $noti->module = 'meet';
            $noti->id_module = $add1->id;
            $noti->created_by = auth()->user()->id;
            $json_noti = json_encode($noti);

            $add2 = New Scheduler;
            $add2->trigger_datetime = date('Y-m-d H:i:s' , (strtotime(''.$request->meeting_date.' '.$request->meeting_start.'') - (1 * 30 * 60)));
            $add2->url_to_call = 'triggeredNotification';
            $add2->params = $json_noti;
            $add2->is_triggered = 0;
            $add2->module = 'meet';
            $add2->id_module = $add1->id;
            $add2->created_by = auth()->user()->id;
            $add2->save();
        }

        $data = ['status' => 'success', 'message' => 'Successfully scheduled meeting.' , 'data' => $add1];
        return json_encode($data);
    }

    public function updateMeetingSchedule(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'meeting_name' 	    => 'required',
            'meeting_date' 		=> 'required',
            'meeting_start' 	=> 'required',
            'meeting_end' 		=> 'required'
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $meetinglog = MeetingLog::find($id);
        $meetinglog->room_name = $request->meeting_name;
        $meetinglog->display_name = auth()->user()->name;
        $meetinglog->datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_start.''));
        $meetinglog->end_datetime = date('Y-m-d H:i:s' , strtotime(''.$request->meeting_date.' '.$request->meeting_end.''));
        $meetinglog->status = 'S';
        $meetinglog->save();

        if($meetinglog->scheduler){
            if((strtotime(''.$request->meeting_date.' '.$request->meeting_start.'') - strtotime(date('Y-m-d H:i:s'))) > (1 * 30 * 60))
            {
                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user =  auth()->user()->id;
                $noti->tiny_img_url = '';
                $noti->title = 'Meeting ['.$request->meeting_name.']';
                $noti->desc =  ''.$request->meeting_name.' - You have meeting scheduled on '.date('j F Y' , strtotime($request->meeting_date)).' at '.date('g:i a' , strtotime($request->meeting_start)).' and will end on '.date('g:i a' , strtotime($request->meeting_end)).'';
                $noti->type = 'I';
                $noti->click_url = '/meet?roomName='.$request->meeting_name.'';
                $noti->send_status = 'S';
                $noti->status = '';
                $noti->module = 'meet';
                $noti->id_module = $meetinglog->scheduler->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);
    
                $meetinglog->scheduler->trigger_datetime = date('Y-m-d H:i:s' , (strtotime(''.$request->meeting_date.' '.$request->meeting_start.'') - (1 * 30 * 60)));
                $meetinglog->scheduler->url_to_call = 'triggeredNotification';
                $meetinglog->scheduler->params = $json_noti;
                $meetinglog->scheduler->is_triggered = 0;
                $meetinglog->scheduler->module = 'meet';
                $meetinglog->scheduler->id_module = $meetinglog->scheduler->id;
                $meetinglog->scheduler->created_by = auth()->user()->id;
                $meetinglog->scheduler->save();
            }
        }

        $data = [
            'status' => 'success', 
            'message' => 'Successfully update schedule meeting.'
        ];
        return json_encode($data);
        
    }

    public function deleteMeetingSchedule(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'meeting_id' 	    => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

            $meetinglog = MeetingLog::find($id);
            $meetinglog->delete();

            $data = [
                'status' => 'success', 
                'message' => 'Successfully delete schedule meeting.'
            ];
            return json_encode($data);
        
    }

    public function getScheduleMeeting(Request $request){
        $validator = Validator::make($request->all(), [
            'meeting_id' 	    => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $meetinglog = MeetingLog::find($request->meeting_id);

        if(date("Y-m-d H:i:s", (strtotime($meetinglog->datetime) - 10 * 60))  > date('Y-m-d H:i:s'))
        {
            $data = [
                'status' => 'error', 
                'message' => 'Meeting only can be start 10 minutes early, please come back later.',
            ];
            return json_encode($data);
        }

        $data = [
            'status' => 'success', 
            'message' => 'Successfully start schedule meeting.',
            'data' => $meetinglog
        ];
    
        return json_encode($data);
    }

    public function getMeetingInProgress(Request $request){
        $validator = Validator::make($request->all(), [
            'id_meeting' 	    => 'required',
        ]);

        if($validator->fails()){ 
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
        }

        $meetinglog = MeetingLog::find($request->id_meeting);

        if($meetinglog)
        {
            if($meetinglog->status == 'S' || $meetinglog->status == 'N')
            {
                $data = [
                    'status' => 'error', 
                    'message' => 'The meeting not started yet, please check again later.',
                ];
                return json_encode($data);
            }
            else if($meetinglog->status == 'P')
            {
                $data = [
                    'status' => 'error', 
                    'message' => 'Cannot join. The meeting has passed.',
                ];
                return json_encode($data);
            }
            else
            {
                $data = [
                    'status' => 'success', 
                    'message' => 'Successfully join meeting.',
                    'data' => $meetinglog
                ];
            
                return json_encode($data);
            }
        }
        else{
            $data = [
                'status' => 'error', 
                'message' => 'Meeting ID not exist.',
            ];
            return json_encode($data);
        }
        
    }
}
