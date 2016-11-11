<?php 

/*

Template Name: greenhouseapi



*/

?>

 <?php
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('=',$link);
    $link_array[1];
?>

<?php

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script>

  $(function() {

    $( "#tabs_career" ).tabs();

  });

  </script>

  <style>

#tabs_career_title li{background: none repeat scroll 0 0 #f1f1f1;}

#tabs_career_title li a{background:#f1f1f1; padding:10px 18px; display:block;}

#tabs_career_title li.active a{background:#a23649!important; color:#fff!important;}

#tabs_career_title li a:hover{background:#a23649!important; color:#fff!important;}



#tabs_career_title_office li{background: none repeat scroll 0 0 #f1f1f1;}

#tabs_career_title_office li a{background:#f1f1f1; padding:10px 18px; display:block;}

#tabs_career_title_office li.active a{background:#a23649!important; color:#fff!important;}

#tabs_career_title_office li a:hover{background:#a23649!important; color:#fff!important;}



#demo-table-content_department{border:1px solid #f1f1f1; }

#demo-table-content_department_office{border:1px solid #eeeeee;}
p {

    font-weight: normal;
    font-size: 13px;
}
#content li {
    font-size: 13px;
    font-weight: normal;
    list-style-type: disc;
}
iframe{
    background: none repeat scroll 0 0 #eee;
    border: 2px solid #ccc;
    padding: 10px 15px;
}
</style>

<?php 

$json = file_get_contents('https://api.greenhouse.io/v1/boards/c1consulting/embed/departments'); // this WILL do an http request for you

$data = json_decode($json,TRUE);

//echo "<pre>";print_r($data);

?>

<div class="container">



<br><br>

<div class="section-title text-center">

<h2>Current Openings</h2>

<hr>



<p></p>



</div>





<div id="tabs_career_title" class="col-xs-12 col-sm-3 col-md-3">

          <ul>

  <?php foreach ($data['departments'] as $key => $value) {

    $result[] = $value['name'];



if($value['id'] != 0){ ?>

<li class="tbl <?php echo ($value['id']==7480?' active ':'');?>" id="<?php echo $value['id']; ?>"><a href="<?php echo $value['id']; ?>"><?php if(str_replace(' ','',$value['name'])==str_replace(' ','','No Department')){echo "General";}else{ echo $value['name'];} ?></a></li>

    <?php } } ?>

          </ul>

      </div>




         <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<?php if(!isset($_GET['job'])){?>

        <script type="text/javascript">

        $(document).ready(function() {





 jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/departmentData.php?id=7480",

                    async:true,

                  // dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {
            
                            

         jQuery("#demo-table-content_department").html(data);

	

    }

            });


            $("a").click(function(event) {

               

              var href = $(this).attr('href');
		
              jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/departmentData.php?id="+href,

                    async:true,

                   //dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {

         jQuery("#demo-table-content_department").html(data);

jQuery(".tbl").removeClass('active');


jQuery("#"+href).addClass('active');


    }

            });

                event.preventDefault();

            });
//open job


        });

        </script>

<div id="demo-table-content_department" class="col-xs-12 col-sm-3 col-md-9 well-lg" name="demo-table-content_department"></div> 
<?php } else {
?>
<script type="text/javascript">

        $(document).ready(function() {

            $("a").click(function(event) {

               

              var href = $(this).attr('href');
	
              jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/departmentData.php?id="+href,

                    async:true,

                   //dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {

         jQuery("#demo-table-content_department").html(data);

jQuery(".tbl").removeClass('active');


jQuery("#"+href).addClass('active');


    }

            });

                event.preventDefault();

            });
//open job


        });

        </script>

<div id="demo-table-content_department" class="col-xs-12 col-sm-3 col-md-9 well-lg" name="demo-table-content_department">
<iframe id="idIframe" width="800" height="800"  src="https://boards.greenhouse.io/c1consulting/jobs/<?php echo $_GET['job']; ?>"></iframe>
</div> 
<?php } ?>





<div style="clear:both"></div>


<br><br>
<!-- 
<div class="section-title text-center">

<h6>Jobs by Office</h6>



<hr>



<p></p>



</div>









<?php 

$json = file_get_contents('https://api.greenhouse.io/v1/boards/c1consulting/embed/offices'); // this WILL do an http request for you

$data_office = json_decode($json,TRUE);

echo "<pre>";print_r($data);

?>



<div id="tabs_career_title_office" class="col-xs-12 col-sm-3 col-md-3">

          <ul>

   <?php foreach ($data_office['offices'] as $key => $value) {

    

 ?>

     <li class="tbl2 <?php echo ($value['id']==7480?' active ':'');?>" id="<?php echo $value['id']; ?>"><a href="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>

   

    <?php } ?>

          </ul>

      </div>

   <title>Jquery Test</title>

         <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

        <script type="text/javascript">

        $(document).ready(function() {







 jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/officeData.php?id=7480",

                    async:true,

                  // dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {

         jQuery("#demo-table-content_department_office").html(data);



	

    }

            });

             

           





            $("a").click(function(event) {

               

              var href_office = $(this).attr('href');

              jQuery.ajax({

                    method: 'GET',

                    url: "http://c1consulting.com/officeData.php?id="+href_office,

                    async:true,

                  // dataType : 'jsonp',   //you may use jsonp for cross origin request

                   crossDomain:true,

        success: function(data) {

         jQuery("#demo-table-content_department_office").html(data);

jQuery(".tbl2").removeClass('active');



jQuery("#"+href_office).addClass('active');



	

    }

            });

                event.preventDefault();

            });

        });

        </script>

   





<div id="demo-table-content_department_office"  class="col-xs-12 col-sm-3 col-md-9 well-lg" name="demo-table-content_department_office"></div>

<p>&nbsp;</p>

<div style="clear:both"></div>

-->

<?php //--------------------------------------------------------------- ?>

<br>

<br>

<br>



</div>



<?php get_footer(); ?>
