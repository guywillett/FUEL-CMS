<?php
ob_start();
ob_start ("ob_gzhandler");

?>.clear{clear:both;height:0;line-height:0;font-size:0;}.left{float:left;}.right{float:right;}.img_left{float:left;margin:0 15px 15px 0;}.img_right{float:right;margin:0 0px 15px 15px;}.search_highlight{background-color:#ff9;}div.post{padding-bottom:20px;}div.post_date{margin-bottom:10px;}div.post_meta .categories{text-transform:uppercase;}div.post_content ul{margin-bottom:20px;}div.post_content p,div.post_content li{line-height:22px;}div.post_content li{list-style:disc;margin-left:20px;margin-bottom:5px;}div.post_content img{float:left;display:block;margin:0 5px 10px 0;}div.post_meta{padding:6px 0 4px 0;}div.post_author_date{margin-bottom:10px;font-weight:bold;}div.post_author_date a{color:#5d87a1;}div.comments .child{margin-left:50px;}div.comment{border:1px solid #eee;background-color:#fbfbfb;padding:10px;margin-bottom:10px;}div.comment_meta cite{font-weight:bold;font-size:10px;}div.comment_form{margin-top:30px;}div.comment_form .actions{margin-top:10px;}div.comment_form div.required{margin-top:10px;}div#recent_posts{padding:8px 25px 28px 25px;}div#right{float:right;width:210px;margin-left:20px;}.blog_block{padding:15px 0px;}.blog_block ul{margin-bottom:0;}input#q{width:150px;height:16px;position:relative;top:-1px;}input.search_btn{background-color:#eee;height:22px;line-height:12px;margin-top:1px;}.success{background-color:#cc0;padding:2px 5px;}.error{background-color:#c30;color:#fff;padding:2px 5px;margin:0;}span.error_highlight input,span.error_highlight textarea,span.error_highlight select{border:2px solid #c30;}.post_unpublished_wrapper{position:relative;height:10px;}.post_unpublished{position:absolute;top:-25px;left:0px;right:0px;background-color:#c30;color:#fff;padding:5px;z-index:100000;}<?php
ob_end_flush();
header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$offset = 3600;
$exp = "Expires: ".gmdate("D, d M Y H:i:s",time() + $offset)." GMT";
header($exp);
$size = "Content-Length: ".ob_get_length();
header($size);
ob_end_flush();
?>
