 <body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">DEV SOCIAL NETWORK</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['auth_id'])) :?>
            <li><a href="edit_profil.php">Editer Mon profil</a></li>
            <li><a href="accueil.php">actualiter</a></li>
            <li><a href="sms.php">SMS</a></li>
            <li><a href="addpost.php">faire une publication</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
            <?php else :?>
            <li><a href="login.php">connexion</a></li>
            <li><a href="register.php">Inscription</a></li>
        <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>
