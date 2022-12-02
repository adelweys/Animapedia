<?php
require 'vendor/autoload.php';

\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
\EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
\EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
\EasyRdf\RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
\EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/terms/');
\EasyRdf\RdfNamespace::set('hewan', 'https://example.org/schema/hewan');
\EasyRdf\RdfNamespace::setDefault('og');

$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/hewan2/sparql');

$sparql_query = '
SELECT ?m ?nama ?image ?kelas ?deskripsi ?diet ?habitat ?id WHERE {
    ?m rdf:type hewan:animal;
       rdfs:nama ?nama; 
       hewan:image ?image; 
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
    <link rel="stylesheet" href="./asstets/style2.css">
    <title>Animapedia</title>
    
</head>
<body>

  <section class="main">
  <header>
            <img src="./images/WhatsApp Image 2022-11-14 at 10.00.03.jpg" class="logo">
            
           
                <ul class="navigation">
                  <li><a href="index.php">Home</a></li>
                </ul>
           
        
  </header>
  <div class="content">
  <?php 
                   foreach($result as $row){
                                 

                    $detail = [
                      'image' =>$row->image,
                      'kelas' =>$row->kelas,
                      'judul' => $row->nama,
                      'deskripsi' =>$row->deskripsi,
                      'diet' =>$row->diet,
                      'habitat' =>$row->habitat,
                      'deskripsi'=>$row->deskripsi,
                    ];
                  ?>
    
    <h2>Detail hewan</h2>
    <h4></br><?=$detail['deskripsi']?></h4>
    <img src="<?=$detail['image']?>" id="gambar">
  </div>
  <div class="slider">
  

        <div class="slides active"> 
            <h2><span style="color:#5F8D4E;">Nama</span></br><?=$detail['judul']?></h2>
            <h2><span style="color:#5F8D4E;">Kelas</span></br><?=$detail['kelas']?></h2>
        </div>
        <div class="slides ">
            <h2><span style="color:#5F8D4E;">Habitat</span></br><?=$detail['habitat']?></h2>
            
            <h2><span style="color:#5F8D4E;">Golongan</span></br><?=$detail['diet']?></h2>
        </div>


       
                  
  <?php } ?>
  </div>

  <div class="footer">
  <div class="dots" >
                <span class="dot active"></span>
                <span class="dot"></span>
                
            </div>
  </div>

</section> 

<script>
        const slides = document.querySelectorAll('.slides');
        const dots = document.querySelectorAll('.dot');

        function setActive(i) {
            for (slide of slides)
                slide.classList.remove('active');
            slides[i].classList.add('active');
            for (dot of dots)
                dot.classList.remove('active');
            dots[i].classList.add('active');
        }

        for (let j = 0; j < dots.length; j++) {
            dots[j].addEventListener('click', function () {
                setActive(j)
            })
        }


    </script>
</body>
</html>

