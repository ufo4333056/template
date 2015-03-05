<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-jp1"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
  $title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"请填写标题";
 $pic_shape=$_MODULE['pic_shape'];
$zdy_pic= explode("#",$_MODULE['zdy_pic']);
$pbtn_show =explode("@_@",$_MODULE['pbtn_show']);
$pic_size=explode(",",$_MODULE['pic_size']);
if ($regionWidth==950) $rw=0;
if ($regionWidth==750) $rw=1;
if ($regionWidth==550) $rw=2;
$pic_size =explode("#",$pic_size[$rw]);
if ($pic_shape) { } else {$pic_size[1]=$pic_size[0]; }

if($pic_size[1]== 220)$size= 220;
if($pic_size[1]== 230)$size= 230;
if($pic_size[1]== 300)$size= 300;
if($pic_size[1]== 310)$size= 310;
if($pic_size[1]== 360)$size= 360;
if($pic_size[1]== 400)$size= 400;
if($pic_size[1]== 460)$size= 460;
if($pic_size[1]== 570)$size= 570;

//echo $ids=$_MODULE['items'];
$categoryId=$_MODULE['cates'];

$items_cnt= $_MODULE['items_cnt']?$_MODULE['items_cnt']:20;


$items=getItems($_MODULE['items'], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num = $items_cnt , $itemData = $_MODULE['select_type'] );
foreach ($items as $k=> $item) {
	//echo $item['title'];
	if(is_array($zdy_pic)){
		if($zdy_pic[$k]){ $items[$k][pic400]=$zdy_pic[$k];}
	}
}
?>
<div class="tb-module tshop-um tshop-um-jp1" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
?>

<div class="type<?php echo $regionWidth?>">
		<div class="mod hdtype<?php echo $_MODULE['title_type']?>  f_st">
				 <?php if ($_MODULE['title_type']!=0){?>
        <div class="tghd" style="">
          <div class="tghd-bg2" style="height:100%;">
            <h3 style=""><span style=""><?php echo $title_txt;?></span></h3>
          </div>
          <?php if($_MODULE['more_show']){?>
          <a class="more" href="<?php echo $_MODULE['more_url']?$_MODULE['more_url']:"#"?>" target="_blank" style=""></a>
          <?php }?>
        </div>
        <?php }?> 
				<div class="tgbd">
				    	<ul class="tg-pic<?php echo $pic_size[0]?> clear">
                          <?php foreach ($items as $key => $item){?>
                        	<li class="item c-<?php echo $key%$pic_size[2]?> r-2 clear">
											<div class="item-box hover-on">
												<div class="act-bd" style="">
													<a class="tg-pic-bg tg-pic<?php echo $pic_shape;?> tow-dim-hidden" href="<?php echo $item['url']?>" target="_blank" style="background-image:url(<?php echo $item['pic'.$size]?>);background-position:<?php echo $_MODULE['pic_cut']?>;"></a>
													<div class="info desc_on sinfo_on clear">
														<div class="info-r1">
														<a class="desc desc" href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo $item['title']?></a>
															<div class="other-info show_sales">
																<?php if($_MODULE['sale_show']==1){?>   <span class="sales">已售：<b><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span> <?php }?>
                                                 				<?php if($_MODULE['sale_show']==2){?>   <span class="collect">收藏 <b><?php echo $item['collectedCount']?></b>人</span> <?php }?>
															</div>
														</div>
														<div class="clear info-r2 info-lm">															
															<div class="info-l"><span class="price" style=""><?php echo $_MODULE['price_pre']?><em><?php echo number_format( $item['discountPrice'],$_MODULE['jinpinzs_pricexshu'])?></em></span></div>
															<a class="buy-btn" href="<?php echo $item['url']?>" style="" target="_blank"><div class="btn-bd f_yahei" style="">立即购买</div></a>
														</div>
														<div class="tg-btnbox show_share show_sc show_like">
                                                        
                                                        	<?php  if(in_array("show_collect",$pbtn_show)) echo getFav("", $items['id'], "item", "sc");//收藏
																	 if(in_array("show_share",$pbtn_show)) echo getShare("", $items['id'], 3, "item", "share tg-btn");//分享
																	 if(in_array("show_like",$pbtn_show))  echo getLike("", $items['id'], 2, "item", "like tg-btn");//喜欢 ?>
                                                        
                                                        </div>
													</div>
												</div>
											</div>
										</li>
                          <?php }?>           
							</ul>
                            
				</div>
		</div>
	</div>
</div>
