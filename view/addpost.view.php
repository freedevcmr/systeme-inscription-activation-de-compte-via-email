<?php $title = "edit_profil"; 
include ('partiels/_header.php');
?>
<div class="container">
    
        <?php include ('partiels/_errors.php');?>
        <?php include ('partiels/_getFlash.php');?>
 <div class="row"> <!---debut de la ligne--> 
       
           
        <!---la limite entre les deux bloque-->
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Faire une publication</h3>
                </div>
                <div class="panel-body">

                    <form class="fom-group" method="POST" action="">
                    
                     
                         

                         <div class="row">
                            <div class="form-group col-md-6">
                              
                       
                           

                                <div class="row">                          
                                    <div class="form-group col-md-12">
                                    <label for="bi">A Propos de Moi <span class="glyphicon glyphicon-pushpin"></span></label>
                                    <textarea name="comment" id="bi" cols="30" rows="10"  style ="{auto-resize:none;}" class="form-control"
                                    ></textarea>                                    
                                        
                                    </div>                       
                                </div>

                                <div class="row">
                                
                                    <div class="form-group ">
                                        <button class="btn btn-primary pull-right" name="update">
                                        publier</button>
                                        
                                    </div>                       
                                </div>
                            </div>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    
    
    </div> <!---fin de la ligne--> 
        
    
</div>
<?php
include ('partiels/_footer.php');
?>