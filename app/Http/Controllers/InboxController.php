<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Inbox;
use App\User;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $emails=Inbox::where('destinatario','=',Auth::user()->email)
           ->orderBy('created_at', 'desc')
            ->get();


        return view('Email.index',compact('emails'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Email.create-email');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'destinatario' => 'required',
            'assunto' => 'required|max:255|min:3',
            'corpo' => 'required|min:5|max:255',

        ]);
        $email= new Inbox(array (
            "destinatario" => $request->get("destinatario"),
            "assunto"=> $request->get("assunto"),
            "corpo"=> $request->get("corpo"),
             "user_id" =>Auth::user()->id));
        $email->save();
        return redirect()->to('/home')
            ->with('success','Email enviado com Sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email=User::find($id);
      return view('Email.create-email',compact('email'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
