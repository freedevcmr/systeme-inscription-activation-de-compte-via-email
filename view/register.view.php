<?php $title = "inscription"; 
include ('partiels/_header.php');
?>
<div class="container">
    <h4 class="lead text-center  ">Qu'attendez vous!!! Devenez des a present Membre...</h4>
        <?php include ('partiels/_errors.php');?>
    <div class="col-md-offset-3 col-md-6">

        <form class="form-group" method="POST" action="">

            <div class="form-group">
            <label id="nom">Nom</label>
                <input type="text" name="names" id="nom" placeholder="votre nom"
                        value="<?= get_input('names')?>" class="form-control"/>
            </div>

            <div class="form-group">
            <label id="mail">Email</label>
                <input type="email" name="email" id="mail" placeholder="votre email"
                        value="<?= get_input('email')?>" class="form-control" />
            </div>

            <div class="form-group">
            <label id="pseu">pseudo</label>
                <input type="text" name="pseudo" id="pseu" placeholder="votre pseudo"
                        value="<?= get_input('pseudo')?>" class="form-control" />
            </div>

            <div class="form-group">
            <label id="ps">Mot de passe</label>
                <input type="password" name="pass" id="ps" placeholder="votre mot de passe"
                        value="" class="form-control"/>
            </div>

            <div class="form-group">
            <label id="ps1">Confirmation du mot de passe</label>
                <input type="password" name="pass_confirm" id="ps1" placeholder="confirmer votre mot de psse"
                        value="" class="form-control" />
            </div>

            <div class="form-group">
            
            <button type='submit' name="inscrire" class="btn btn-primary pull-right btn-lg">je m'inscrie</button>
            </div>

        </form>

    </div>
</div>
<?php
include ('partiels/_footer.php');
?>