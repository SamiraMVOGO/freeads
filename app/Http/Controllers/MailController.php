<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TestEmail;


class MailController extends Controller
{
    /**
     * 
     * @return response()
     */

    public function index() {
        // $data = [
        //     "title" =>"This is testing",
        //     "order_no"=> 123,
        //     "user" => "John"
        // ];
        // Mail::to("mvosamira@gmail.com")->send(new TestEmail($data));
        // dd("mail sent");
    }
}
