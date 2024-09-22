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
  $id=$_POST['ID'];
  $password=$_POST['Password'];
  $tipo=$_POST['Tipo'];
  $conn=mysqli_connect("my_brokerageco");
  if(!$conn)
  { echo("Errore di connessione");
  exit();
  }
  $nome='my_brokerageco';
  $x=mysqli_select_db($conn,$nome);
  if(!$x)
  {
  echo("errore della connessione al database \n");
  die('error'.mysqli_error($conn));
  exit();
  }
  if($tipo=="Utente"){
  $query1="SELECT * FROM CLIENTI WHERE ID_Cliente='$id' AND Password='$password';";
  $ris=mysqli_query($conn,$query1);
  $numerorighe=mysqli_num_rows($ris);
    if($numerorighe==0){
    print ("<h2 style=\"background-color:#fe5d00;\">Utente non riconosciuto<br/><br/><br/><br/><br/><br/><br/><br/><br/></h2>");
    }
    else{
    header("location:https://brokerageco.altervista.org/Compravendita/IndexCliente.php?id=$id");
    }
  }
  else{
  $query1="SELECT * FROM ADMIN WHERE ID_Admin='$id' AND Password='$password';";
  $ris=mysqli_query($conn,$query1);
  $numerorighe=mysqli_num_rows($ris);
    if($numerorighe==0){
    print ("<h2 style=\"background-color:#fe5d00;\">Utente non riconosciuto<br/><br/><br/><br/><br/><br/><br/><br/><br/></h2>");
    }
    else{
    header("location:https://brokerageco.altervista.org/Compravendita/IndexAdmin.php");
    }
  }

  ?>

    

  </body>
</html>
