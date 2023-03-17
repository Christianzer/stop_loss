@extends('layout')

@section('contenu')
    <!-- Page Heading -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase">STOP LOSS</li>
            <li class="breadcrumb-item text-uppercase">POSITION</li>
            <li class="breadcrumb-item active text-uppercase text-primary" aria-current="page">{{isset($position) ? 'Modifier POSITION' : 'Ajouter POSITION'}}</li>
        </ol>
    </nav>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{isset($position) ? route("position.update",$position->ID_position) : route("position.create")}}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-uppercase text-primary">Informations générales positions</h6>
            </div>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-uppercase">Portefeuille</label>
                        <select class="form-control font-weight-bold text-uppercase" name="portefeuille">
                            @foreach($portefeuilles as $key => $item)
                                @if(isset($position))
                                    @if($key == $position->ID_portefeuille)
                                        <option value="{{$key}}" selected>{{ $item }}</option>
                                    @else
                                        <option value="{{$key}}">{{ $item }}</option>
                                    @endif
                                @else
                                    <option value="{{$key}}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-uppercase">Type position</label>
                        <select class="form-control font-weight-bold text-uppercase" name="type_position">
                            @foreach($type_positions as $key => $type_position)
                                @if(isset($position))
                                    @if($key == $position->Type_position)
                                        <option value="{{$key}}" selected>{{ $type_position }}</option>
                                    @else
                                        <option value="{{$key}}">{{ $type_position }}</option>
                                    @endif
                                @else
                                    <option value="{{$key}}">{{ $type_position }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold text-uppercase">Libelle Position</label>
                        <input type="text" class="form-control font-weight-bold text-uppercase" name="libelle_position" value="{{isset($position) ? $position->libelle_position : ''}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold text-uppercase" for="symbole">Symbole</label>
                        <input type="text" class="form-control font-weight-bold text-uppercase" id="symbole" name="symbole"  value="{{isset($position) ? $position->Symbole : ''}}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold text-uppercase" for="quantite">Quantité</label>
                        <input type="number" class="form-control font-weight-bold text-uppercase" id="quantite" name="quantite"  value="{{isset($position) ? $position->Quantite : ''}}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold text-uppercase" for="prix_achat">Prix</label>
                        <input type="number" step="any" class="form-control font-weight-bold text-uppercase" id="prix_achat" name="prix_achat"  value="{{isset($position) ? $position->Prix : ''}}" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold text-uppercase" for="stop_loss">Stop loss</label>
                        <input type="number" step="any" class="form-control font-weight-bold text-uppercase" id="stop_loss" name="stop_loss"  value="{{isset($position) ? $position->Stop_loss : ''}}" >
                    </div>
                    <div class="form-group col-md-2">
                        <label class="font-weight-bold text-uppercase" for="stop_loss">Take profit</label>
                        <input type="number" step="any" class="form-control font-weight-bold text-uppercase" id="Take_profit" name="take_profit"  value="{{isset($position) ? $position->Take_profit : ''}}" >
                    </div>

                </div>







                <div align="right">
                    <a href="{{route('position')}}" class="btn btn-danger text-uppercase">Retour</a>
                    <button  class="btn btn-warning text-uppercase" type="reset">Annuler</button>
                    <button id="demande_enregistrer" class="btn btn-primary text-uppercase"  type="submit">{{isset($position) ? 'Modifier' : 'Enregistrer'}}</button>
                </div>
                <br>
            </div>
        </div>


    </form>

    <form method="post" action="{{route('position.delete')}}">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-uppercase text-primary">Listes des portefeuilles</h5>
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered w-100" style="font-size: 16px">
                    <thead>
                    <tr class="bg-indigo text-black-50 w-100 text-uppercase font-weight-bold">
                        <th></th>

                        <th>Position</th>
                        <th>Type Position</th>
                        <th>Symbole</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Stop loss</th>
                        <th>Take profit</th>
                        <th>Portefeuille</th>

                    </tr>

                    </thead>


                    <tbody class="text-black text-uppercase font-weight-bold">
                    @foreach($all_positions as $item)
                        <tr>
                            <td align="center"><input type="checkbox" id="cocher[]" required name="cocher[]"
                                                      value="{{$item->ID_position}}"></td>
                            <td><a href="{{route('position.modifier',$item->ID_position)}}">
                                    {{$item->libelle_position}}
                                </a></td>
                            <td>{{$item->libelle_type_position}}</td>
                            <td>{{$item->Symbole}}</td>
                            <td class="text-right">{{number_format($item->Quantite,'0','.',' ')}}</td>
                            <td class="text-right">{{number_format($item->Prix,'0','.',' ')}}</td>
                            <td class="text-right">{{number_format($item->Stop_loss,'0','.',' ')}}</td>
                            <td class="text-right">{{number_format($item->Take_profit,'0','.',' ')}}</td>
                            <td>{{$item->Nom_portefeuille}}</td>
                        </tr>


                    @endforeach

                    </tbody>
                </table>

                <div align="right"><a class="btn btn-danger" href="#" data-toggle="modal" data-target="#DeleteEvaluationModal"
                                      style="margin: 20px;"><i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i> Supprimer la sélection</a>
                </div>

            </div>



        </div>


        <div class="modal fade" id="DeleteEvaluationModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment supprimer la sélection
                            ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Cliquez sur le bouton "Supprimer" ci-dessous si vous voulez supprimer les
                        éléments sélectionnés.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <!--<a class="btn btn-primary" href="index.php?page=aj_etab&amp;act=save">Enregistrer</a>-->
                        <button type="submit" class="btn btn-danger" name="supprimer"><i
                                class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>


@endsection
