<style>
body{ font-family:"Helvetica"; }
a{ font-size:16px; color:#2975CA; text-decoration:none; }
a:hover{ text-decoration:underline; }
span{ font-size:13px; }
#board_title_heading{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;}

</style>
<?php 
/*
Template Name: DepartmentApi

*/
?>
<?php 
$json = file_get_contents('https://api.greenhouse.io/v1/boards/c1consulting/embed/departments'); // this WILL do an http request for you
$data = json_decode($json,TRUE);
//echo "<pre>";print_r($data);
?>
<h1 id="board_title_heading">Current Job Openings at C1</h1>
<select name="departments" id="departments">
    
    <option value="0">---------select department-----------</option>
    <?php foreach ($data['departments'] as $key => $value) {
    $result[] = $value['name'];

 ?>
     
    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
    <?php } ?>
    
    
</select>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
    
  jQuery("#departments").change(function(){
      
     var departments_id = jQuery("#departments").val();
      
       jQuery.ajax({
                    method: 'GET',
                    url: "http://c1consulting.com/departmentData.php?id="+departments_id,
                    async:true,
                  // dataType : 'jsonp',   //you may use jsonp for cross origin request
                   crossDomain:true,
        success: function(data) {
         jQuery("#demo-table-content_department").html(data);

	
    }
            });
   })
    
})

</script>
<div id="demo-table-content_department" name="demo-table-content_department"></div>


