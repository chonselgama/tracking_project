<div class="theme-container container ">  
    <div class="row pad-10">
    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-md-8 col-md-offset-2 track-prod clrbg-before wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">     
            <h2 class="title-1"> Consultez le colis </h2> <span class="font2-light fs-12">Maintenant traquez facilement votre colis</span>
            <div class="row">
            <form class="" wire:submit.prevent="searchByName">
                @csrf
                    <div class="col-md-7 col-sm-7">
                        <div class="form-group">
                            <input type="text" placeholder="Entrez le code du produit" wire:model="code" required="" class="form-control box-shadow">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="form-group">
                            <button class="btn-1">validez</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
    </div>
    @if(isset($colis))
        <div class="row">
            <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> 
                <img alt="" src="assets/image/block/colis.jpg" />
            </div>
            <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
                <div class="prod-info white-clr">
                    <ul>
                        <li> <span class="title-2">Label:</span> <span class="fs-16">{{ $colis->title }}</span> </li>
                        <li> <span class="title-2">Code du produit:</span> <span class="fs-16">{{ $colis->id }}</span> </li>
                        <li> <span class="title-2">Enregistré:</span> <span class="fs-16">{{ $colis->created_at->diffForHumans() }}</span> </li>
                        <li> <span class="title-2">Statut:</span> <span class="fs-16 theme-clr">
                            @if($colis->state == 0) 
                                Colis à la gare 
                            @elseif($colis->state == 1)
                                Colis en route
                            @else Arrivé à destination @endif
                        </span> </li>
                        <li> <span class="title-2">Poids (kg):</span> <span class="fs-16">{{ $colis->weight }} KG</span> </li>  
                        <li> <span class="title-2">Destinataire:</span> <span class="fs-16">{{ $colis->recipient }}</span> </li>
                        @if($colis->state == 0)
                            <li>
                                <form method="post" action="{{ route('tweak',$colis->id) }}" class="">
                                    @csrf    
                                    <button type="submit" class="btn-1">j'ai reçu</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-wrap">
            <div class="progress-status"> 
                <span class="border-left"></span>
                <span class="border-right"></span>
                <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                     <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s"> 
                        <span class="dot dot-center theme-clr-bg"></span> 
                     </span> 
                <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s">
                    <span class="dot dot-center theme-clr-bg"></span> 
                </span>
            </div>
            <div class="row progress-content upper-text">
                <div class="col-md-3 col-xs-8 col-sm-2">
                    <p class="fs-12 no-margin"> De </p>
                    <h2 class="title-1 no-margin">{{ $colis->depart_town }}</h2>
                </div>
                <div class="col-md-2 col-xs-8 col-sm-3">
                    <p class="fs-12 no-margin">  <b class="black-clr"> </b>  </p>                                
                </div>
                <div class="col-md-4 col-xs-8 col-sm-4 text-center">
                    <p class="fs-12 no-margin">  </p>
                    <h2 class="title-1 no-margin"></h2>
                </div>
                <div class="col-md-1 col-xs-8 col-sm-1 no-pad">
                    <p class="fs-12 no-margin">  <b class="black-clr"> </b>  </p>                                
                </div>
                <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                    <p class="fs-12 no-margin"> A </p>
                    <h2 class="title-1 no-margin">{{ $colis->arrived_town }}</h2>
                </div>
            </div>
        </div>
    @endif
</div>