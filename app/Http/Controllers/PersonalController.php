<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            'message' => 'Welcome to Data Covid-19 API',
            'title' => 'Final Project UTS - Pemrograman Backend',
            'author' => [
                'name' => 'Muhamad Sayib Roziq',
                'nim' => '0110221023',
                'group' => 'TI16',
                'email' => 'work.sayib@gmail.com',
                'github' => 'https://github.com/msayib',
                'instagram' => 'https://instagram.com/ibb.ac',
                'whatsapp' => 'https://wa.me/628978514938',
            ]
        ]);
    }
}
