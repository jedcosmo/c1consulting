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
$departmentData=  json_decode($data, TRUE);
//echo "<pre>";print_r($departmentData);die;
?>
<?php if(is_array($departmentData)){  ?>
   
<?php 
    if(count($departmentData['jobs'])>0){?>

   <?php 
    foreach($departmentData['jobs'] as $key=>$jobValue){ ?>

<p class="opening"><a id="jobid" job="<?php echo $jobValue['id']; ?>" style="font-size: 16px; font-weight: bold;    cursor: pointer;"><?php echo $jobValue['title']; ?></a><br>
    <span class="location"> <?php echo  $jobValue['location']['name'] ?> </span></p>
    <?php }
}
else{ ?>
  
     <span> <?php echo "0 jobs"; ?> </span></p>
<?php }

    ?>

<?php }

?>
<script type="text/javascript">

            $(".opening a").click(function(event) {

               

              var href = $(this).attr('job');
	
              jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/jobData.php?id="+href,

                    async:true,

                   //dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {

         jQuery("#demo-table-content_department").html(data);

//jQuery(".tbl").removeClass('active');


//jQuery("#"+href).addClass('active');


    }

            });

                event.preventDefault();

            });
//open job


     

        </script>

