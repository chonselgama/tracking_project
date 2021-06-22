<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap Css -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css">         -->
    <!-- Bootstrap Select Css -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css"> -->
    <!-- Fonts Css -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugins/font-elegant/elegant.css"> -->
    <!-- OwlCarousel2 Slider Css -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugins/owl.carousel.2/assets/owl.carousel.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Animate Css -->       
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/animate.css"> -->

    <!-- Main Css -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/theme.css"> -->
</head>
<body>
    <h3>Reçu</h3>
    <table class="table table-borderless">
        <!-- <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead> -->
        <tbody>
            <tr>
                <th scope="row">Identifiant colis</th>
                <td>{{ $colis[0]->id }}</td>
            </tr>
            <tr>
                <th scope="row">Intitulé</th>
                <td>{{ $colis[0]->title }}</td>
            </tr>
            <tr>
                <th scope="row">Expediteur</th>
                <td colspan="2">{{ $colis[0]->sender }}</td>
            </tr>
            <tr>
                <th scope="row">Mail de l'Expediteur</th>
                <td colspan="2">{{ $colis[0]->sender_mail }}</td>
            </tr>
            <tr>
                <th scope="row">Destinataire</th>
                <td colspan="2">{{ $colis[0]->recipient }}</td>
            </tr>
            <tr>
                <th scope="row">Mail destinataire</th>
                <td colspan="2">{{ $colis[0]->recipient_mail }}</td>
            </tr>
            <tr>
                <th scope="row">Poids</th>
                <td colspan="2">{{ $colis[0]->weight }} kg</td>
            </tr>
            <tr>
                <th scope="row">Prix</th>
                <td colspan="2">{{ $colis[0]->price }} fcfa</td>
            </tr>
            <tr>
                <th scope="row">Ville de depart</th>
                <td colspan="2">{{ $colis[0]->depart_town }}</td>
            </tr>
            <tr>
                <th scope="row">Ville d'arrivée</th>
                <td colspan="2">{{ $colis[0]->arrived_town }}</td>
            </tr>
        </tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>        
 
    <script src="assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js" type="text/javascript"></script>    

    <script src="assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js" type="text/javascript"></script>    

    <script src="assets/plugins/owl.carousel.2/owl.carousel.min.js" type="text/javascript"></script>   

    <script src="assets/js/jquery.sticky.js"></script>

    <script src="assets/plugins/WOW-master/dist/wow.min.js" type="text/javascript"></script>   

    <script src="assets/js/theme.js" type="text/javascript"></script> -->
</body>
</html>