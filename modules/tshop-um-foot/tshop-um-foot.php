<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-foot"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-foot" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
 $show_select= explode("@_@",  $_MODULE['show_select']);

?>
<div>
				<div class="mainbox">
							<div class="mod f_st">
							<div class="mod_foot  clear" style="">
									<?php if ($_MODULE['guide_on']){?>	<div class="ft_guide d_blcok ft_guide_def"><?php if($_MODULE['guide']){?><img src="<?=$_MODULE['guide']?>"><?php }?></div><?php }?>
									<div class="btb" style="">
										<div class="r2" style="">
											<div class="serverbox">
												<span class="ww-title"><?=$_MODULE['cus_t1']?></span>
												<?php $cus_acn1= explode("#", $_MODULE['cus_acn1']) ; $cus_acc_1= explode("#", $_MODULE['cus_acc_1']) ; foreach ($cus_acn1 as $key => $v) {?>


												<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$cus_acc_1[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$cus_acc_1[$key]?>&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息"></a><?=$v?>

												<?php }?>

												<span class="ww-title"><?=$_MODULE['cus_t2']?></span>
												<?php $cus_acn2= explode("#", $_MODULE['cus_acn2']) ; $cus_acc_2= explode("#", $_MODULE['cus_acc_2']) ; foreach ($cus_acn2 as $key => $v) {?>

												
												<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$cus_acc_2[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$cus_acc_2[$key]?>&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息"></a><?=$v?>

												<?php }?>
												<span class="work_time"><?=$_MODULE['work_time']?></span>				
											</div>
										</div>
										<div class="r3" style="">
											<div class="about show">
												<ul class="about-ul">
													<li class="l1" style=""><h5 style=""><?=$_MODULE['main_t1']?></h5><div class="txt"><?=$_MODULE['main_c1']?></div></li><li class="l2" style=""><h5 style=""><?=$_MODULE['main_t2']?></h5><div class="txt"><?=$_MODULE['main_c2']?></div></li><li class="l3" style=""><h5 style=""><?=$_MODULE['main_t3']?></h5><div class="txt"><?=$_MODULE['main_c3']?></div></li><li class="l4" style=""><h5 style=""><?=$_MODULE['main_t4']?></h5><div class="txt"><?=$_MODULE['main_c4']?></div></li>
												</ul>
											</div>
										</div>
										<div class="r1 nav clear" style="">
											<?php if(in_array("1", $show_select) ){?>

											<div class="sform "><form class="focus" name="SearchForm" action="http://shop<?php echo  $_shop->id?>.taobao.com/?scene=taobao_shop" method="post" target="_blank">
													<ul>
														<input type="hidden" name="userId" value="">
														<input type="hidden" name="shopId" value="<?=$_shop->id?>">
														<input type="hidden" name="view_type" value="">
														<input type="hidden" name="order_type" value="">
														<input type="hidden" name="search" value="y">
														<li class="keyword clear">
															<input type="text" size="18" name="keyword" class="text" value="<?=$_MODULE['s_txt']?>" title="输入关键字"><button type="submit" class="search-btn" title="搜店内宝贝"></button>
														</li>
													</ul>
												</form></div>
												<?php }?>
												<?php if(in_array("2", $show_select) ){?>


												<div class="key-box">
													<a href="<?php echo $shop->domainName;?>/search.htm?search=y" target="_blank" style="">查看所有宝贝<span style="font-family:'宋体';">&gt;&gt;</span></a><span></span>
 													<a href="<?php echo $shop->domainName;?>/category.htm?search=y&orderType=newOn_desc" target="_blank" style="">按新品</a><span></span>
											 		<a href="<?php echo $shop->domainName;?>/search.htm?search=y&orderType=hotsell_desc" target="_blank" style="">按销量</a><span></span>
											 		<a href="<?php echo $shop->domainName;?>/search.htm?search=y&orderType=price_asc" target="_blank" style="">按价格</a><span></span>
											 		<a href="<?php echo $shop->domainName;?>/search.htm?search=y&orderType=hotkeep_desc" target="_blank" style="">按收藏</a><span></span>
											 	</div>
											 	<?php }?>

											 	<?php if(in_array("3", $show_select) ){?><a href="#" class="navbtn ns1" target="_self" style=""></a><?php }?>
											 	<?php if(in_array("4", $show_select) ){?>
											 	<?php if($_MODULE['sc_type']==0){?>
											 	<a class="ns2 navbtn J_TokenSign" target="_blank" href="http://favorite.taobao.com/popup/add_collection.htm?id=<?=$_shop->id?>&amp;itemid=<?=$_shop->id?>&amp;itemtype=0&amp;ownerid=7ab6506c0ac6d4d54c99e8ac2b6c943c&amp;itemtype=0&amp;scjjc=2&amp;ownerid=&amp;_tb_token_=MzNRPoTgKhBiBm7"></a><?php }?><?php if($_MODULE['sc_type']==1){?>
											 	<span style="" class="sns-widget navbtn ns2 sns-widget-ui sns-follow-coin" data-followshop="{&quot;type&quot;:2,&quot;shopid&quot;:&quot;47416673&quot;}"></span><?php }?>


											 	<?php }?>
											 	<?php if(in_array("5", $show_select) ){?>
											 	<span class="navbtn ns3 sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-text" style="" title="分享本店到社交网站" data-sharebtn="{&quot;type&quot;:&quot;shop&quot;,&quot;key&quot;:&quot;<?=$_shop->id?>&quot;,&quot;client_id&quot;:&quot;68&quot;,&quot;pic&quot;:&quot;&quot;,&quot;comment&quot;:&quot;这是一个美丽的店&quot;,&quot;skinType&quot;:&quot;2&quot;}"></span>
											 	<?php }?>

											 </div>
									</div>
							</div>	
							</div>
						</div>
			</div>
</div>
