<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title><?php echo $this->data->merchant->merchant_name; ?></title>
<link rel="stylesheet" style="text/css"
	href="<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/css/web.css" />
</head>
<body
	style="background: #FFF url(<?php echo $this->data->base_url; ?>/public/web/template/<?php echo $this->data->merchant->web_template; ?>/images/body_bg.jpg) repeat-x;">
	<div id="home">
		<?php echo $this->output("web_header.html"); ?>
		<div id="content">
			<div id="left_bar">
				<div id="help"><?php echo $this->output("web_contact_us.html"); ?>
					<?php echo $this->output("web_help.html"); ?></div>
			</div>

			<div id="contenter">
				<div id="intro">
					<h3><?php echo $this->data->item->item_name; ?></h3>

					<ul
						style="list-style: none; display: block; margin: 0; padding: 0;">
						<table>
							<?php if(!empty($_SESSION["USER_ID"])) {  ?>
							<tr>
								<td colspan="4"><a
									href="<?php echo $this->data->base_url; ?>/index.php?SubjectAction/display_web_subject_publish_ui/item_id/<?php echo $this->data->item->item_id; ?>">发帖</a>
								</td>
							</tr>
							<?php } ?>
							<tr>
								<td>主题</td>
								<td>作者</td>
								<td>回帖数</td>
								<td>发布时间</td>
							</tr>
							<?php if(count($this->data->subject_list) > 0) {  ?> 
							<?php foreach($this->data->subject_list as $subject) {  ?>
							<tr>
								<td><a
									href="<?php echo $this->data->base_url; ?>/index.php?PostAction/web_post_list/item_id/<?php echo $this->data->item->item_id; ?>/subject_id/<?php echo $subject->subject_id; ?>/current_page/1"><?php echo $subject->subject_topic; ?></a></td>
								<td><?php echo $subject->user_name; ?></td>
								<td><?php echo $subject->subject_reply_num; ?></td>
								<td><?php echo $subject->subject_issue_time; ?></td>
							</tr>
							<?php } ?> 
							<?php } ?>
							<tr>
							</tr>
						</table>
					</ul>
					<ul
						style="list-style: none; display: block; margin: 0; padding: 0;">
						<li style="line-height: 20px;">
							共<?php echo $this->data->page->row_num; ?>条记录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							第<?php echo $this->data->page->current_page; ?>页/共<?php echo $this->data->page->total_page; ?>页
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if($this->data->page->current_page > 1) {  ?> <a
							href="<?php echo $this->data->base_url; ?>/index.php?SubjectAction/web_subject_list/item_id/<?php echo $this->data->item->item_id; ?>/current_page/1">首页</a>
							<a
							href="<?php echo $this->data->base_url; ?>/index.php?SubjectAction/web_subject_list/item_id/<?php echo $this->data->item->item_id; ?>/current_page/<?php echo $this->data->page->current_page-1; ?>">上一页</a>
							<?php } ?> <?php if($this->data->page->current_page != $this->data->page->total_page) {  ?> <a
							href="<?php echo $this->data->base_url; ?>/index.php?SubjectAction/web_subject_list/item_id/<?php echo $this->data->item->item_id; ?>/current_page/<?php echo $this->data->page->current_page+1; ?>">下一页</a>
							<a
							href="<?php echo $this->data->base_url; ?>/index.php?SubjectAction/web_subject_list/item_id/<?php echo $this->data->item->item_id; ?>/current_page/<?php echo $this->data->page->total_page; ?>">尾页</a>
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
