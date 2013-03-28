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
       <div id="intro">
		   <h3><?php echo $this->data->item->item_name; ?></h3>
		     
		   <ul style="list-style: none; display: block; margin: 0; padding: 0;">
		       <?php if(count($this->data->news_list) > 0) {  ?> 
		       <?php foreach($this->data->news_list as $news) {  ?>
				<li style="line-height: 20px;">
				    <span style="float: left;">
					 <a href="index.php?NewsAction/web_news_show/item_id/<?php echo $this->data->item->item_id; ?>/news_id/<?php echo $news->news_id; ?>"><?php echo $news->title; ?></a>
				    </span>
				    <span style="float: right;"><?php echo $news->issue_time; ?></span><br/>
				</li>
				<?php } ?>
				<?php } ?>
			</ul>
			<ul style="list-style: none; display: block; margin: 0; padding: 0;">
				<li style="line-height: 20px;">
					共<?php echo $this->data->page->row_num; ?>条记录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;						       
					第<?php echo $this->data->page->current_page; ?>页/共<?php echo $this->data->page->total_page; ?>页
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php if($this->data->page->current_page > 1) {  ?>
					<a href="index.php?NewsAction/web_news_list/current_page/1/item_id/<?php echo $this->data->item->item_id; ?>">首页</a>
					<a href="index.php?NewsAction/web_news_list/current_page/<?php echo $this->data->page->current_page-1; ?>/item_id/<?php echo $this->data->item->item_id; ?>">上一项</a>
					<?php } ?>
					<?php if($this->data->page->current_page != $this->data->page->total_page) {  ?>
					<a href="index.php?NewsAction/web_news_list/current_page/<?php echo $this->data->page->current_page+1; ?>/item_id/<?php echo $this->data->item->item_id; ?>">下一页</a>
					<a href="index.php?NewsAction/web_news_list/current_page/<?php echo $this->data->page->total_page; ?>/item_id/<?php echo $this->data->item->item_id; ?>">尾页</a>
					<?php } ?>
				</li>	
			</ul>
	    </div>
	</div>
	
  </div>
    <?php echo $this->output("web_footer.html"); ?>
</div>
</body>
</html>
  