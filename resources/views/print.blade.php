@extends('layouts.core')

@section('content')

<div class="md panel panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Consulter les colis
			<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body">
            @forelse($colis as $one)
            <div class="col-sm-3 col-xs-6">
                <div class="panel-container" style="width: 20rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> 
                            <img src="{{asset('assets/image/block/colis.jpg')}}" width="100%" height="50%">
                            <div class="card-body">
                                <h5 class="card-title">{{ $one->title }}</h5>
                                <p class="card-text">{{ $one->description }}</p>
                            </div> 
                        </li>
                            <li class="list-group-item">Code du produit : <a href="#" class="card-link">{{ $one->id }}</a></li>
                            <li class="list-group-item">{{ $one->created_at->diffForHumans() }}</li>
                            <li class="list-group-item">
                                Statut du colis : 
                                <a href="#" class="card-link">
                                    @if($one->state == 0)
                                        A la gare
                                    @elseif($one->state == 1)
                                        En route
                                    @else
                                        Arrivé à destination
                                    @endif
                                </a>
                            </li>
                    </ul>
                </div>
            <a href="/print/{{ $one->id }}" class="btn btn-primary">Voir</a>
            @if($one->state == 0)
            <a href="/modifier/{{ $one->id }}" class="btn btn-warning">Valider</a>
            @endif
            <!-- <a href="/delete/{{ $one->id }}" class="btn btn-warning">supprimer</a> -->
            </div>
            @empty
            <h1>Vide</h1>
            @endforelse
		</div>
	</div>
</div>

@endsection
