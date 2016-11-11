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

$data =  file_get_contents("https://api.greenhouse.io/v1/boards/c1consulting/embed/job?id=".$_GET['id']);
$departmentData=  json_decode($data, TRUE);
//echo "<pre>";print_r($departmentData);

if(is_array($departmentData)){  ?>

<div id="header">
        <a href="https://boards.greenhouse.io/c1consulting/jobs/<?php echo $_GET['id']; ?>#app" id="apply_button" target="_blank" style='padding: 4px 20px;
    color: #FFF;    background-color: #74A24B;    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#8CC658), to(#74A24B));    background-image: -webkit-linear-gradient(top, #8CC658, #74A24B);    background-image: -moz-linear-gradient(top, #8CC658, #74A24B);    background-image: -ms-linear-gradient(top, #8CC658, #74A24B);    background-image: -o-linear-gradient(top, #8CC658, #74A24B);    filter: progid:DXImageTransform.Microsoft.Gradient(startColorstr="#FF8CC658", endColorstr="#FF74A24B");    -webkit-border-radius: 3px;    -moz-border-radius: 3px;    border-radius: 3px;    float: right;' class="button">
          Apply Now
        </a>

      <h1 class="app-title" style="clear: both;"><?php echo $departmentData['title']; ?></h1>
      <span class="company-name">
        at C1
      </span>

      

      <div class="location">
        <?php echo $departmentData['location']['name']; ?>
      </div>
</div>
<div id="content">
<h1 class="app-title"><?php echo html_entity_decode($departmentData['content']); ?>
</div>

<?php } ?>
