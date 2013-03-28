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
    <?php foreach($this->data->results as  $rs) {  ?>
       <?php if($rs->item->item_type==1) {  ?>
	    <div id="about">
		     <h3><?php echo $rs->item->item_name; ?></h3>
  
			 <p><?php echo $rs->introduction->introduction_content; ?></p>
	    </div>
       <?php } ?>
                
        <?php if($rs->item->item_type==2) {  ?>
        <div id="news">
		    <h3><?php echo $rs->item->item_name; ?></h3>
			<ul>
			    <?php if(count($rs->news_list) > 0) {  ?> 
			    <?php foreach($rs->news_list as $news) {  ?>
			    <li>
			    <span style="float: left;"><a href="index.php?NewsAction/web_news_show/item_id/<?php echo $rs->item->item_id; ?>/news_id/<?php echo $news->news_id; ?>"><?php echo $news->title; ?></a></span>
				<span style="float: right;"><?php echo $news->issue_time; ?></span>
			    </li>
			    <!-- 
				<li><a href="index.php?news_action/web_news_show/item_id/<?php echo $rs->item->item_id; ?>/news_id/<?php echo $news->news_id; ?>"><?php echo $news->title; ?></a></li>	
			     -->
				<?php } ?>
				<?php } ?>			
			</ul>
		 </div>
		<?php } ?>
                
        <?php if($rs->item->item_type==3) {  ?>
        <div id="pruduct">
		     <h3><?php echo $rs->item->item_name; ?></h3>
              <ul>
                <?php if(count($rs->product_list) > 0) {  ?> 
                <?php foreach($rs->product_list as $product) {  ?>
                <li><a href="index.php?ProductAction/web_product_show/item_id/<?php echo $rs->item->item_id; ?>/product_id/<?php echo $product->product_id; ?>"><img src="<?php echo $this->data->base_url; ?><?php echo $product->icon_url; ?>" alt="<?php echo $product->product_name; ?>" /><strong><?php echo $product->product_name; ?></strong></a></li>
                <?php } ?>
                <?php } ?>
              </ul>  
		</div>
        <?php } ?>
        
        <?php if($rs->item->item_type==4) {  ?>
        <div id="subject">
		     <h3><?php echo $rs->item->item_name; ?></h3>
              <ul>
                <?php if(count($rs->subject_list) > 0) {  ?> 
                <?php foreach($rs->subject_list as $subject) {  ?>
                <li>
                <span style="float: left;"><a href="<?php echo $this->data->base_url; ?>/index.php?PostAction/web_post_list/item_id/<?php echo $rs->item->item_id; ?>/subject_id/<?php echo $subject->subject_id; ?>/current_page/1"><?php echo $subject->subject_topic; ?></a></span>
                <span style="float: right;"><?php echo $subject->subject_issue_time; ?></span>
                </li>
                <?php } ?>
                <?php } ?>
              </ul>  
		</div>
        <?php } ?>
                
        <?php if($rs->item->item_type ==5) {  ?>
         <div id="news">
		    <h3><?php echo $rs->item->item_name; ?></h3>
			<ul>
			  <li>联系人： <?php echo $rs->merchant->linkman; ?></li>
              <li>联系电话：<?php echo $rs->merchant->telephone; ?></li>
              <li>地址：<?php echo $rs->merchant->address; ?></li>		
			</ul>
		 </div>
        <?php } ?>
     <?php } ?>		
	</div>
  </div>
  <?php echo $this->output("web_footer.html"); ?>
</div>
</body>
</html>
