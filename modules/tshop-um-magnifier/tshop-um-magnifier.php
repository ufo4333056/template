<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-magnifier"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>

<div class="tb-module tshop-um tshop-um-magnifier" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
  <?php
/**
 * 开始设计PHP页面
 */
$s_size1=explode(",",$_MODULE['s_size1']);
$b_size1=explode(",",$_MODULE['b_size1']);
$pic_shape=$_MODULE['pic_shape'];
$pic_cut=$_MODULE['pic_cut'];
$pop_pos = $_MODULE['pop_pos'];



$s_size1_w=$s_size1[0];
if ($pic_shape){ $s_size1_h = $s_size1[1];} else { $s_size1_h = $s_size1[0]; }

$b_size1_w=$b_size1[0];
if ($pic_shape){ $b_size1_h = $b_size1[1];} else { $b_size1_h = $b_size1[0]; }

if($pop_pos=="to_down"){$pop_pos_x =($s_size1_w - $b_size1_w)/2;$pop_pos_y=0; }
if($pop_pos=="to_up"){$pop_pos_x =($s_size1_w - $b_size1_w)/2;$pop_pos_y=$s_size1_w - $b_size1_w+34; }
if($pop_pos=="to_right"){$pop_pos_x =($s_size1_w - $b_size1_w)/2;$pop_pos_y=0; }
if($pop_pos=="to_left"){$pop_pos_x =0;$pop_pos_y=($s_size1_h - $b_size1_h)/2; }
if($pop_pos=="to_middle"){$pop_pos_x =($s_size1_w - $b_size1_w)/2;$pop_pos_y=($s_size1_w - $b_size1_w)/2; }

$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"请填写标题";

$zdy_pic= explode("#",$_MODULE['zdy_pic']);

//echo $ids=$_MODULE['items'];
$categoryId=$_MODULE['cates'];
$items=getItems($_MODULE['items'], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num = "20", $itemData = $_MODULE['select_type'] );
foreach ($items as $k=> $item) {
	//echo $item['title'];
	if(is_array($zdy_pic)){
		if($zdy_pic[$k]){ $items[$k][pic400]=$zdy_pic[$k];}
	}
}
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
        <div class="tgbd s-size-<?php echo $s_size1_w?>">
          <ul class="clear pic_shape<?php echo $pic_shape?>">
          <?php foreach ($items as $k=> $item) {?>
          
          
           <?php if ($k <$_MODULE['items_cnt']) {?>
            <li class="item-box  r-0  <?php if ($s_size1_w==220 && $regionWidth==950) { echo "c-".($k+1)%4;}  if ($s_size1_w==170  && $regionWidth==950) { echo "c-".($k+1)%5;}   if ($s_size1_w==220 && $regionWidth==750) { echo "c-".($k+1)%3;}  if ($s_size1_w==170  && $regionWidth==750) { echo "c-".($k+1)%4;}?>">
              <div class="item">
                <div class="tribox tg-pic<?php echo $s_size1_w?>">
                  <div style="zoom:1;"> <a class="tri" target="_blank" href="<?php echo $item['url']?>">
                    <div class="s-pic">
                      <div class="tg-picbg tg-pic<?php echo $s_size1_w?>" style="background-image:url(<?php echo $item['pic'.$s_size1_h]?>);background-position:<?php echo $pic_cut;?>;" title="<?php echo $item['title']?>"></div>
                    </div>
                    <?php if ($_MODULE['magnifier_on']){?>
                    <div class="bigpicbox tg-w<?php echo $b_size1_w;?>" style="top:<?php echo $pop_pos_y?>px;left:<?php echo $pop_pos_x?>px;">
                   <div class="tg-picbg tg-pic<?php echo $b_size1_w;?>" style="background-image:url(<?php echo $item['pic'.$b_size1_h]?>);background-position:<?php echo $pic_cut;?>;"> 
                                <div class="clear info show_sales d_block">
                                  <div class="price" style=""><span>&yen;</span><em><?php echo number_format($item['discountPrice'], $_MODULE['jinpinzs_pricexshu']);?></em></div>
                                  <div class="desc"><span><?php echo $item['title']?></span></div>
                                  <?php if ($_MODULE['sale_show']==1) {?>
                                  <span class="sales"><span>己售出<b style=""><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span></span><?php } elseif($_MODULE['sale_show']==2) {?>
                                  
                                  <span class="collect">已<b><?php echo $item['collectedCount']?></b>人收藏</span> <?php }?>
                                  
                                  </div>
                              </div>
                    </div>
                    <?php }?>
                    </a> </div>
                </div>
                <div class="s-info clear d_block">
                  <div class="price-box" style=""><span class="price">RMB<br>
                    <em><?php echo number_format($item['discountPrice'], $_MODULE['jinpinzs_pricexshu']);?></em></span></div>
                  <div class="s-info1 show_sales">
                    <div class="desc"><a href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo $item['title']?></a></div>
                     <?php if ($_MODULE['sale_show']==1) {?>
                    <span class="sales">已售：<b style=""><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span><?php } elseif($_MODULE['sale_show']==2) {?> <span class="collect">收藏：<?php echo $item['collectedCount']?></span> <?php }?>
                    
                    
                    </div>
                </div>
              </div>
            </li>
            <?php }?>
           <?php }?>
          </ul>
        </div>
        <div class="tg-box-bottom"></div>
      </div>
    </div>
  </div>
</div>
