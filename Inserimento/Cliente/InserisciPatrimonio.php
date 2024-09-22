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
  <form action= "InserisciPatrimonio2.php" method= "Post" style="background-color:#fe5d00;">
  <h2>Aggiungi denaro</h2>
  <br/>
  &nbsp; Titolare carta: <input type= "text" required="true" size= "20" maxlength="20" name= "Nominativo">
  <br/><br/>
  &nbsp; Numero carta: <input type= "text" required="true" pattern="^[0-9]{16}$" size= "16" maxlength="16" name= "Numero">
  <br/><br/>
  &nbsp; CVC: <input type= "text" required="true" pattern="^[0-9]{3}$" size= "3" maxlength="3" name= "CVC">
  <br/><br/>
  &nbsp; Scadenza: <input type= "text" required="true" pattern="^[0-1]{1}[0-9]{1}[/]{1}[2-9]{1}[0-9]{1}$" size= "5" maxlength="5" name= "Scadenza">
  &nbsp; *MM/AA*
  <br/><br/>
  &nbsp; Ammontare: &euro; <input type= "number" min="0.01" max="9999999999999.99" step="0.01" size= "15" name= "Patrimonio">
  <br/><br/>
  <?php
  echo "<input type=\"hidden\" name=\"ID_C\" value=$id>";
  ?>
  &nbsp; <input type= "reset" value= "Annulla">
  <input type= "submit" value= "Aggiungi">
  <br/><br/>
  </form>

    

  </body>
</html>
