<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-col-composite2"（class属性可以添加您需要的类选择器定义）
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



$categoryId=$_MODULE['cates'];

$items_cnt= $_MODULE['items_cnt']?$_MODULE['items_cnt']:10;


$items=getItems($_MODULE['items'], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num = $items_cnt , $itemData = $_MODULE['select_type'] );

?>

<div class="tb-module tshop-um tshop-um-col-composite2" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
  <?php
/**
 * 开始设计PHP页面
 */
?>
  <div class="um_rank hdtype" style="width:190px;">
    <div class="mod f_st ">
     <?php if ($_MODULE['title_type']!=0){?>
      <div class="tghd" style="">
        <div class="tghd-bg2" style="height:100%;">
          <h3><span><?php echo $title_txt;?></span></h3>
        </div>
      </div>
      <?php }?>
      <div class="tgbd">
        <div class="J_TWidget mainbox" data-widget-type="Accordion" data-widget-config="{'triggerType':'mouse','triggerCls':'c8-trig','panelCls':'c8-panel'}" >
        
        <?php foreach ($items as $key => $item){?>
          <div class="c8-trig trig0  <?php if($key==0) echo "ks-active" ;?> clear ks-switchable-trigger-internal624"  ><i class="act-bg">
            <div class="def-bg"><?php echo $key+1?></div>
            <div class="n-box" style=""><?php echo $key+1?></div>
            </i>
            <h3 class="t-def"><?php echo $item['title']?></h3>
            <h3 class="t-act" style=""><?php echo $item['title']?></h3>
          </div>
          <div class="item c8-panel ks-switchable-panel-internal625" style="display:<?php if($key==0) echo "block" ;else echo "none";?>;"  >
            <div class="pic-box"><a class="item_hover" href="<?php echo $item['url']?>" target="_blank">
              <div class="pic-bd d_pic d_pic160" style=""><span class="d-picbox"><img src="<?php echo $item['pic160']?>"></span></div>
              </a></div>
            <div class="info clear">
              <div class="price-box"><span class="price-ico price-def price-ico0" style=""><b><?php echo $_MODULE['price_pre']?></b></span><span class="price" style=""><em><?php echo number_format( $item['discountPrice'],$_MODULE['jinpinzs_pricexshu']); echo $_MODULE['price_uint'];?></em></span></div>
              <div class="sub-info  show_sales">	<?php if($_MODULE['sale_show']==1){?>   <span class="sales">已售：<b><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span> <?php }?>
                                                 	<?php if($_MODULE['sale_show']==2){?>   <span class="collect">收藏 <b><?php echo $item['collectedCount']?></b>人</span> <?php }?></div>
            </div>
          </div>
         <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
