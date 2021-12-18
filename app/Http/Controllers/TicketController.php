<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Repositories\TicketsRepository;
use App\Http\Requests\EditTicketRequest;
use App\Http\Requests\FindTicketRequest;

class TicketController extends Controller
{
    public function __construct(TicketsRepository $ticket )
    {
        $this->Ticket = $ticket;

    }

    public function AddNewInfo(TicketRequest $request){
        $Ticket_bus=$this->Ticket->CreateNewTicket($request->all);

        return response()->json(['status'=>'success','message'=>"validation information added successfully"]);

    }

    public function EditOldInfo(EditTicketRequest $request,$id){
        $edit_bus=$this->Ticket->edit($request,$id);

        return response()->json(['status'=>'success','message'=>"validation information edited successfully"]);

    }

    public function ArchiveInformation($id){
        $archive = $this->Ticket->archive($id);
        return response()->json(['message'=>$archive]);
    }

    public function FindTicket(FindTicketRequest $request){
        $find=$this->Ticket->FindMatchTicket($request->all());
        return response()->json(['status'=>'success','message'=>"hi",'info we find'=>$find]);
    }
}
