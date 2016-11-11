<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<style>
html, body {
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 13px;
}
.opening a {
    	font-size: 16px;
    	font-weight: bold;
    	color: #118bd9;
    	text-decoration: none;
}
.openin a:hover{ text-decoration: underline; }
.location {
    color: #7c7c7c;
    margin: 8px 0;
}
</style>


<?php
$data =  file_get_contents("https://api.greenhouse.io/v1/boards/c1consulting/embed/department?id=".$_GET['id']);
$officeData=  json_decode($data, TRUE); ?>
<?php
/*
if(is_array($officeData['departments'])){
 foreach($officeData['departments'] as $key=>$value){?>
     <p style="font-size: 16px; font-weight: bold;"> <?php echo $value['name']; ?></p>
<?php if(count($value['jobs'])>0){?>

   <?php
    foreach($value['jobs'] as $key=>$jobValue){ ?>
<p><a href="<?php  echo $jobValue['absolute_url']; ?>" style="font-size: 16px; font-weight: bold;"><?php echo $jobValue['title']; ?></a><br>
    <span> <?php echo  $jobValue['location']['name'] ?> </span></p>
    <?php }
}
else{ ?>
  
     <span> <?php echo "0 jobs"; ?> </span></p>
<?php }

    ?>

<?php }}
*/

?>

<script type="text/javascript">
$(document).ready(function(){
$("a").on("click", function(){
   var linkAddress = $(this).attr('href');


if(linkAddress){
alert(linkAddress);

$("#job_detail").load("https://css-tricks.com/creating-clickable-divs/");

return false;

event.preventDefault();

}else{
return false;
}   


});

});

</script>




<?php if(is_array($officeData)){  ?>
   
<?php 
    if(count($officeData['jobs'])>0){?>

   <?php
    foreach($officeData['jobs'] as $key=>$jobValue){ ?>

<p class="opening" id="job"><a href="<?php  echo $jobValue['absolute_url']; ?>" style="font-size: 16px; font-weight: bold;"><?php echo $jobValue['title']; ?></a><br>
    <span class="location"> <?php echo  $jobValue['location']['name'] ?> </span></p>
    <?php }
}
else{ ?>
  
     <span> <?php echo "0 jobs"; ?> </span></p>
<?php }

    ?>

<?php }

?>


<div id="job_detail" style="background-color: #ccc; width: 800px;height: 1000px;"></div>




