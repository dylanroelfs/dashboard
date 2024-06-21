<!doctype html>

<html>

<head>

  <title>Login Fout</title>
  <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="image/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="600;url=logout.php" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>

<div class="login-form">

  <form action="login.php" method="post">
  <h2 class="text-center"><img src="image/logo-orange.png" alt="icon" width="50%"></h2>

  <div class="form-group">
    <div class="input-group">
      <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> De combinatie van gebruikersnaam en wachtwoord zijn niet juist.</div>
    </div>
  </div>

  <div class="form-group">
    <a href="index.html" class="btn btn-primary login-btn btn-block">Probeer opnieuw</a>
  </div>

</div>

</body>

</html>