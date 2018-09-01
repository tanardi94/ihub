<?php  
$this->title = 'Certificate to '. $model->fullname;
$output = "./iconnect/".$model->iconnect_filename.".jpg";
?>

<img style="max-width:100%;max-height:calc(100vh - 90px);width:auto;height:auto;margin: 2px auto;
display: block;border: solid 1px black;" src="<?php echo $output;  ?>" >