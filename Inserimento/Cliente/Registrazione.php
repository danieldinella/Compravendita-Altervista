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
              <a class="dropdown-item" href="https://brokerageco.altervista.org/Compravendita/Registrazione.html">Registrati</a>
            </div>
        </ul>
      </div>
    </div>
  </nav>

  <!-FORM->
  <form action= "Registrazione2.php" method= "Post" style="background-color:#fe5d00;">
  <h2>Registrati</h2>
  <br/>
  &nbsp; Nominativo: <input type="text" required="true" maxlength="20" size="20" name="Nominativo">
  <br/><br/>
  <?php
  if($_POST['Tipo']=='Privato'){
   echo "&nbsp; Codice Fiscale: <input type=\"text\"
   pattern=\"^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$\"
   required=\"true\" maxlength=\"16\" size=\"16\" name=\"Cod_F\">
   <br/><br/>";
   echo "<input type=\"hidden\" name=\"P_Iva\" value=\"\">";
  }
  else {
    echo "&nbsp; Partita Iva: <input type=\"text\" pattern=\"^[0-9]{11}$\" required=\"true\"
    maxlength=\"11\" size=\"11\" name=\"P_Iva\">
    <br/><br/>";
    echo "<input type=\"hidden\" name=\"Cod_F\" value=\"\">";
  }
  ?>
  &nbsp; E-Mail: <input type="text" required="true" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" size="20" name="Email">
  <br/><br/>
  &nbsp; Password: <input type="password" required="true" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"
  minlength="8" maxlength="15" size="15" name="Password">&nbsp; *Requisiti: maiuscola, minuscola, numero e da 8 a 15 caratteri*
  <br/><br/>
  <?php
  $tipo=$_POST["Tipo"];
  echo "<input type=\"hidden\" name=\"Tipo\" value=$tipo>";
  ?>
  &nbsp; <input type= "reset" value= "Annulla">
  <input type= "submit" value= "Registra cliente">
  <br/><br/>
  <br/><br/>
  </form>

    

  </body>
</html>
