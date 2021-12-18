<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketsRepository
{
    public function CreateNewTicket($data){
        return Ticket::create([
            'license_plate' => $data['license_plate'] ,
            'passenger' => $data['passenger'] ,
            'final_destination' => $data['final_destination'] ,
            'secondary_destination' => $data['secondary_destination'] ,
            'destination_terminal' => $data['license_plate'] ,
            'origin' => $data['origin'] ,
            'origin_terminal' => $data['origin_terminal'] ,
            'type' => $data['type'] ,
            'info' => $data['info'] ,

        ]);
    }
    public function edit($data,$id){
        return Ticket::where('id', $id)->update([
            'license_plate' => $data['license_plate'] ,
            'passenger' => $data['passenger'] ,
            'final_destination' => $data['final_destination'] ,
            'secondary_destination' => $data['secondary_destination'] ,
            'destination_terminal' => $data['license_plate'] ,
            'origin' => $data['origin'] ,
            'origin_terminal' => $data['origin_terminal'] ,
            'type' => $data['type'] ,
            'info' => $data['info'] ,
        ]);
    }
    public function archive($id){
        $archive =Ticket::find($id);
        if ($archive) {
            $archive->delete();
            return $message = " information deleted successfully";
        }
        return $message = "no found";


    }
    public function FindMatchTicket(array $data){
        $match = [
            'origin' => $data['origin'],
            'destination' => $data['destination']
        ];
        return DB::table('tickets')
        ->where($match)
        ->whereDate('time', $data['time'])
        ->orderByDesc($data['filter'])
        ->get();
    }
    public function getwithID($id,$item){
        return Ticket::where('id', $id)
          ->select($item)
        //   ->with('user')
          ->get();

    }

}
