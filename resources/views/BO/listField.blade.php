@include('BO/header') 
@include('BO/nav') 
    
<link rel="stylesheet" href="{{ asset('css/BO/asset/statistique.css') }}">
<link rel="stylesheet" href="{{asset('js/chart.js')}}">
    <script src="{{asset('js/chart.js')}}"></script>
<body>
    
    
                <div class="col-md-4 p-3">
                    <div class="list-client">
                        <h2>Listes des terrains</h2>
                        <div class="list-container">
                            @foreach($all as $terrain)
                                <a href="">
                                    <div class="client mt-2">
                                        <div class="image">
                                            <img src="{{ asset('css/BO/asset/client.png') }}" alt="Image du client">
                                        </div>
                                        <div class="detail-client">
                                            <p class="name">{{ $terrain->getName() }}</p>
                                            <p class="terrain">Adresse : <span class="number">{{ $terrain->getAdress()}}</span></p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>


</body>

</html>

