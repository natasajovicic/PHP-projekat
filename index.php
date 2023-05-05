
<!DOCTYPE HTML>
<html>
    <head>
        <title>Beauty saloni</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/moj.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>

        <script>
            // Ajax prikaz usluga prilikom pokretanja stranice
            $.get("kontroler.php", {usluga: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<h2 class="post_title">' + podaci[i].NazivUsluge + '</h2>' +
                                    '<ul class="links">' +
                                    '<li><i class="fa fa-check"></i> ' + podaci[i].Beauty_salonID + '</li><br>' +
                                    '<li><i class="fa fa-book"></i> ' + podaci[i].OpisUsluge + '</li><br>' +
                                    '<li><i class="fa fa-money"></i> ' + podaci[i].Cena + '</li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#usluga').html(ispis);
                    });


            //Ajax prikaz svih salona prilikom pokretanja stranice
            $.get("kontroler.php", {beauty_salon: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<li value=' + podaci[i].Beauty_salonID + '>*' + podaci[i].Naziv + '</li>';

                        }
                        ispis += '<a style="color:blue" href="urediBeautySalon.php">+ Uredi ili dodaj novi beauty salon</a>';
                        $('#beauty_salon').html(ispis);
                    });
                    

            //Sortiranje
            function sortAsc() {
                $.get("kontroler.php", {usluga: "sortAsc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].NazivUsluge + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i> ' + podaci[i].Cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].OpisUsluge + '</li>' +
                                        '<li><i class="fa fa-check"></i> ' + podaci[i].Beauty_salonID + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }

            function sortDesc() {
                $.get("kontroler.php", {usluga: "sortDesc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].NazivUsluge + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i> ' + podaci[i].Cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].OpisUsluge + '</li>' +
                                        '<li><i class="fa fa-check"></i> ' + podaci[i].Beauty_salonID + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }



            // Ajax pretraga
            function search() {
                $.get("kontroler.php", {usluga: 'pretraga', tekst: $('#pretraga').val()})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].NazivUsluge + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i> ' + podaci[i].Cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].OpisUsluge + '</li>' +
                                        '<li><i class="fa fa-check"></i> ' + podaci[i].Beauty_salonID + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#usluga').html(ispis);
                        });
            }

        </script>
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="logo"> <a href="index.php"><img src="image/logo.png" alt="Beauty salon"></a> </div>
                <div class="menu"> <a class="toggleMenu" href="#"><img src="image/logo.png" alt="" /> </a>
                    <ul class="nav" id="nav">
                        <li><a href="index.php">Pocetna strana</a></li>
                        <li><a href="urediUsluge.php">Uredi usluge</a></li>
                    </ul>
               </div>   
        
        </div>

</div>


        <div class="about">
            <div class="container">
                <section class="title-section">
                    <h1 class="title-header text-center"> Izaberite usluge </h1>
                </section>
                <button class="btn" onclick="sortDesc()">Sortiraj opadajuce</button>
                <button class="btn" onclick="sortAsc()">Sortiraj rastuce</button>
            </div>
        </div><br>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <input id="pretraga" type="search" onsearch="search()" class="form-control" placeholder="Pretraga..." onkeyup="search()" size="45">
                    <div id="usluga">
                    </div>
                </div>

                <div class="col-md-6" >
                    <h3>Spisak svih aktivnih salona:</h3>

                    <ul class="sidebar" id="beauty_salon">
                    </ul>
                </div>
            </div>
        </div>