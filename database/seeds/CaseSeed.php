<?php

use Illuminate\Database\Seeder;

use App\User;
use App\casereg_model;

class CaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=20000;$i++){
            $case=new casereg_model();
            $case->id_mp='4';
            $case->case_no=$i;
            $case->victim_name='NH Rasal-'.$i;
            $case->victim_mb='01853195548';
            $case->vehical_reg='ha-5050'.$i;
            $case->date_off='15-04-2020';
            $case->time_off='10:55';
            $case->date_disposal='15-05-2020';
            $case->loc='L-3';
            $case->victim='driver';
            $case->vehical_type='Car';
            $case->crime_type='["Traffic signal violation","Careless driving"]';
            $case->paper='["Route Permit"]';
            // $case->paper_number='1';
            $case->unit_id='1';
            $case->user_id='1';
            $case->save();
            $userData=new User();
            $userData->vehicle_number=$case->vehical_reg;
            $userData->password=Hash::make('12345678');
            $userData->save();
        }


    }
}
