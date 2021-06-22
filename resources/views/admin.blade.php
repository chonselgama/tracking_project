@extends('layouts.core')

@section('content')
		<div class=" md panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-check color-blue"></em>
							<div class="large">{{ $colis_recu }}</div>
							<div class="text-muted">Courrier(s) reçu(s)</div>
						</div> <br>
						<a href="/recus" class="btn btn-primary" >voir</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-car color-orange"></em>
							<div class="large">{{ $colis_en_cours }}</div>
							<div class="text-muted">Courrier(s) en cours</div>
						</div> <br>
						<a href="/cours" class="btn btn-primary" >voir</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-home color-teal"></em>
							<div class="large">{{ $colis_au_repos }}</div>
							<div class="text-muted">Courrier(s) à la gare</div>
						</div> <br>
						<a href="/gare" class="btn btn-primary" >voir</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-save color-red"></em>
							<div class="large"> {{ $colis_total }} </div>
							<div class="text-muted">Courrier(s) enregistrés</div>
						</div> <br>
						<a href="/print" class="btn btn-primary">voir</a>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Reçu</h4> @if($colis_total == 0) @php $colis_total = 1 @endphp  @endif
						<div class="easypiechart" id="easypiechart-blue" data-percent="{{ ($colis_recu*100)/$colis_total }}" ><span class="percent">{{ ($colis_recu*100)/$colis_total }}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>En cours</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="{{ ($colis_en_cours*100)/$colis_total }}" ><span class="percent">{{ ($colis_en_cours*100)/$colis_total }}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>A la gare</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="{{ ($colis_au_repos*100)/$colis_total }}" ><span class="percent">{{ ($colis_au_repos*100)/$colis_total }}%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Total</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="100" ><span class="percent">100%</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	
@endsection