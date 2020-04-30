<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AndroidController extends Controller
{
    public function checkUserAnswers($userid){

    }


    public function getAnswer(Request $request){

        $answer = $request->all();

        $id_prezentacije = $request->id_prezentacije;
        $id_pitanja = intval($request->id_pitanja);
        $userID = $request->userid;
        $odg = $request->odg;


        //$userID = DB::table('presentation_users')->where('email', $email)->get();
        //$userID = $userID[0]->id;

        //dd($id_prezentacije, $id_pitanja, $userID, $odg);
        
        $allAnswers = DB::table('odgovori')->get();
        foreach($allAnswers as $answer){
            if($answer->id_prezentacije == $id_prezentacije && $answer->id_pitanja == $id_pitanja && $answer->id_korisnika == $userID){
                return \response()
                    ->json(["Message:" => "Već ste odgovorili na ovo pitanje", "Status_code"=> 500]);
            }
        }

        DB::table('odgovori')->insert(
            [
                "id_prezentacije" => $id_prezentacije,
                "id_pitanja" => $id_pitanja,
                "id_korisnika" => $userID,
                "odgovor" => $odg
            ]
            );

        return \response()
            ->json(["Message:" => "Vase odgovor je prihvacen", "Status_code"=> 200]);

    }

    public function checkForAnswers(Request $request){

        $i = 2;
        //$userid = DB::table('presentation_users')->where('email', $request->email)->get();

        if(DB::table('pitanja')->where('id_prezentacije', $request->id)->where('vidljivo', true)->pluck('odgovor3')[0] !=' ')
            $i = 3;
        if(DB::table('pitanja')->where('id_prezentacije', $request->id)->where('vidljivo', true)->pluck('odgovor4')[0] !=' ')
            $i = 4;
        

        $pitanja = DB::table('pitanja')->where('id_prezentacije', $request->id)->get();

        foreach($pitanja as $pitanje){
            if($pitanje->vidljivo == true){
                return \response()
                    ->json(["Vidljivo:" => 1, "id_pitanja"=>$pitanje->id, "presentatioNID"=>$request->id, "Pitanje"=>$pitanje->pitanje, "Broj_odgovora"=>$i]);
            }
        }

        return \response()
            ->json(["Vidljivo:" => 0, "id_pitanja" => 0, "presentatioNID"=>$request->id]);

    }

    public function registerUser(Request $request){

        $email = $request->email;
        $ime = $request->ime;
        $prezime = $request->prezime;

        try{
        DB::table('presentation_users')
            ->insert(
                [
                    'ime' => $ime,
                    'prezime' => $prezime,
                    'email' => $email,
                ]

            );
            return \response()
                ->json(["Message:" => "Uspijesno ste se registrovali.", "status-code" => 200]);

        }catch(\Illuminate\Database\QueryException $e){
            return \response()
                ->json(["Message:" => "Doslo je do pogreske, email je vec registrovan.", "status-code: " => 500]);

        }

        
    }

    public function joinPresentation(Request $request){

        $idPrezentacije = $request->id;
        $allPresentations = DB::table('prezentacije')->get();

        $i = 0;

        $presentationIDs = [];

        foreach($allPresentations as $presentacija){

            array_push($presentationIDs, $presentacija->gen_kod);

        }

        foreach($presentationIDs as $id){

            if($request->id == $id){

                $imeprezentacije = DB::table('prezentacije')->where('gen_kod', $id)->pluck('ime_prezentacije')[0];

                return \response()
                    ->json(["Message:" => "Pridruzili ste se prezentaciji ".$imeprezentacije, "StatusCode:" => 200, "presentatioNID" => $request->id]);
            }
        }

        return \response()
            ->json(["Message:" => "Prezentacija ne postoji", "StatusCode:" => 404]);

    }
}