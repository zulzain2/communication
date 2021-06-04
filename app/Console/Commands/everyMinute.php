<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Scheduler;
use App\Models\MeetingLog;
use App\Models\Notification;
use Illuminate\Console\Command;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To check for new notification every minute.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schedulers = Scheduler::where('is_triggered' , '=' , 0)->where('trigger_datetime' , '<=' , date('Y-m-d H:i:s'))->get();

        foreach ($schedulers as $key => $scheduler) {
            if($scheduler->url_to_call == "triggeredNotification")
            {
                $params = json_decode($scheduler->params);

                //Noti Kick In
                $noti = New Notification;
                $noti->to_user = $params->to_user;
                $noti->tiny_img_url = $params->tiny_img_url;
                $noti->title = $params->title;
                $noti->desc =  $params->desc;
                $noti->type = $params->type;
                $noti->click_url = $params->click_url;
                $noti->send_status = $params->send_status;
                $noti->status = '';
                $noti->created_by = $params->created_by;
                $noti->id_module = $params->id_module;
                $noti->module = $params->module;
    
                //FCM Kick In
                $user = User::find($noti->to_user);
                if($user)
                {
                    foreach ($user->userdevices as $key => $device) {
                        $noti->notificationFCM($device->fcm_token , $noti->title , $noti->desc , null , $noti->click_url , $noti->id_module , $noti->module);
                    }
                    
                }

                if($noti->module == 'meet'){
                    $meetinglog = MeetingLog::find($params->id_module);
                    $meetinglog->status = 'S';
                    $meetinglog->save();
                }
                

                $noti->save();

                $scheduler->is_triggered = 1;
                $scheduler->save();
                

                echo "Operation Done";
            }
        }
    }
}
