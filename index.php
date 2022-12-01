<?php
    require_once realpath(__DIR__ . '') . '/vendor/autoload.php';
    
    require_once "lib/EasyRdf.php";
   
    EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
    EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
    EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
    EasyRdf_Namespace::set('geo', 'http://www.opengis.net/ont/geosparql#');
    EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
    EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    EasyRdf_Namespace::set('o', 'http://dbpedia.org/ontology/');
    EasyRdf_Namespace::set('p', 'http://dbpedia.org/property/');
    EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');

    $sparql1 = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql')



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asstets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <title>Document</title>
</head>
<body>
    <section class="showcase">
        <header>
            <img src="./images/WhatsApp Image 2022-11-14 at 10.00.03.jpg" class="logo">
            <div class="nav">
                <ul>
                  <li><a href="index.php">Home</a></li>
                </ul>
            </div>
        </header>
        <video src="./images/Video Landing Page AnimaPedia - Converted with FlexClip.mp4" muted loop autoplay>

        </video>
        <div class="overlay"></div>
        <div class="text">
            <h2>JELEJAHI DUNIA HEWAN SECARA ONLINE</h2>
            <form class="search" method="POST" role="search" action="hasilcari.php">
                <input class="input" type="address" name="judul" class="searchText" placeholder="Search....." autocomplete="on" required>
               <button type="submit" class="button"><ion-icon name="search-outline"></ion-icon></button>
            </form>
        </div>

        
    </section>

    
</body>
</html>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>   
