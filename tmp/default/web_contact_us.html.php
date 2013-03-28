
<div class="help">
<h3>用户登录</h3>

<ul>
<?php if(empty($_SESSION["USER_ID"])) {  ?>
    <li> <?php echo $this->output("web_user_login.html"); ?></li>
<?php } ?>

<?php if(!empty($_SESSION["USER_ID"])) {  ?>
<!-- 
    <li> <?php echo $_SESSION["USER_ID"]; ?></li>
 -->
    <li> 登录用户＄1�7 <?php echo $_SESSION["USER_NAME"]; ?></li>
    <li><a href="<?php echo $this->data->base_url; ?>/index.php?UserAction/web_logout">逄1�7凄1�7/a></li>
<?php } ?>
</ul>
</div>


<?php if(isset($this->data->pic_news_list) && count($this->data->pic_news_list)> 0) {  ?>
<div class="help">
<h3>新闻快讯</h3>
		     <script type="text/javascript">
						<!-- 
						var focus_width=270;
						var focus_height=200;
						var text_height=0;
						var swf_height = focus_height+text_height;
						var pics = "";
						var links = "";
						var texts = "";
						
					<?php foreach($this->data->pic_news_list as  $i=> $news) {  ?>
						pics += "<?php echo $this->data->base_url; ?><?php echo $news->pic_url; ?>";
						links += "index.php?NewsAction/web_news_show/item_id/<?php echo $news->item_id; ?>/news_id/<?php echo $news->news_id; ?>";
						texts += "";
						
					  <?php if(count($this->data->pic_news_list) != $i+1) {  ?>
						pics += "|";
						links += "|";
						texts += "|";			
					  <?php } ?>
					<?php } ?>
						document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
						document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/flash/focus.swf"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF">');
						document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
						document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
						document.write('<embed src="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/flash/focus.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" ?bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');  document.write('</object>');
						//-->
						</script>
		     </div>
<?php } ?>
		    
<div class="help">
<h3>联系我们</h3>

<ul>
    <li>联系人： <?php echo $this->data->merchant->linkman; ?></li>
    <li>联系电话：<?php echo $this->data->merchant->telephone; ?></li>
    <li>地址：<?php echo $this->data->merchant->address; ?></li>
</ul>
</div>
