<?php $title = "login"; 
include ('partiels/_header.php');
?>
<div class="container">
    <h4 class="lead text-center  ">Je Possede Deja Un Compte...</h4>
        <?php include ('partiels/_errors.php');?>
        <?php include ('partiels/_getFlash.php');?>
    <div class="col-md-offset-3 col-md-6">

        <form class="form-group" method="POST" action="">

            <div class="form-group">
            <label id="nom">Login</label>
                <input type="text" name="login" id="nom" placeholder="pseudo ou email"
                        value="<?= get_input('login')?>" class="form-control"/>
            </div>

            <div class="form-group">
            <label id="ps">Mot de passe</label>
                <input type="password" name="pass" id="ps" placeholder="votre mot de passe"
                        value="" class="form-control"/>
            </div>

            <div class="form-group">
            
            <button type='submit' name="connect" class="btn btn-primary pull-right btn-lg">Connecter</button>
            </div>
        </form>
    </div>
</div>
<?php
include ('partiels/_footer.php');
?>