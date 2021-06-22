<?php

namespace App\Http\Controllers;

use App\Mail\finish;
use App\Mail\SendCode;
use App\Models\Packet;
use App\Mail\recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colis_recu = Packet::select('*')->where('state',2)->where('created_at','>=',DATE('Y-m-d'))->get();
        $colis_en_cours = Packet::select('*')->where('state',1)->where('created_at','>=',DATE('Y-m-d'))->get();
        $colis_au_repos = Packet::select('*')->where('state',0)->where('created_at','>=',DATE('Y-m-d'))->get();
        $colis_total = Packet::select('*')->where('created_at','>=',DATE('Y-m-d'))->get();
        return view('admin',[
            'colis_recu' => $colis_recu->count(),
            'colis_en_cours' => $colis_en_cours->count(),
            'colis_au_repos' => $colis_au_repos->count(),
            'colis_total' => $colis_total->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerPacket');
    }

    // Generateur d'identifiant
    public static function genId() : int
    {
        $random = null;
        do {
            $random .= rand(1,9);
        } while(strlen($random)<10);
        return $random;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = [
            'title' => $request->title,
            'description' => $request->description,
            'sender' => $request->sender,
            'sender_mail' => $request->sender_mail,
            'recipient' => $request->recipient,
            'recipient_mail' => $request->recipient_mail,
            'weight' => $request->weight,
            'price' => $request->price,
            'depart_town' => $request->depart_town,
            'arrived_town' => $request->arrived_town,
        ];

        $table_key = ['title','description','sender','sender_mail','recipient','recipient_mail','weight',
        'price','depart_town','arrived_town'];

        $request->session()->put($table);

        $request->validate([
            'title' => 'required|string|max:255',
            'sender' => 'required|string',
            'sender_mail' => 'required|email',
            'recipient' => 'required|string',
            'recipient_mail' => 'required|email',
            'weight' => 'required',
            'price' => 'required',
            'depart_town' => 'required|string|max:255',
            'arrived_town' => 'required|string|max:255',
        ]);
        
        do {
            $id = self::genId();
        }while(DB::table('packets')->where('id',$id)->exists());

        $data = new Packet([
            'id' => $id,
            'title' => $request->title,
            'description' => $request->description,
            'state' => 0,
            'sender' => $request->sender,
            'sender_mail' => $request->sender_mail,
            'recipient' => $request->recipient,
            'recipient_mail' => $request->recipient_mail,
            'weight' => $request->weight,
            'price' => $request->price,
            'depart_town' => $request->depart_town,
            'arrived_town' => $request->arrived_town,
            'user_id' => Auth::user()->id,
        ]);

        $data->save();

        $request->session()->forget($table_key);

        Mail::to($request->sender_mail)->send(new SendCode($data));
        Mail::to($request->recipient_mail)->send(new recipient($data));

        return redirect()->back()->with('Sucess', 'Colis enregistré avec succès');
    }

    public function createPDF(){
        $colis = DB::table('packets')->orderBy('created_at','desc')->first();
        $customPaper = array(0,0,383.80,300.00);
        view()->share('colis',array($colis));
        return PDF::loadView('recu',array($colis))
                    ->setOptions(['defaultFont' => 'sans-serif'])
                    ->setPaper($customPaper, 'landscape')
                    ->setWarnings(false)
                    ->stream();
        //return $pdf->download('recu.pdf'); 
    }

    public function print($id){
        $colis = Packet::find($id);
        return view('details',compact('colis'));
    }

    public function printDefault(){
        $colis = Packet::select('*')->where('created_at','>=',DATE('Y-m-d'))->get();
        return view('print',compact('colis'));
    }

    public function printRecus(){
        $colis = Packet::select('*')->where('state',2)->where('created_at','>=',DATE('Y-m-d'))->get();
        return view('print',compact('colis'));
    }

    public function printCours(){
        $colis = Packet::select('*')->where('state',1)->where('created_at','>=',DATE('Y-m-d'))->get();
        return view('print',compact('colis'));
    }

    public function printGare(){
        $colis = Packet::select('*')->where('state',0)->where('created_at','>=',DATE('Y-m-d'))->get();
        return view('print',compact('colis'));
    }


    // public function logout(Request $request){

    //     $request->session()->forget('user_id');

    //     return redirect()->back();
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show(Request $request)
    {
        $colis = Packet::find($request->code);
        return view('tracking', compact('colis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Packet::find($id);
        $data->state = 2;
        $data->save();

        mail::to($data->sender_mail)->send(new finish($data));

        return redirect()->back()->with('Sucess','Vous venez de signifier à l\'expediteur que le colis a été bien reçu');
    }

    public function modifier($id)
    {
        $data = Packet::find($id);
        $data->state = 1;
        $data->save();

        return redirect()->back()->with('Sucess','Etat du Colis modifié, maintenant en route');
    }

    public function update($id)
    {
        $data = Packet::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->sender = $request->sender;
        $data->sender_mail = $request->sender_mail;
        $data->recipient = $request->recipient;
        $data->recipient_mail = $request->recipient_mail;
        $data->weight = $request->weight;
        $data->depart_town = $request->depart_town;
        $data->arrived_town = $request->arrived_town;
        $data->save();

        return redirect()->back()->with('Sucess','Modification reussie');
    }

    public function delete($id){
        DB::table('packets')->delete($id);
        return redirect()->back()->with('Sucess', 'Colis supprimé avec succès');
    }
}
