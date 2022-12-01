<?php
require 'vendor/autoload.php';

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/terms/');
\EasyRdf\RdfNamespace::set('hewan', 'https://example.org/schema/hewan');
\EasyRdf\RdfNamespace::setDefault('og');

$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/hewan/sparql');

$sparql_query = '
SELECT ?m ?nama ?kelas ?deskripsi ?diet ?habitat ?id WHERE {
    ?m rdf:type hewan:animal;
       rdfs:nama ?nama;
       hewan:kelas ?kelas;
       hewan:deskripsi ?deskripsi;
       hewan:diet ?diet;
       hewan:id ?id;
       hewan:habitat ?habitat;
  FILTER(?nama = "'.($_POST['judul']).'").
} ';
$result = $sparql_jena->query($sparql_query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asstets/style.css">
    <!-- <link rel="stylesheet" href="./assets/animated.css">
    <link rel="stylesheet" href="./assets/owl.css">
    <link rel="stylesheet" href="./assets/templatemo-plot-listing.css">
    <link rel="stylesheet" href="./assets/animated.css"> -->
    <title>Animapedia</title>
    
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

<img src="./images/mancinggan.png" style="position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.8;">
  <div>
    <h1 style="color:black; position:absolute;">DETAIL HEWAN</h1>
  
  </div>


  

 
<div class="text">
<?php 
                   foreach($result as $row){
                                 

                    $detail = [
                      
                      'kelas' =>$row->kelas,
                      'judul' => $row->nama,
                      'deskripsi' =>$row->deskripsi,
                      'diet' =>$row->diet,
                      'habitat' =>$row->habitat,
                    ];
                  ?>
                
                
                
                <p style="font-size: 1.1em;
                          color: #fff;
                          margin: 1px 0;
                          font-weight: 400;
                          max-width: 700px;">Kelas:  <?=$detail['kelas']?></p>
                  
                <p style="font-size: 1.1em;
                          color: #fff;
                          margin: 4px 0;
                          font-weight: 400;
                          max-width: 700px;">Nama: <?=$detail['judul']?></p>
                  
                <p style="font-size: 1.1em;
                          color: #fff;
                          margin: 4px 0;
                          font-weight: 400;
                          max-width: 700px;">Deskrpsi:  <?=$detail['deskripsi']?></p>
                  
                <p style="font-size: 1.1em;
                          color: #fff;
                          margin: 4px 0;
                          font-weight: 400;
                          max-width: 700px;">Diet:  <?=$detail['diet']?></p>
                  
                <p style="font-size: 1.1em;
                          color: #fff;
                          margin: 4px 0;
                          font-weight: 400;
                          max-width: 700px;">Habitat:  <?=$detail['habitat']?></p>
                    

<?php } ?>
</div>
 
                  </section> 
</body>
</html>

