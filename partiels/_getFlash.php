<?php 

//cette un function permet d'afficher les messages flash

if(!empty($_SESSION['notification']['message']))
{  ?> 

    <div class="alert alert-<?=$_SESSION['notification']['type']; ?> text-center" >

    <?= '<h4>'.$_SESSION['notification']['message'].'</h4>'; ?> 
    </div>
<?php 
     $_SESSION['notification']=[];
}



