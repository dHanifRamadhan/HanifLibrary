<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;

class reportController extends Controller
{
    public function download() {
        $data = DB::table('transactions AS a')
        ->select('a.*', 'b.name')
        ->leftJoin('users AS b', 'a.user_id', '=', 'b.id')
        ->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf = new Dompdf($options);
        $pdf->setPaper('A4', 'landscape');
        $html = view('reportPdf', compact('data'))->render();
        $pdf->loadHtml($html);
        $pdf->render();
        return $pdf->stream('laporanTransaction.pdf');
    }
}
