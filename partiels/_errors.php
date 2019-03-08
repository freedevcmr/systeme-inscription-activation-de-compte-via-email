<!-- <?php 
//if(!empty($errors)){?>
<ul class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <?php // foreach($errors as $value)
   // { ?>
  <strong class="text-center"><? //echo'<li>'.$value.'</li>';?></strong> 

<?php  //  } ?>
</ul>
<?php // }?>  -->

<?php 
if (isset($errors) && count($errors) != 0){
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
    foreach($errors as $error){
        echo $error.'<br />';
    }
    echo "</div>";
}
                