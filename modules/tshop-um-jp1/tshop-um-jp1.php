<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-jp1"��class���Կ����������Ҫ����ѡ�������壩
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
																<?php if($_MODULE['sale_show']==1){?>   <span class="sales">���ۣ�<b><?php echo $item['soldCount']?></b><?php echo $_MODULE['sales_extra']?></span> <?php }?>
                                                 				<?php if($_MODULE['sale_show']==2){?>   <span class="collect">�ղ� <b><?php echo $item['collectedCount']?></b>��</span> <?php }?>
															</div>
														</div>
														<div class="clear info-r2 info-lm">															
															<div class="info-l"><span class="price" style=""><?php echo $_MODULE['price_pre']?><em><?php echo number_format( $item['discountPrice'],$_MODULE['jinpinzs_pricexshu'])?></em></span></div>
															<a class="buy-btn" href="<?php echo $item['url']?>" style="" target="_blank"><div class="btn-bd f_yahei" style="">��������</div></a>
														</div>
														<div class="tg-btnbox show_share show_sc show_like">
                                                        
                                                        	<?php  if(in_array("show_collect",$pbtn_show)) echo getFav("", $items['id'], "item", "sc");//�ղ�
																	 if(in_array("show_share",$pbtn_show)) echo getShare("", $items['id'], 3, "item", "share tg-btn");//����
																	 if(in_array("show_like",$pbtn_show))  echo getLike("", $items['id'], 2, "item", "like tg-btn");//ϲ�� ?>
                                                        
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
