<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>

	<div id="imaginary_container"> 
		<form class="form-search" id="searchform">
	    <div class="input-group stylish-input-group">
	        
				<input type="text"  class="form-control" name="s" id="s" placeholder="<?php _e('Search blog...', 'kerna'); ?>" />        
		        <span class="input-group-addon">
		        
		            <button type="submit" id="searchsubmit">
		                <span class="glyphicon glyphicon-search"></span>
		            </button>  
		        </span>
	        
	    </div>
	    </form>
	</div>
