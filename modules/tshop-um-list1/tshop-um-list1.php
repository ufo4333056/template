<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-list1"��class���Կ����������Ҫ����ѡ�������壩
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
if ($regionWidth==950) $rw=0;
if ($regionWidth==750) $rw=1;
if ($regionWidth==550) $rw=2;
$pic_size =explode("#",$pic_size[$rw]);
if ($pic_shape) { } else {$pic_size[1]=$pic_size[0]; }
if($pic_size[1]== 184)$size= 190;
if($pic_size[1]== 180)$size= 190;
if($pic_size[1]== 230)$size= 230;
if($pic_size[1]== 244)$size= 240;
if($pic_size[1]== 250)$size= 250;
if($pic_size[1]== 270)$size= 280;
if($pic_size[1]== 310)$size= 310;
if($pic_size[1]== 370)$size= 400;
if($pic_size[1]== 430)$size= 430;
if($pic_size[1]== 470)$size= 480;
if($pic_size[1]== 670)$size= 670;

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
<div class="tb-module tshop-um tshop-um-list1" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
?>

<div class=" type<?php echo $regionWidth?>">
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
					<ul class="clear w-<?php echo $pic_size[0]?>">
                    <?php foreach ($items as $key => $item){?>
					<li class="item-box info-show c-<?php echo ($key+1)%$pic_size[2]?>   r-1 item_hover">
												<div class="item" style="width:<?php echo $pic_size[0]?>px;">
													<div class="pic-box">
														<a class="" href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>">
																<div class="tg-picbg" style="height:<?php echo $pic_size[1]?>px;width:<?php echo $pic_size[0]?>px;background-position:<?php echo $_MODULE['pic_cut']?>;background-image:url(<?php echo $item['pic'.($size)]?$item['pic'.($size)]:"http://gd2.alicdn.com/bao/uploaded/i2/TB1WxLCHXXXXXaOXVXXXXXXXXXX_!!0-item_pic.jpg_400x400.jpg"?>);"></div>
														</a>
													</div>
													<div class="info clear"><div class="info-l"><div class="sinfo show_sales">
                                                 	<?php if($_MODULE['sale_show']==1){?>   <span class="sales">���ۣ�<b><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span> <?php }?>
                                                 	<?php if($_MODULE['sale_show']==2){?>   <span class="collect">�ղ� <b><?php echo $item['collectedCount']?></b>��</span> <?php }?>
                                                    </div><span class="price" style=""><?php echo $_MODULE['price_pre']?>:<em><?php echo number_format( $item['discountPrice'],$_MODULE['jinpinzs_pricexshu']); echo $_MODULE['price_uint'];?></em></span></div><a class="buy-btn  " style="" href="<?php echo $item['url']?>" target="_blank"><div class="btn-bd f_yahei"><?php if ($pic_size[2]==5) {echo "����" ;}else { echo "��������";}?></div></a></div>
												</div>
												</li>
                    <?php }?>
					</ul>
				</div>
		</div>
	</div>











</div>
