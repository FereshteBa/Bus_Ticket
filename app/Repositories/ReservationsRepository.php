<?php

 namespace App\Repositories;

use App\Models\Price;
use App\Models\Reserve;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class ReservationsRepository
 {
    public function GetGenderWithID($id){

        return DB::table('reserves')->where('ticket_id',$id)->select( 'Seatـnumber1','Seatـnumber2','Seatـnumber3','gender')->get();

    }
    public function GetCost($ticket_id){
        // $reserve= Reserve::find($id);
        $ticket=Ticket::where('id',$ticket_id)->first();
        return DB::table('prices')
        ->where('type',$ticket->type)
        ->where('origin',$ticket->origin)
        ->where('destination',$ticket->final_destination)->get();

    }
    public function ReservationTicket($data,$id,$user,$cost){
        $seat=array();
        $seat=explode(" ",$data['seat']);
        return Reserve::create ([
            'national_code'=>$data['national_code'],
            'Seatـnumber1'=>$seat[0],
            'Seatـnumber1'=>$seat[1],
            'Seatـnumber1'=>$seat[2],
            'gender'=>$data['gender'],
            'Total'=>(count($seat)* $cost),
            'user_id'=>$user->id,
            'ticket_id'=>$id



        ]);

    }
 }
