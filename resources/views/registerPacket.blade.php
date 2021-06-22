@extends('layouts.core')

@section('content')

@if(session('Sucess'))
	<div class=" md panel panel-container">
		<div class="panel panel-default">
			<div class="panel-body">
				<a href="/generate" class="btn btn-primary">generer le reçu</a>
			</div>
		</div>	
	</div>			
@endif

<div class=" md panel panel-container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Enregistrer colis
			<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="POST" action="{{ route('register_packet') }}">
				@csrf
				<fieldset>
					<!-- Name input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="title">Intitulé</label>
						<div class="col-md-9">
						<input type="text" name="title" id="title" value="{{ session('title') ?? '' }}" class="form-control">
						</div>
					</div>
				
					<!-- Email input-->
					<div class="form-group">
						<label class="col-md-3 control-label" for="description">Description</label>
						<div class="col-md-9">
						<input type="text" name="description" id="description" value="{{ session('description') ?? '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="sender">Expediteur</label>
						<div class="col-md-9">
						<input type="text" name="sender" id="sender" value="{{ session('sender') ?? '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="sender_mail">Mail Expediteur</label>
						<div class="col-md-9">
						<input type="mail" name="sender_mail" id="sender_mail" value="{{ session('sender_mail') ?? '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="destinataire">Destinataire</label>
						<div class="col-md-9">
						<input type="text" name="recipient" id="destinataire" value="{{ session('recipient') ?? '' }}"  class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="recipient_mail">Mail destinataire</label>
						<div class="col-md-9">
						<input type="text" name="recipient_mail" id="recipient_mail" value="{{ session('recipient_mail') ?? '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="weight">Poids (kg)</label>
						<div class="col-md-3">
						<input type="text" name="weight" id="weight" value="{{ session('weight') ?? '' }}" class="form-control">
						</div>
						<label class="col-md-1 control-label" for="price">Prix</label>
						<div class="col-md-5">
						<input type="number" name="price" id="price" value="{{ session('price') ?? '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="recipient_mail">Destination</label>
						<div class="col-md-4">
						<input type="text" placeholder="De" name="depart_town" value="{{ session('depart_town') ?? '' }}" class="form-control from fw-600">
						</div>
						<div class="col-md-5">
						<input type="text" placeholder="A" name="arrived_town" value="{{ session('arrived_town') ?? '' }}" class="form-control to fw-600">
						</div>
					</div>
					
					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<button type="submit" class="btn btn-default btn-md pull-right">soumettre</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	
	function price_perform(weight){
		return weight * 650;
	}

	let weight = document.getElementById('weight');
	let price = document.getElementById('price');
	

	weight.addEventListener('input', function(e){
		price.value = price_perform(e.target.value);
	});

</script>
@stop