<?php 

/*

Template Name: Join Us



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

<div class="panel-grid" id="pg-2660-0"><div class="siteorigin-panels-stretch panel-row-style" style="margin-left: 0px; margin-right: 0px; padding-left: 0px; padding-right: 0px; border-left-width: 0px; border-right-width: 0px; background-color: rgb(161, 53, 70);" data-stretch-type="container"><div class="container"><div class="panel-grid-cell" id="pgc-2660-0-0"><div class="so-panel widget widget_sow-purchase panel-first-child panel-last-child" id="panel-2660-0-0-0"><div style="padding: 25px;" class="panel-widget-style"><div class="so-widget-sow-purchase so-widget-sow-purchase-base"> 
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="taglinemessage">
                        <div class="pull-left">
                        <h2>Opportunities at C1</h2>
                        <p><strong><font color="#ffffff">Review our current job list and let us know if you’re a strong candidate</font></strong></p>
                         </div>
                         <a href="#panel-2142-1-0-0" class="pull-right btn btn-lg border-radius btn-transparent">APPLY TODAY</a>
                    </div><!-- end welcome -->
                </div><!-- end col -->
            </div><!-- end row -->
       </div></div></div></div></div></div></div>

<div class="container">
<div class="so-panel widget widget_sow-title panel-first-child" id="panel-2142-1-0-0"><div class="so-widget-sow-title so-widget-sow-title-base" style="    padding-top: 90px">    <div class="section-title text-left">                            <h3>Grow With Us...</h3>
                                                
            <hr style="margin: 30px 0;">
           
                        <p></p>
    
       </div>
   
</div></div>
<div class="so-panel widget widget_sow-title" id="panel-2142-1-0-1"><div class="so-widget-sow-title so-widget-sow-title-base">     <div class="text-left">                            <h5>OPEN POSITIONS</h5>
                                                <p>Please click anywhere in the grey box below to view our open positions (do not click the + sign)</p>
    
       </div>
   
</div></div>

<div class="so-panel widget widget_sow-accordions" id="panel-2142-1-0-2"><div class="so-widget-sow-accordions so-widget-sow-accordions-base"><div class="wow none animated" style="visibility: visible;">
    <div class="accordion-toggle-1">
        <div class="panel-group" id="accordion">
            
                                        <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse427698881" aria-expanded="true">
                                

                                
                                <h3>Apply Job by Department</h3>
                            </a><i class="indicator pull-right icon_minus-06"></i>
                        </div>
                    </div>
                   </div> 
                    <div id="collapse427698881" class="panel-collapse collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <p></p>
<div id="tabs_career_title" class="col-xs-12 col-sm-3 col-md-3">

          <ul>

  <?php foreach ($data['departments'] as $key => $value) {

    $result[] = $value['name'];



if($value['id'] != 0){ ?>

<li class="tbl <?php echo ($value['id']==7480?' active ':'');?>" id="<?php echo $value['id']; ?>"><a href="<?php echo $value['id']; ?>"><?php if(str_replace(' ','',$value['name'])==str_replace(' ','','No Department')){echo "General";}else{ echo $value['name'];} ?></a></li>

    <?php } } ?>

          </ul>

      </div>
<div id="demo-table-content_department" class="col-xs-12 col-sm-3 col-md-9 well-lg" name="demo-table-content_department"></div> 
<p></p>
                        </div>
                    </div>                    
                </div>                          
             
        </div>
    </div><!-- accordion -->
</div><!-- end col -->
</div></div>





         <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

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


            $(".tbl a").click(function(event) {

               

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
<div style="clear:both"></div>
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>


                <?php the_content(); ?>


      

    <?php endwhile; ?>

<?php else : ?>

    <?php get_template_part('partials/nothing-found'); ?>

<?php endif; ?>



<?php get_footer(); ?>
