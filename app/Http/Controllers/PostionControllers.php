<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostionControllers extends Controller
{
    //
    public function index(){
        $all_positions = DB::table("positions")
            ->join('type_position','type_position.id_type_position','=','positions.Type_position')
            ->join('portefeuilles','portefeuilles.ID_portefeuille','=','positions.ID_portefeuille')
            ->select("*")->get();
        $portefeuilles = DB::table('portefeuilles')->where('ID_utilisateur', '=', 1)->orderBy("ID_portefeuille", "ASC")->pluck("Nom_portefeuille","ID_portefeuille");
        $type_positions = DB::table('type_position')->orderBy("id_type_position", "ASC")->pluck("libelle_type_position","id_type_position");
        return view('position',compact('all_positions','portefeuilles','type_positions'));
    }

    public function position_edit($id){
        $all_positions = DB::table("positions")
            ->join('type_position','type_position.id_type_position','=','positions.Type_position')
            ->join('portefeuilles','portefeuilles.ID_portefeuille','=','positions.ID_portefeuille')
            ->select("*")->get();
        $portefeuilles = DB::table('portefeuilles')->where('ID_utilisateur', '=', 1)->orderBy("ID_portefeuille", "ASC")->pluck("Nom_portefeuille","ID_portefeuille");
        $type_positions = DB::table('type_position')->orderBy("id_type_position", "ASC")->pluck("libelle_type_position","id_type_position");
        $position = DB::table("positions")->where('ID_position','=',$id)->select("*")->first();
        return view('position',compact('all_positions','portefeuilles','type_positions','position'));
    }

    public function position_create(Request $request){
        $data = array(
            "ID_portefeuille"=>$request->portefeuille,
            "libelle_position"=>$request->libelle_position,
            "Symbole"=>$request->symbole,
            "Quantite"=>$request->quantite,
            "Type_position"=>$request->type_position,
            "Prix"=>$request->prix_achat,
            "Stop_loss"=>$request->stop_loss,
            "Take_profit"=>$request->take_profit,
        );
        $insert = DB::table('positions')->insert($data);

        if ($insert){
            Session()->flash('success',"Enregistrement effectuée avec success.");
        }else{
            Session()->flash('error',"Erreur lors de l'enregistrement.");
        }

        return redirect()->back();
    }

    public function position_update($id,Request $request){
        $data = array(
            "ID_portefeuille"=>$request->portefeuille,
            "libelle_position"=>$request->libelle_position,
            "Symbole"=>$request->symbole,
            "Quantite"=>$request->quantite,
            "Type_position"=>$request->type_position,
            "Prix"=>$request->prix_achat,
            "Stop_loss"=>$request->stop_loss,
            "Take_profit"=>$request->take_profit,
        );
        $insert = DB::table('positions')
            ->where('ID_position','=',$id)
            ->update($data);
        if ($insert){
            Session()->flash('success',"Modification effectuée avec success.");
        }else{
            Session()->flash('error',"Erreur lors de la modification.");
        }

        return redirect()->back();
    }


    public function position_delete(Request $request){
        $cocher = $request->cocher;
        foreach ($cocher as $item){
            DB::table('positions')
                ->where('ID_position','=',$item)
                ->delete();
        }
        Session()->flash('success',"Suppression effectuée avec success.");
        return redirect()->back();
    }
}
