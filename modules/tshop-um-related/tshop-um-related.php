<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-related"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 $title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"����д����";
 $pic_shape=$_MODULE['pic_shape'];
$zdy_pic= explode("#",$_MODULE['zdy_pic']);
$pbtn_show =explode("@_@",$_MODULE['pbtn_show']);
$pic_size=explode(",",$_MODULE['pic_size']);
$mod_fn = $_MODULE['mod_fn'];
$categoryId=$_MODULE['cates'];

$group_cnt= $_MODULE['group_cnt'];

if($pic_shape){$pic_size=400; } else { $pic_size=300;}

for ($i=1;$i<=$group_cnt; $i++){	
	$main_item[$i]=getItems($_MODULE["main_item".$i], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num =1 , $itemData = 2 );
	$item_pics[$i] = explode("#",$_MODULE['item_pics_'.$i]);
	if($item_pics[$i][0]) {$main_item[$i][0]['pic300']=$item_pics[$i][0];$main_item[$i][0]['pic400']=$item_pics[$i][0];}
	
	if(empty($_MODULE['items_'.$i])) {$item_cnt=1;}else {$item_cnt=2;}
	
	$items[$i]=getItems($_MODULE['items_'.$i], $_MODULE['cates'], $_MODULE['keys'], $sortType =  $_MODULE['orderby'] , $num = 4 , $itemData =$item_cnt );
	
}



?>

<div class="tb-module tshop-um tshop-um-related" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
  <?php
/**
 * ��ʼ���PHPҳ��
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
      <div class="tgbd shape<?php echo  $pic_shape?> clear">
        <?php for($n=1;$n<=$group_cnt;$n++){?>
        <div class="titems fleft c-<?php echo $n%3 ?> r-2 desc-on sinfo-on show_title">
          <?php if($mod_fn){?>
          <div class="main-item">
            <div class="bpic-box"> <a class="tg-picbg" href="<?php echo $main_item[$n][0]['url']?>" title="<?php echo $main_item[$n][0]['title']?>" style="background-image:url(<?php echo $main_item[$n][0]['pic'.$pic_size]?>);background-position:<?php echo $_MODULE['pic_cut']?>;" target="_blank"></a>
              <div class="show_share show_sc tg-btnbox"><span class="btn-bg bbg1" style="">
                <?php if(in_array("show_share",$pbtn_show)) echo getShare("", $main_item[0][$n]['id'], 3, "item", "share tg-btn");//����?>
                </span><span class="btn-bg" style="">
                <?php   if(in_array("show_collect",$pbtn_show)) echo getFav("", $main_item[$n][0]['id'], "item", "sc");//�ղ�?>
                </span></div>
            </div>
          </div>
          <div class="info">
            <div class="info-r1 show_sales " style=""><span class="price" style=""><?php echo $_MODULE['price_pre']?><em><?php echo number_format($main_item[$n][0]['discountPrice'],$_MODULE['jinpinzs_pricexshu'])?></em></span>
              <?php if($_MODULE['sale_show']==1){?>
              <span class="sales">���ۣ�<b><?php echo $main_item[$n][0]['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span>
              <?php }?>
              <?php if($_MODULE['sale_show']==2){?>
              <span class="collect">�ղ� <b><?php echo $main_item[$n][0]['collectedCount']?></b>��</span>
              <?php }?>
            </div>
            <div class="info-r2"><?php echo $main_item[$n][0]['title']?></div>
          </div>
          <div class="r-item" style="">
            <ul class="clear">
              <?php foreach ($items[$n] as $k=> $item){?>
              <li class="item fleft l<?php echo $k?>">
                <div class="tg-pic tg-pic60"><a href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><img src="<?php echo $item['pic60']?>"></a></div>
              </li>
              <?php } ?>
            </ul>
          </div>
          <?php }else {?>
          <div class="main-item J_TWidget clear" data-widget-type="Slide" data-widget-config="{'duration':0.3,'easing':'<?php echo $_MODULE['easing']?>','activeTriggerCls':'act-nav','effect':'<?php echo $_MODULE['effect']?>','navCls':'slide-nav','contentCls':'slide-con','autoplay':<?php echo $_MODULE['autoplay']?>}">
            <div class="bpic-box">
              <div class="slide-conbox">
                <ul class="slide-con">
                  <?php foreach($item_pics[$n] as $value){?>
                  <li style="display: block; <?php if ($_MODULE['effect']=="scrollx") echo " float:left;"?>" class="ks-switchable-panel-internal403"><a class="tg-picbg" style="background-image:url(<?php echo $value; ?>);background-position:<?php echo $_MODULE['pic_cut']?>;" href="<?php echo $main_item[$n][0]['url']?>" target="_blank"></a></li>
                  <?php }?>
                </ul>
              </div>
              <div class="show_share show_sc tg-btnbox"><span class="btn-bg bbg1" style="">
                <?php if(in_array("show_share",$pbtn_show)) echo getShare("", $main_item[0][$n]['id'], 3, "item", "share tg-btn");//����?>
                </span><span class="btn-bg" style="">
                <?php   if(in_array("show_collect",$pbtn_show)) echo getFav("", $main_item[$n][0]['id'], "item", "sc");//�ղ�?>
                </span></div>
            </div>
            <div class="info">
              <div class="info-r1 show_sales " style=""><span class="price"><?php echo $_MODULE['price_pre']?><em><?php echo number_format($main_item[$n][0]['discountPrice'],$_MODULE['jinpinzs_pricexshu'])?></em></span>
                <?php if($_MODULE['sale_show']==1){?>
                <span class="sales">���ۣ�<b><?php echo $main_item[$n][0]['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span>
                <?php }?>
                <?php if($_MODULE['sale_show']==2){?>
                <span class="collect">�ղ� <b><?php echo $main_item[$n][0]['collectedCount']?></b>��</span>
                <?php }?>
              </div>
              <div class="info-r2"><a class="desc" title="<?php echo  $main_item[$n][0]['title']?>" href="<?php echo  $main_item[$n][0]['url']?>" target="_blank"><?php echo  $main_item[$n][0]['title']?></a></div>
            </div>
            <div class="r-item">
              <ul class="slide-nav clear">
                <?php foreach($item_pics[$n] as $k=> $value){?>
                <li class="item fleft l<?php echo $k; if ($k==0) echo " act-nav"?>  ks-switchable-trigger-internal402">
                  <div class="item-top" style="">
                    <div class="act-bd" style="">
                      <div class="def-bd">
                        <div class="tg-pic tg-pic60"><a href="<?php echo $main_item[$n][0]['url']?>" target="_blank"><img src="<?php echo $value; ?>"></a></div>
                      </div>
                    </div>
                  </div>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
          <?php }?>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>
