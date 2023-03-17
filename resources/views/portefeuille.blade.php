@extends('layout')

@section('contenu')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-uppercase font-weight-bold">PORTEFEUILLE</h1>
    </div>


    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-uppercase text-primary">Informations générales portefeuille</h5>
            </div>
            <div class="container-fluid mt-3">
                <div class="row ">
                    <!-- ue -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="etablissementId" class="font-weight-bold text-uppercase">Nom portefeuille</label>
                            <input class="form-control" type="text" name="portefeuille" required value="">

                        </div>

                    </div>


                    <!-- ecue -->


                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group" id="content_date">
                            <label for="content_date" class="font-weight-bold text-uppercase">Devise</label>
                            <input class="form-control" type="text" name="devise" required value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="content_date">
                            <label for="content_date" class="font-weight-bold text-uppercase">Solde</label>
                            <input class="form-control" type="number" name="solde" value="">
                        </div>
                    </div>
                </div>





                <div align="right">
                    <a href="{{route('portefeuille')}}" class="btn btn-success">Retour</a>
                    <button  class="btn btn-info" type="reset">Annuler</button>
                    <button id="demande_enregistrer" class="btn btn-primary" type="submit">{{isset($portefeuille) ? 'Modifier' : 'Enregistrer'}}</button>
                </div>
                <br>
            </div>
        </div>


    </form>

    <form method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-uppercase text-primary">Listes des portefeuilles</h5>
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered w-100" style="font-size: 16px">
                    <thead>
                    <tr class="bg-indigo text-black-50 w-100 text-uppercase font-weight-bold">
                        <th></th>
                        <th>Nom portefeuille</th>
                        <th>Devise</th>
                        <th>Solde</th>

                    </tr>

                    </thead>


                    <tbody class="text-black text-uppercase font-weight-bold">
                    <tr>
                        <td align="center"><input type="checkbox" id="cocher[]" name="cocher[]"
                                                  value=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

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
