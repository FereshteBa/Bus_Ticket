<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function getinfoPDF(){

    }
    public function generatePDF()
    {

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf =PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
