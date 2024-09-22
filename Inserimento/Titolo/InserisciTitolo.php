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
          echo "<a class=\"navbar-brand\" href=\"https://brokerageco.altervista.org/Compravendita/IndexAdmin.php\">
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



  <!-FORM->
  <form action= "InserisciTitolo2.php" method= "Post" style="background-color:#fe5d00;">
  <h2>Dichiara il tuo titolo</h2>
  <br/>
  &nbsp; Tipo: <select name="Tipo">
    <option value="Casa">Casa</option>
    <option value="Garage">Garage</option>
    <option value="Appartamento">Appartamento</option>
    <option value="Ufficio">Ufficio</option>
    <option value="Locale">Locale</option>
    <option value="Capannone">Capannone</option>
    <option value="Terreno">Terreno</option>
    <option value="Edificio">Edificio</option>
  </select>
  <br/><br/>
  &nbsp; Provincia: <select name="Provincia">
	<option value="AG">Agrigento</option>
	<option value="AL">Alessandria</option>
	<option value="AN">Ancona</option>
	<option value="AO">Aosta</option>
	<option value="AR">Arezzo</option>
	<option value="AP">Ascoli Piceno</option>
	<option value="AT">Asti</option>
	<option value="AV">Avellino</option>
	<option value="BA">Bari</option>
	<option value="BT">Barletta-Andria-Trani</option>
	<option value="BL">Belluno</option>
	<option value="BN">Benevento</option>
	<option value="BG">Bergamo</option>
	<option value="BI">Biella</option>
	<option value="BO">Bologna</option>
	<option value="BZ">Bolzano</option>
	<option value="BS">Brescia</option>
	<option value="BR">Brindisi</option>
	<option value="CA">Cagliari</option>
	<option value="CL">Caltanissetta</option>
	<option value="CB">Campobasso</option>
	<option value="CI">Carbonia-iglesias</option>
	<option value="CE">Caserta</option>
	<option value="CT">Catania</option>
	<option value="CZ">Catanzaro</option>
	<option value="CH">Chieti</option>
	<option value="CO">Como</option>
	<option value="CS">Cosenza</option>
	<option value="CR">Cremona</option>
	<option value="KR">Crotone</option>
	<option value="CN">Cuneo</option>
	<option value="EN">Enna</option>
	<option value="FM">Fermo</option>
	<option value="FE">Ferrara</option>
	<option value="FI">Firenze</option>
	<option value="FG">Foggia</option>
	<option value="FC">Forl&igrave;-Cesena</option>
	<option value="FR">Frosinone</option>
	<option value="GE">Genova</option>
	<option value="GO">Gorizia</option>
	<option value="GR">Grosseto</option>
	<option value="IM">Imperia</option>
	<option value="IS">Isernia</option>
	<option value="SP">La spezia</option>
	<option value="AQ">L'aquila</option>
	<option value="LT">Latina</option>
	<option value="LE">Lecce</option>
	<option value="LC">Lecco</option>
	<option value="LI">Livorno</option>
	<option value="LO">Lodi</option>
	<option value="LU">Lucca</option>
	<option value="MC">Macerata</option>
	<option value="MN">Mantova</option>
	<option value="MS">Massa-Carrara</option>
	<option value="MT">Matera</option>
	<option value="VS">Medio Campidano</option>
	<option value="ME">Messina</option>
	<option value="MI">Milano</option>
	<option value="MO">Modena</option>
	<option value="MB">Monza e della Brianza</option>
	<option value="NA">Napoli</option>
	<option value="NO">Novara</option>
	<option value="NU">Nuoro</option>
	<option value="OG">Ogliastra</option>
	<option value="OT">Olbia-Tempio</option>
	<option value="OR">Oristano</option>
	<option value="PD">Padova</option>
	<option value="PA">Palermo</option>
	<option value="PR">Parma</option>
	<option value="PV">Pavia</option>
	<option value="PG">Perugia</option>
	<option value="PU">Pesaro e Urbino</option>
	<option value="PE">Pescara</option>
	<option value="PC">Piacenza</option>
	<option value="PI">Pisa</option>
	<option value="PT">Pistoia</option>
	<option value="PN">Pordenone</option>
	<option value="PZ">Potenza</option>
	<option value="PO">Prato</option>
	<option value="RG">Ragusa</option>
	<option value="RA">Ravenna</option>
	<option value="RC">Reggio di Calabria</option>
	<option value="RE">Reggio nell'Emilia</option>
	<option value="RI">Rieti</option>
	<option value="RN">Rimini</option>
	<option value="RM">Roma</option>
	<option value="RO">Rovigo</option>
	<option value="SA">Salerno</option>
	<option value="SS">Sassari</option>
	<option value="SV">Savona</option>
	<option value="SI">Siena</option>
	<option value="SR">Siracusa</option>
	<option value="SO">Sondrio</option>
	<option value="TA">Taranto</option>
	<option value="TE">Teramo</option>
	<option value="TR">Terni</option>
	<option value="TO">Torino</option>
	<option value="TP">Trapani</option>
	<option value="TN">Trento</option>
	<option value="TV">Treviso</option>
	<option value="TS">Trieste</option>
	<option value="UD">Udine</option>
	<option value="VA">Varese</option>
	<option value="VE">Venezia</option>
	<option value="VB">Verbano-Cusio-Ossola</option>
	<option value="VC">Vercelli</option>
	<option value="VR">Verona</option>
	<option value="VV">Vibo valentia</option>
	<option value="VI">Vicenza</option>
	<option value="VT">Viterbo</option>
</select>
  <br/><br/>
  <?php
  echo "<input type=\"hidden\" name=\"ID_C\" value=$id>";
  ?>
  &nbsp; <input type= "reset" value= "Annulla">
  <input type= "submit" value= "Dichiara Titolo">
  <br/><br/>
  <br/><br/><br/><br/><br/><br/>
  </form>

    

  </body>
</html>
