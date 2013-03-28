<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $this->data->merchant->merchant_name; ?></title>
<link rel="stylesheet" style="text/css" href="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/css/web.css" />
</head>
<body style="background:#FFF url(<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/images/body_bg.jpg) repeat-x;">
<div id="home">
  <?php echo $this->output("web_header.html"); ?>
  <div id="content">
    <div id="left_bar">
       <div id="help">
	     <?php echo $this->output("web_contact_us.html"); ?>
		 <?php echo $this->output("web_help.html"); ?>
	   </div>
	</div> 
		 
    <div id="contenter">
       <div id="about">
		     <h3><?php echo $this->data->item->item_name; ?></h3>
			 <p><img src="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/images/about_logo.gif" alt="<?php echo $this->data->item->item_name; ?>" title="" /> <?php echo $this->data->introduction->introduction_content; ?></p>
	    </div>
	</div>
	
  </div>
    <?php echo $this->output("web_footer.html"); ?>
</div>
</body>
</html>
  