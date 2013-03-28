  <div id="header">
   <h1><img src="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/images/logo.gif" /></h1>
<!-- nav-->
    <div id="main_nav">
      <ul>
        <li class="nav_home"><a href="<?php echo $this->data->base_url; ?>/">首页</a></li>
         <!-- list start -->
    <?php foreach($this->data->menus as  $it) {  ?>
        <?php if($it->item_type == 0) {  ?>
	    <li><a href="index.php?ItemAction/web_sub_item/item_id/<?php echo $it->item_id; ?>/item_up_id/<?php echo $it->item_up_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
	    <?php if($it->item_type == 1) {  ?>
	    <li><a href="index.php?IntroductionAction/web_introduction_show/item_id/<?php echo $it->item_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
	    <?php if($it->item_type == 2) {  ?>
	    <li><a href="index.php?NewsAction/web_news_list/current_page/1/item_id/<?php echo $it->item_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
	    <?php if($it->item_type == 3) {  ?>
	    <li><a href="index.php?ProductAction/web_product_list/item_id/<?php echo $it->item_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
	    <?php if($it->item_type == 4) {  ?>
	    <li><a href="index.php?SubjectAction/web_subject_list/item_id/<?php echo $it->item_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
	    <?php if($it->item_type == 5) {  ?>
	    <li><a href="index.php?ContactUsAction/web_contact_us_show/item_id/<?php echo $it->item_id; ?>"><?php echo $it->item_name; ?></a></li>
	    <?php } ?>
    <?php } ?>
   <!-- list end -->
      </ul>
    </div>
	<!-- ad-->
	<div id="ad">
	    <a href="#"><img src="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/images/ad_banner1.jpg" /></a>
	</div>
  </div>