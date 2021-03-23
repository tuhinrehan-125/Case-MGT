<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UserCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $phone;
    private $name;
    private $sms;
    public function __construct($applicant_phone, $user_name,$msg)
    {
        $this->phone=$applicant_phone;
        $this->name=$user_name;
        $this->sms=$msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $queue_status = "renew_submission". time();
        $post_url = 'http://smsportal.pigeonhost.com/smsapi?' ;
        $post_values = array(
            'api_key' => '96e388c0b3b7fd874b48621e850335a8f06ca58d217e2f0508b7ccb5d4254d408a7d6f5d',
            'type' => 'text',  // unicode or text
            'senderid' => '8801552146120',
            'contacts' =>$this->phone,
            'msg' => 'Dear '.$this->name .' Your Application Rejected.below the issues '.$this->sms.'  please update your all information.  Dhaka Cantonment Board,Dhaka.',
            'method' => 'api'
        );
        $post_string = "";
        foreach( $post_values as $key => $value )
        { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        $post_string = rtrim( $post_string, "& " );
        $request = curl_init($post_url);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
        $post_response = curl_exec($request);
        curl_close ($request);
        $responses=array();
        $array =  json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $post_response), true );
//            Artisan::call('queue:work', ['database', '--once' => '--once', '--queue' => 'default',  '--tries' => 1]);
//            return redirect()->route('queue.work');


    }

}
