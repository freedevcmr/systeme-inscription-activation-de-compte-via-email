<?php $title = "SMS"; 
include ('partiels/_header.php');
?>
<div class="container">
    <h4 class="lead text-center  ">Envoi d'SMS rapide et facile</h4>
        <?php include ('partiels/_errors.php');?>
        <?php include ('partiels/_getFlash.php');?>
   <P class="well text-danger   "> Salut "nom de l'utilisateur connecter" vous pouvez desormais 
   signiler a vos amis ou clients que vous êtes connecter  
   
   </P>
   <div class="col-md-offset-3 col-md-6">

        <form class="form-group" method="POST" action="">

            <div class="form-group">
            <label id="mynum">Mon numero</label>
                <input type="text" name="mynumber" id="mynum" placeholder="votre numero"
                        value="<?= get_input('mynumber')?>" class="form-control"/>
            </div>

            <div class="form-group">
            <label id="numberdest">Numero du destinataire</label>
                <input type="email" name="numberdest" id="mail" placeholder="numero de la personne a contacter "
                        value="<?= get_input('numberdest')?>" class="form-control" />
            </div>

            <div class="row">                          
                <div class="form-group col-md-12">
                    <label for="bi">entrer votre message <span class="glyphicon glyphicon-pushpin"></span></label>
                <textarea name="msg" id="bi" cols="30" rows="10"  style ="{auto-resize:none;}" class="form-control"
                    ><?= get_input('msg')?></textarea>                                    
                    
                </div>                       
            </div>

            <div class="form-group">
            
            <button type='submit' name="send" class="btn btn-primary pull-right btn-block">Envoyer</button>
            </div>

        </form>

    </div>
<?php
include ('partiels/_footer.php');
?>