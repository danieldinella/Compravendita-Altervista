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

    <!NAVBAR>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:black;">
    <!--NOME-->
    <div class="container-fluid">
      <a class="navbar-brand" href="https://brokerageco.altervista.org/Compravendita/Index.html">
        <img class="flex" src="Loghi/logo_large.png" alt="logo" class="responsive" width=300 height=auto></a>
      <button style="background-color:#fe5d00;" class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!--DROPDOWN-->
          <li class="nav-item dropdown">
            <a style="color:#fe5d00;" class="nav-link dropdown-toggle" id="navbarDropdown"
             role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://brokerageco.altervista.org/Compravendita/Login/Login.html">Accedi</a>
              <a class="dropdown-item" href="https://brokerageco.altervista.org/Compravendita/Inserimento/Cliente/Registrazione.html">Registrati</a>
            </div>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  $Connessione=mysqli_connect("my_brokerageco");
  //Stabilire una connessione con il server MySQL
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
	
    $tipo=$_POST["Tipo"];
    if($tipo=="Azienda"){
    	$cod_f=NULL;
  		$p_iva=$_POST["P_Iva"];
    }else{
    	$cod_f=$_POST["Cod_F"];
  		$p_iva=NULL;
    }
  $nominativo=$_POST["Nominativo"];
  $email=$_POST["Email"];
  $password=$_POST["Password"];
  
  //Impostare la query

  $Query= "INSERT INTO CLIENTI VALUES (NULL,0,'$nominativo','$cod_f','$p_iva','$password','$email','$tipo');";

  $Res= mysqli_query($Connessione, $Query); //Eseguire la query
  if(!$Res){
  print("<h2 style=\"background-color:#fe5d00;\">Registrazione fallita<br/><br/><br/><br/><br/><br/><br/><br/><br/></h2>");
	exit;}

  $Query= "SELECT * FROM CLIENTI ORDER BY ID_Cliente DESC LIMIT 1;";
  $Res= mysqli_query($Connessione, $Query);
  $Dati=mysqli_fetch_array($Res);

  if(!$Res)
  print("<h2 style=\"background-color:#fe5d00;\">Registrazione fallita<br/><br/><br/><br/><br/><br/><br/><br/><br/></h2>");
  else
  print("<h2 style=\"background-color:#fe5d00;\">Registrazione avvenuta con successo<br/><br/>
  Il tuo ID &egrave;: $Dati[ID_Cliente] *SEGNALO DA QUALCHE PARTE PER NON DIMENTICARLO*<br/><br/><br/><br/><br/><br/><br/></h2>");

  mysqli_close($Connessione); //Chiudere la connessione
  ?>

    

  </body>
</html>
