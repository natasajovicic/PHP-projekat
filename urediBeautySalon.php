<?php
include 'domen/BeautySalon.php';

if (isset($_POST['Naziv'])) {
    $beauty_salon = new BeautySalon();
    $beauty_salon->setNaziv($_POST['Naziv']);
    $beauty_salon->save();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Beauty saloni</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>


        <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

        <script>
            $.get("kontroler.php", {beauty_salon: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        ispis = '';
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<p>' + podaci[i].Naziv + '</p>' +
                                    '<ul class="links">' +
                                    '<li><button type="button" onclick="obrisi(' + podaci[i].Beauty_salonID + ')" >Obrisi</button></li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#firme').html(ispis);
                    });


            function obrisi(id) {
                $.get('kontroler.php',
                    {obrisi: 'beauty_salon', id: id})
                    .done(function (data) {
                        if (data == 'OK') {
                            location.reload();
                        } else {
                            alert('Greska');
                        }
                    });
            }
        </script>

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o salonima </h1>
                <a href="index.php">< Povratak na pocetnu</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">

            <div class="box">
                <p>

                <form class="form-group"  action="" method="POST" name="unos" >
                <br><br>
                    <p>Naziv salona</p>
                    <input class="form-control" type="text" name="Naziv" >
                    <p></p><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Sacuvaj</button>
                </form>  

                </p>
            </div>
            <div class="row">
                <div class="col-md-8" id="firme">
                </div>
            </div>
        </div>
    </div>
