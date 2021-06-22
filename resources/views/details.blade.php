@extends('layouts.core')

@section('content')

<div class="md panel panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Detais du colis
			<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body">
            <div class="col-sm-3 col-xs-12 col-md-3">
                <div class="panel-container">
                    <img src="{{asset('assets/image/block/colis.jpg')}}" width="70%" height="100%">
                    <center>
                    <div class="card-body">
                        <h5 class="card-title">{{ $colis->title }}</h5>
                        <p class="card-text">{{ $colis->description }}</p>
                    </div>
                    </center>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-md-3">
                <div class="panel-container" style="width: 20rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Code du produit : <a href="#" class="card-link">{{ $colis->id }}</a></li>
                        <li class="list-group-item">{{ $colis->created_at->diffForHumans() }}</li>
                        <li class="list-group-item">Poids : <a href="#" class="card-link">{{ $colis->weight }} kg</a></li>
                        <li class="list-group-item">Prix : <a href="#" class="card-link">{{ $colis->price }} fcfa</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-md-3">
                <div class="panel-container" style="width: 20rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Expedié par <a href="#" class="card-link">{{ $colis->sender }} </a>({{ $colis->sender_mail }})</li>
                        <li class="list-group-item">à <a href="#" class="card-link">{{ $colis->recipient }}</a> ({{ $colis->recipient_mail }}) </li>
                        <li class="list-group-item">
                        Statut du colis : 
                        <a href="#" class="card-link">
                            @if($colis->state == 0)
                                A la gare
                            @elseif($colis->state == 1)
                                En route
                            @else
                                Arrivé à destination
                            @endif
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-md-3">
                <div class="panel-container" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Ville de Depart  : <a href="#" class="card-link"> {{ $colis->depart_town }} </a></li>
                        <li class="list-group-item">Ville de D'arrivé  : <a href="#" class="card-link"> {{ $colis->arrived_town }} </a></li>
                    </ul>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection