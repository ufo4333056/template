<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-rexiao"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-rexiao" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"����д����";

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
														<div class="pricebox clear"><span class="price" style="">&yen;<em><?php echo  number_format($item[discountPrice],$_MODULE[jinpinzs_pricexshu])?></em><?php if ($_MODULE[jinpinzs_yuanjia]){?>  <i>ԭ�ۣ�<?php echo  number_format($item[price],$_MODULE[jinpinzs_pricexshu])?></i><?php }?></span></div>
														<div class="desc show_sales">
															<a href="<?php echo $item['url'] ?>" title="<?php echo $item['title'] ?>" target="_blank"><?php echo $item[title]?></a>
															<?php if ($_MODULE['jinpinzs_xiaoliang']){?>
															<span class="sales">����۳�:<b><?php echo $item['soldCount'] ?></b>��</span><span class="collect">�ղ�ָ��:<b><?php echo $item['collectedCount'];?></b>��</span>
															<?php }?>

														</div>
														<div class="tg-btnbox show_share show_sc show_like">
															<?php if ($_MODULE['jinpinzs_shouc']){?>
															<a style="" class="tg-btn sc J_TokenSign" target="_blank" href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $item['id'] ?>&amp;itemtype=1" title="�ղر���"></a>
															<?php }?>
															<?php if ($_MODULE['jinpinzs_fenxiang']){?>
															<span class="tg-btn share  sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-text" style="" data-sharebtn="{&quot;type&quot;:&quot;item&quot;,&quot;key&quot;:&quot;<?php echo $item['id'] ?>&quot;,&quot;client_id&quot;:&quot;68&quot;,&quot;pic&quot;:&quot;&quot;,&quot;comment&quot;:&quot;<?php echo $item['title'] ?>&quot;,&quot;skinType&quot;:&quot;2&quot;}" title="���������"></span>
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
						<span title="��һ������" class="mall-prev"></span>			
						<span title="��һ������" class="mall-next"></span>		
					</div>
				</div>
	</div></div>
	</div>
</div>
