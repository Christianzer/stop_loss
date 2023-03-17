<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortefeuilleControllers extends Controller
{
    //
    public function index(){
        $all_portefeuille = DB::table("portefeuilles")->where('ID_utilisateur', '=', 1)->select("*")->get();
        return view('portefeuille',compact('all_portefeuille'));
    }

    public function portefeuille_edit($id){
        $all_portefeuille = DB::table("portefeuilles")->where('ID_utilisateur', '=', 1)->select("*")->get();
        $portefeuille = DB::table("portefeuilles")->where('ID_portefeuille','=',$id)->select("*")->first();
        return view('portefeuille',compact('all_portefeuille','portefeuille'));
    }

    public function portefeuille_create(Request $request){
        $nom_portefeuille = $request->portefeuille;
        $devise = $request->devise;
        $solde = $request->solde;
        $insert = DB::table('portefeuilles')->insert([
            'ID_utilisateur' => 1,
            'Nom_portefeuille' => $nom_portefeuille,
            'Devise_base' => $devise,
            'Solde' => $solde
        ]);

        if ($insert){
            Session()->flash('success',"Enregistrement effectuée avec success.");
        }else{
            Session()->flash('error',"Erreur lors de l'enregistrement.");
        }

        return redirect()->back();
    }

    public function portefeuille_update($id,Request $request){
        $nom_portefeuille = $request->portefeuille;
        $devise = $request->devise;
        $solde = $request->solde;
        $insert = DB::table('portefeuilles')->where('ID_portefeuille','=',$id)
            ->update([
            'ID_utilisateur' => 1,
            'Nom_portefeuille' => $nom_portefeuille,
            'Devise_base' => $devise,
            'Solde' => $solde
        ]);
        if ($insert){
            Session()->flash('success',"Modification effectuée avec success.");
        }else{
            Session()->flash('error',"Erreur lors de la modification.");
        }

        return redirect()->back();
    }


    public function portefeuille_delete(Request $request){
        $cocher = $request->cocher;
        foreach ($cocher as $item){
            DB::table('portefeuilles')->where('ID_portefeuille',$item)
                ->delete();
        }
        Session()->flash('success',"Suppression effectuée avec success.");
        return redirect()->back();
    }

}
