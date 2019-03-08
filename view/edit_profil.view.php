<?php $title = "edit_profil"; 
include ('partiels/_header.php');
?>
<div class="container">
    
        <?php include ('partiels/_errors.php');?>
        <?php include ('partiels/_getFlash.php');?>
 <div class="row"> <!---debut de la ligne--> 
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Mon Profil</h3>
                </div>
                <div class="panel-body">

                <div class="row">
                    <div class="col-md-6" >
                        <img src="..." class="img-responsive" alt="Responsive image">
                    </div>
                    <div class="col-md-6" >
                       <button class='btn btn-primary'>demande d'amité</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" >
                      <p> <strong>Nom:</strong></strong>  <?= e($data->nom)?> </p>
                      <p> <strong>Pseudo: </strong> <?= e($data->pseudo)?></p>
                      <p> <strong> Email</strong> <a href="mailto:<?= e($data->email)?>"><?= e($data->email)?></a></p>

                    <?php if($data->ville !==null):?>
                      <p> <strong>  ville: </strong><?= e($data->ville)?></p>
                            <?php endif;?>
                    <?php if($data->pays !==null):?>
                      <p> <strong>  pays </strong><?= e($data->pays)?></p>
                            <?php endif;?>
                    <?php if($data->twitter !==null) :?>
                        <?php if((int)$data->twitter !==0) :?>
                        <?= '<p> <strong>  Telephone </strong>'.e($data->twitter).'</p>'?>
                        <?php else:?>
                     
                    
                     <?= '<p> <strong>  twitt </strong>'.e($data->twitter).'</p>'?>
                    <?php endif;?>
                    <?php endif;?>
                    <?= ($data->facebook !==null)?
                      '<p> <strong>  facebook </strong>'. e($data->facebook).'</p>'
                      : null?>
                    
                    </div>
                    <div class="col-md-6" >
                      <p> <strong>  Grade </strong><span class="text-danger"><?= e($data->grade)?></span></p>
                      <p> <strong>  profil </strong><span class="text-danger"><?= e($data->profil)?></span></p>
                      <p> <strong>  Sexe </strong><span class=""><?= ($data->sexe == 'H')?'homme':'femme'?></span></p>
                      <p> <strong>  status:</strong><span class=""><?= ($data->emploi == '0')?'non dispo pour emploi':'dispo pour emploi'?></span></p>
                      <p> <strong>  github </strong><span class=""><?= ($data->github)?></span></p>
                   
                    </div>
                </div>


                
                   
                    
                   
                   
                    
                </div>
            </div>
            <!--block de biographie-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Ma biographie</h3>
                </div>
                <div class="panel-body">

                <p>
                <?= nl2br(htmlspecialchars($data->biographie)) ?>
                </p> 


                    
                    
                </div>
            </div>

        
        </div>
        <!---la limite entre les deux bloque-->
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Completer ou modifier mes information</h3>
                </div>
                <div class="panel-body">

                    <form class="fom-group" method="POST" action="">
                    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom">NOM <span class="glyphicon glyphicon-user"></></label>
                                <input type="text" class="form-control" name="nom" 
                                id="nom" value="<?= (get_input('nom')!==null)?get_input('nom'):e($data->nom)?>" />
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="pse">Pseudo <span class="glyphicon glyphicon-pushpin"></span></label>
                                <input type="text" class="form-control" name="pseudo" 
                                id="pse" value="<?= (get_input('pseudo')!==null)?get_input('pseudo'):e($data->pseudo)?>" />
                            </div>                       
                        </div>

                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="vil">Ville<span class="glyphicon glyphicon-pushpin"></span></label>
                                <input type="text" class="form-control" name="ville" 
                                id="vil" value="<?= (get_input('ville')!==null)?get_input('ville'): e($data->ville)?>" />
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="pa">Pays<span class="glyphicon glyphicon-pushpin"></span></label>
                                <input type="text" class="form-control" name="pays" 
                                id="pa" value="<?= (get_input('pays')!==null)?get_input('pays'): e($data->pays)?>" />
                            </div>                       
                        </div>

                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="se">sexe<span class="glyphicon glyphicon-pushpin"></span></label>
                               <select name="sexe" id="se" class="form-control">
                                    <option value="H">HOMME</option>
                                    <option value="F">FEMME</option>
                               </select>
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="pdev">profil dev<span class="glyphicon glyphicon-pushpin"></span></label>
                                 <select name="dev" id="pdev" class="form-control">
                                    <option value="1">dev-web</option>
                                    <option value="2">dev-mobile</option>
                                    <option value="3">dev-frontend</option>
                                    <option value="4">QA-manager</option>
                                    <option value="5">dev-fallstack</option>
                                    <option value="6">Dev-Integrator</option>
                                    
                               </select>
                            </div>                       
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tw">twiter (ou telephone) </label>
                                <input type="text" class="form-control" name="twiter" 
                                id="tw" value="<?= (get_input('twitter')!==null)?get_input('twitter'): e($data->twitter)?>" />
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="fa">facebook</label>
                                <input type="text" class="form-control" name="face" 
                                id="fa" value="<?= (get_input('facebook')!==null)?get_input('facebook'): e($data->facebook)?>" />
                            </div>                       
                        </div>

                        <div class="row">
                            <div class=" col-md-6">
                                <div class="checkbox">
                                    <label for="bo" >
                                    <input type="checkbox"  name="box" id="bo" checked="<?= ($data=='1')?'checked':null?> "/>
                                    dipos emploi </label>
                                </div>
                            </div> 

                            <div class="form-group col-md-6">
                                <label for="gi">github <span class="glyphicon glyphicon-pushpin"></span></label>
                                <input type="text" class="form-control" name="git" 
                                id="gi" value="" />
                            </div>  
                                                 
                        </div>

                        <div class="row">                          
                            <div class="form-group col-md-12">
                              <label for="bi">A Propos de Moi <span class="glyphicon glyphicon-pushpin"></span></label>
                            <textarea name="comment" id="bi" cols="30" rows="10"  style ="{auto-resize:none;}" class="form-control"
                               ><?= get_input('comment')?></textarea>                                    
                                
                            </div>                       
                        </div>

                        <div class="row">
                           
                            <div class="form-group ">
                                <button class="btn btn-primary pull-right" name="update">
                                continuer|mettre a jour</button>
                                
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