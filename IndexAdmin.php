<html>
  <head>
    <title>Brokerage Companies</title>



    <!CDN CSS>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>
  <body style="background-color:grey;">

<!-CDN JAVASCRIPT->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
      $id=$_GET['id'];
    ?>

<!NAVBAR>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:black;">
    <!--NOME-->
    <div class="container-fluid">
      <?php
      if($id!=NULL){
          echo "<a class=\"navbar-brand\" href=\"https://brokerageco.altervista.org/Compravendita/IndexCliente.php?id=$id\">
        <img class=\"flex\" src=\"Loghi/logo_large.png\" alt=\"logo\" class=\"responsive\" width=\"300\" height=\"auto\"></a>";
      }else{
          echo "<a class=\"navbar-brand\" href=\"http://brokerageco.altervista.org/Compravendita/IndexAdmin.php\">
        <img class=\"flex\" src=\"Loghi/logo_large.png\" alt=\"logo\" class=\"responsive\" width=\"300\" height=\"auto\"></a>";
      }?>
      <button style="background-color:#fe5d00;" class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!--DROPDOWN-->
          <li class="nav-item dropdown">
          
            <?php
                if($id!=NULL){
                $Connessione = mysqli_connect("my_brokerageco");
                // Stabilire una connessione con il server MySQL
                if(!$Connessione)
                {
                print("<h1>Connessione al server Mysql fallita</h1>");
                exit;
                }
                $Db=mysqli_select_DB($Connessione, "my_brokerageco");
                //Selezionare il database che vogliamo utilizzare
                if(!$Db)
                {
                print("<h1>Connessione al database compravendita fallita</h1>");
                exit;
                }
                $Sql= "SELECT Nominativo FROM CLIENTI WHERE ID_Cliente='$id';"; //Impostare la query
                if(!($Result=mysqli_query($Connessione, $Sql))) //Eseguire la query
                print("Query fallita");
                else
                {
                $Dati = mysqli_fetch_array($Result);
                }
                print("<li class=\"nav-item dropdown\">
                  <a style=\"color:#fe5d00;\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\"
                   role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    $Dati[Nominativo]
                  </a>");
                  mysqli_close($Connessione); //Chiudere la connessione
                }
                else{
                    print("<li class=\"nav-item dropdown\">
                  <a style=\"color:#fe5d00;\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\"
                   role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    Admin
                  </a>");
                }
                ?>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php print("<a class=\"dropdown-item\"
                    href=\"https://brokerageco.altervista.org/Compravendita/Index.html\">Esci</a>");?>
                  </div>

              <li class="nav-item dropdown">
                <a style="color:#fe5d00;" class="nav-link dropdown-toggle" id="navbarDropdown"
                 role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Titoli
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php print("<a class=\"dropdown-item\"
                  href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Titolo/InserisciTitolo.php?id=$id\">Dichiara</a>
                  <a class=\"dropdown-item\"
                  href=\"https://brokerageco.altervista.org/Compravendita/Visualizzazione/Titolo/VisualizzaTitolo.php?id=$id\">Portafoglio</a>");?>
                </div>

                <li class="nav-item dropdown">
                  <a style="color:#fe5d00;" class="nav-link dropdown-toggle" id="navbarDropdown"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Richieste
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php 
                    if($id!=NULL){
                        print("<a class=\"dropdown-item\"
                    href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Richieste/InserisciRichiesta.php?id=$id\">Invia</a>");
                    }else{
                        print("<a class=\"dropdown-item\"
                    href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Richieste/FirmaRichiesta.php?id=$id\">Firma</a>");
                    }
                    print("<a class=\"dropdown-item\"
                    href=\"https://brokerageco.altervista.org/Compravendita/Visualizzazione/Richieste/VisualizzaRichieste.php?id=$id\">Storico</a>");?>
                  </div>

                  <li class="nav-item dropdown">
                    <a style="color:#fe5d00;" class="nav-link dropdown-toggle" id="navbarDropdown"
                     role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Transazioni
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                      if($id!=NULL){
                        print("<a class=\"dropdown-item\" href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Transazioni/InserisciTransazioni.php?id=$id\">Esegui</a>");
                    }else{
                        print("<a class=\"dropdown-item\" href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Transazioni/FirmaTransazioni.php?id=$id\">Firma</a>");
                    }?>
                      <?php print("<a class=\"dropdown-item\"
                      href=\"https://brokerageco.altervista.org/Compravendita/Visualizzazione/Transazioni/VisualizzaTransazioni.php?id=$id\">Storico</a>");?>
                    </div>
                    
                    <?php 
                    if($id!=NULL){
                    print("<li class=\"nav-item dropdown\">
                    <a style=\"color:#fe5d00;\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\"
                     role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                      Annunci
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                     <a class=\"dropdown-item\"
                      href=\"https://brokerageco.altervista.org/Compravendita/Visualizzazione/Annunci/VisualizzaAcquisti.php?id=$id\">Acquisto</a>
                      <a class=\"dropdown-item\"
                      href=\"https://brokerageco.altervista.org/Compravendita/Visualizzazione/Annunci/VisualizzaVendite.php?id=$id\">Vendita</a>
                    </div>");}?>


                <?php
                $Connessione = mysqli_connect("my_brokerageco");
                // Stabilire una connessione con il server MySQL
                if(!$Connessione)
                {
                print("<h1>Connessione al server Mysql fallita</h1>");
                exit;
                }
                $Db=mysqli_select_DB($Connessione, "my_brokerageco");
                //Selezionare il database che vogliamo utilizzare
                if(!$Db)
                {
                print("<h1>Connessione al database compravendita fallita</h1>");
                exit;
                }
                if($id!=NULL){
                $Sql= "SELECT Patrimonio FROM CLIENTI WHERE ID_Cliente='$id';"; //Impostare la query
                }else{
                    $Sql= "SELECT Patrimonio FROM SOCIETA WHERE ID_Societa='1';";
                }
                if(!($Result=mysqli_query($Connessione, $Sql))) //Eseguire la query
                print("Query fallita");
                else
                {
                $Dati = mysqli_fetch_array($Result);
                }
                print("<li class=\"nav-item dropdown\">
                  <a style=\"color:#fe5d00;\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\"
                   role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    &euro; $Dati[Patrimonio]
                  </a>");
                  mysqli_close($Connessione); //Chiudere la connessione
                  ?>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php print("<a class=\"dropdown-item\"
                    href=\"https://brokerageco.altervista.org/Compravendita/Inserimento/Cliente/InserisciPatrimonio.php?id=$id\">Aggiungi</a>");?>
                  </div>


                    <?php
                    if($id==NULL){
                  print("<li class=\"nav-item dropdown\">
                <a style=\"color:#fe5d00;\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\"
                 role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  Utente
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                  <a class=\"dropdown-item\"
                  href=\"https://brokerageco.altervista.org/Compravendita/Login/Login2.php?id=$id\">Accedi</a>");}?>
                </div>

        </ul>
      </div>
    </div>
  </nav>


<h2 style="text-align:center;  ; background-color:#fe5d00; font-family:Times New Roman;"><br>BROKERAGE COMPANIES
        <p style="font-size:50%; font-family:Lucida Console; text-align:justify; margin: 2% 2%;">Benvenuto sul sito web della societ&agrave; Brokerage Companies. Noi ci occupiamo di compravendita immobiliare e permettiamo ai nostri clienti di iscriversi con il proprio account in modo da effettuare richieste di vendita o di acquisto oppure per effettuare delle transazioni in base agli annunci presenti sulla piattaforma. Inoltre, per chi preferisce svolgere le azioni precedentemente elencate direttamente in una delle nostre sedi, basta prenotare un'appuntamento per ricevere una consulenza privata e per avere la massima assistenza sulla vendita o sull'acquisto che si vuole effettuare. </p><br>
    </h2>

  <!CAROSELLO>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <!--PRIMA SLIDE-->
      <div class="carousel-item active">
        <a><img  width="70%" height="auto" src="Carosello/Immobile.jpg" alt="First slide" style="margin: 2% 15%"></a>
        <div class="carousel-caption d-none d-md-block">
        <h5 style="background-color:#fe5d00; color:black;">ACQUISTA IMMOBILI</h5>
      <p style="background-color:black; color:#fe5d00;">Acquistare immobili con noi &egrave; semplice e sicuro</p>
    </div>
      </div>
      <!--SECONDA SLIDE-->
      <div class="carousel-item">
      <a><img  width="70%" height="auto" src="Carosello/Vendere.jpg" alt="Third slide" style="margin: 2% 15%"></a>
        <div class="carousel-caption d-none d-md-block">
          <h5 style="background-color:#fe5d00; color:black;">VENDI I TUOI IMMOBILI</h5>
          <p style="background-color:black; color:#fe5d00;">Con noi trovi in sicurezza ed efficienza acquirenti per i tuoi immobili</p>
      </div>
    </div>
    <!--TERZA SLIDE-->
    <div class="carousel-item">
    <a><img  width="70%" height="auto" src="Carosello/Consulenza.jpg" alt="Second slide" style="margin: 2% 15%"></a>
      <div class="carousel-caption d-none d-md-block">
      <h5 style="background-color:#fe5d00; color:black;">PRENOTA UNA CONSULENZA</h5>
      <p style="background-color:black; color:#fe5d00;">Napoli: 081 123 4567 || Roma: 06 123 4567 || Palermo: 091 123 4567 || Milano: 02 123 4567 || Torino: 011 123 4567</p>
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  <br>


    

  </body>
</html>
