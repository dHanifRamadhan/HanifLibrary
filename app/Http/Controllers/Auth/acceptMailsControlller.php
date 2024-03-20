<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\acceptEmailUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Services\Auth\acceptMailsServices;

class acceptMailsControlller extends Controller
{
    public function accept() {
        if (request()->has('ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa') != true) {
            return redirect()->route('dashboard')->with('error', (object)[
                'message' => 'Jangan mencoba mengakses url yang tidak di izinkan!'
            ]);
        }
        
        $services = new acceptMailsServices();
        $status = $services->accept(request()->input('ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa'));
        $message = null;
        $messageSts = 'error';

        switch ($status) {
            case 'already':
                $messageSts = 'success';
                $message = 'Email successfully verified please login';
                break;

            case 'accepted':
                $message = 'Email has been successfully registered no need to accept again!';
                break;

            case 'failed':
                return $this->failed(request()->input('ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa'));
                break;

            case 'error':
                $message = 'Please contact admin at +62 896-3807-0331!';
                break;
        }

        return redirect()->route('dashboard')->with($messageSts, (object)[
            'message' => $message
        ]);
    }

    public function failed($data) {
        return view('error.failed-accept-mail', ['data' => $data]);        
    }

    public function resendMail(Request $request) {
        $services = new acceptMailsServices();
        $data = $services->failed($request->ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa);

        Mail::to($data->email)->send(new acceptEmailUsers($data));
        return redirect()->route('dashboard')->with('success', (object)[
            'message' => 'please check your email for verification !',
        ]);
    }

    public function kirim() {
        $data = (object)[
            'id' => 1
        ];

        Mail::to('d.haniframadhan@gmail.com')->send(new acceptEmailUsers($data));
        dd('berhasil');
    }
}
