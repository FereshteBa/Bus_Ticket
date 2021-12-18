<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;
use App\Models\Ticket;
use App\Repositories\ReservationsRepository;
use App\Repositories\TicketsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public $reserve;
    public function __construct(ReservationsRepository $reserve ,TicketsRepository $ticket)
    {
        $this->Reserve=$reserve;
        $this->Ticket=$ticket;

    }
    public function detailsReservations ($ticketgender){
        $details=$this->Reserve->GetGenderWithID($ticketgender);
        $passenger=$this->Ticket->getwithID($ticketgender,'passenger');
        return response()->json(['info'=>$details,'passenger'=>$passenger]);

    }
    public function factorreserve(ReserveRequest $request , $tiket_id){
        $userinfo= Auth::user();
        dd('kchsgjkhb');
        $cost=$this->Reserve->GetCost($tiket_id);

        $addreserve=$this->Reserve->ReservationTicket($request,$tiket_id,$userinfo,$cost);
        // $reservefactor=$this->Reserve->ToTalCost($userinfo->id,);

        return response()->json(['info'=>'reserve succsesful']);


    }
    public function makefactor(){
        $userinfo= Auth::user();


    }
}
