<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-rexiao"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-rexiao" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"请填写标题";

$zdy_pic= explode("#",$_MODULE['zdy_pic']);

//echo $ids=$_MODULE['items'];
$categoryId=$_MODULE['cates'];
$items=getItems($_MODULE['items'], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num = "8", $itemData = $_MODULE['select_type'] );
foreach ($items as $k=> $item) {
	//echo $item['title'];
	if(is_array($zdy_pic)){
		if($zdy_pic[$k]){ $items[$k][pic400]=$zdy_pic[$k];}
	}
}
$more_url=$_MODULE['more_url'] ? $_MODULE['more_url'] : "#";


?>


<div class="type950">
	<div class="mod hdtype<?php echo $_MODULE['title_type']?> tgbd-top-bd clear f_st">

	<?php if ($_MODULE['title_type']!=0){?>
		<div class="tghd" style=""><div class="tghd-bg2" style="height:100%;"><h3 style=""><span style=""><?php echo $title_txt;?></span></h3></div>
		<?php if(!empty($_MODULE['more_show'])){?>
		<a class="more" href="<?php echo $more_url?>" target="_blank" style=""></a><?php }?>

	</div>
		<?php }?>	
				<div class="tgbd"><div class="mall-slide J_TWidget d_relative" data-widget-type="Carousel" data-widget-config="{
				'navCls':'mall-nav','contentCls':'mall-con','activeTriggerCls':'nav-act','effect': '<?php echo $_MODULE[effect]?>','easing': '<?php echo $_MODULE[easing]?>','autoplay':<?php echo $_MODULE[autoplay]?>,'interval':<?php echo $_MODULE[interval]?>,'duration':<?php echo $_MODULE[duration]?>,'prevBtnCls':'mall-prev','nextBtnCls':'mall-next' }">
					<div class="mall-nav-box">
						 <ul class="mall-nav clear">
						 	<?php foreach ($items as $k=> $item) {?>
								<li class="l<?php echo $k%2 ?>  <?php if ($k==0) echo "nav-act";?> "><div class="spic-box" style=""><a class="tg-pic-bg" style="background-image:url(<?php echo $item[pic145]?>);" href="<?php echo $item['url'] ?>" target="_blank"></a></div>
													<div class="infobox">
														<div class="pricebox clear"><span class="price" style="">&yen;<em><?php echo  number_format($item[discountPrice],$_MODULE[jinpinzs_pricexshu])?></em><?php if ($_MODULE[jinpinzs_yuanjia]){?>  <i>原价：<?php echo  number_format($item[price],$_MODULE[jinpinzs_pricexshu])?></i><?php }?></span></div>
														<div class="desc show_sales">
															<a href="<?php echo $item['url'] ?>" title="<?php echo $item['title'] ?>" target="_blank"><?php echo $item[title]?></a>
															<?php if ($_MODULE['jinpinzs_xiaoliang']){?>
															<span class="sales">最近售出:<b><?php echo $item['soldCount'] ?></b>件</span><span class="collect">收藏指数:<b><?php echo $item['collectedCount'];?></b>人</span>
															<?php }?>

														</div>
														<div class="tg-btnbox show_share show_sc show_like">
															<?php if ($_MODULE['jinpinzs_shouc']){?>
															<a style="" class="tg-btn sc J_TokenSign" target="_blank" href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $item['id'] ?>&amp;itemtype=1" title="收藏宝贝"></a>
															<?php }?>
															<?php if ($_MODULE['jinpinzs_fenxiang']){?>
															<span class="tg-btn share  sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-text" style="" data-sharebtn="{&quot;type&quot;:&quot;item&quot;,&quot;key&quot;:&quot;<?php echo $item['id'] ?>&quot;,&quot;client_id&quot;:&quot;68&quot;,&quot;pic&quot;:&quot;&quot;,&quot;comment&quot;:&quot;<?php echo $item['title'] ?>&quot;,&quot;skinType&quot;:&quot;2&quot;}" title="点击分享宝贝"></span>
															<?php }?>
															<?php if ($_MODULE['jinpinzs_xihuan']){?>
															<div class="sns-widget" data-like="{'skinType':2, 'type':2, 'key':'<?=$item['id']?>'}"></div>
															<?php }?>

														</div>
												</div>
											</li>
							<?php }?>
					   </ul>									   			
	 				</div>
				   <div class="mall-content" style="">
					   <div class="mall-con-box">
							   <div class="mall-con" >
							   		<?php foreach ($items as $k=> $item) {?>
										<div class="item ks-switchable-panel-internal584" style="display: block; float: left;">
												<div class="bpic-box"><a class="tg-pic-bg" style="background-image:url(<?php echo $item[pic400]?>);" href="<?php echo $item['url'] ?>" target="_blank"> </a></div>
										</div>
									<?php }?>
							   </div>
						</div>
					</div>
					<div class="pages">
						<span title="上一个宝贝" class="mall-prev"></span>			
						<span title="下一个宝贝" class="mall-next"></span>		
					</div>
				</div>
	</div></div>
	</div>
</div>
