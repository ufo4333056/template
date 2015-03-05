<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-fall"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"请填写标题";
 
$zdy_pic= explode("#",$_MODULE['zdy_pic']);
$pbtn_show =explode("@_@",$_MODULE['pbtn_show']);


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
<div class="tb-module tshop-um tshop-um-fall" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
	  $sum=array_sum($items) ; if($regionWidth==950) $coll=4;  if($regionWidth==750) $coll=3;   $row= ceil( $sum/$coll);
?>
  <div class=" type<?php echo $regionWidth?>">
    <div class="mod hdtype<?php echo $_MODULE['title_type']?>  clear f_st">
      <div class="b-size-430">
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
		<div class="tgbd clear">
       
               <?php for ($c=0;$c<$coll; $c++) {   $k=rand(0,$row-1)?>
				<div class="coll c<?php echo $c?>"> 
                     <?php for ($r=0 ; $r<$row ;$r++){ $n=$c*$row +$r;?>
                       <div class="picbgbox r<?php echo $r?>">
											       	<div class="pic-bd"><a class="item_hover two-dim-hidden pic-box" href="<?php echo $items[$n]['url']? $items[$n]['url']:"#"?>" target="_blank"><div class="d-picbg d-pic<?php if($_MODULE['item_pic']==999){ if($row!=1 && $k==$r  ){echo 310;}else {echo 210;}}else {echo $_MODULE['item_pic']; }?>" style="background:url(<?php echo $items[$n]['pic310']? $items[$n]['pic310']:"http://gd2.alicdn.com/bao/uploaded/i2/TB1WxLCHXXXXXaOXVXXXXXXXXXX_!!0-item_pic.jpg_400x400.jpg";?>) no-repeat <?php echo $_MODULE['pic_cut']?>;"></div></a></div>
										       		<div class="info desc_on sinfo_on">
										       				<div class="desc"><a href="<?php echo $items[$n]['url']?$items[$n]['url']:"#"?>" title="<?php echo $items[$n]['title']?>" target="_blank"><?php echo $items[$n]['title']?></a></div>
											       			<div class="info-r1 show_sales">
											       				<?php if($_MODULE['sale_show']==1){?>	<span class="sales">已售：<b><?php echo $items[$n]['soldCount']?></b><?php echo $items[$n]['sales_extra']?></span><?php }?>
											       				<?php if($_MODULE['sale_show']==2){?>		<span class="collect">收藏：<b><?php echo $items[$n]['collectedCount']?></b></span><?php }?>
											       					<span class="price-ico price-ico0" style=""><b><?php echo $_MODULE['price_pre']?></b></span><span class="price" style=""><em><?php echo number_format( $items[$n]['discountPrice'],$_MODULE['jinpinzs_pricexshu'])?></em><?php echo $_MODULE['price_uint']?></span>
											       			</div>
															<div class="tg-btnbox show_share show_sc show_like">
																	<?php  if(in_array("show_collect",$pbtn_show)) echo getFav("", $items[$n]['id'], "item", "sc");//收藏
																	 if(in_array("show_share",$pbtn_show)) echo getShare("", $items[$n]['id'], 3, "item", "share tg-btn");//分享
																	 if(in_array("show_like",$pbtn_show))  echo getLike("", $items[$n]['id'], 2, "item", "like tg-btn");//喜欢 ?></div>
										       		</div>
										      </div> 
                     <?php }?>
                                              
                                                </div>
               <?php }?>
                                              
                                      
		</div>
	</div>
</div>

</div>
</div>