<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-fenlei"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-fenlei"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
 $highlight_set = explode("*",$_MODULE['highlight_set']);
 function hot($x,$y,$highlight_set){	 	

 	if (in_array("$x,$y,a",$highlight_set)) return  "hot_a";
 	if (in_array("$x,$y,b",$highlight_set)) return  "hot_b";
 	if (in_array("$x,$y,c",$highlight_set)) return  "hot_c";
 	if (in_array("$x,$y,d",$highlight_set)) return  "hot_d";
 	if (in_array("$x,$y,e",$highlight_set)) return  "hot_e";
 	if (in_array("$x,$y,f",$highlight_set)) return  "hot_f";

}


for($i=0;$i<=5;$i++){
  
	
	$pcats[$i]=explode("#",  $_MODULE['pcats'.$i]) ;
	$ccats[$i]=explode("#",  $_MODULE['ccats'.$i]) ;
	$ccats_href[$i]=explode("#",  $_MODULE['ccats_href'.$i]) ;




	$categorys[$i]['parent']['name']=$pcats[$i][0];
	$categorys[$i]['parent']['url']=$pcats[$i][1];


	foreach ($ccats[$i] as $k => $v) {
		$categorys[$i]['child'][$k]['name']=$ccats[$i][$k];
		$categorys[$i]['child'][$k]['url']=$ccats_href[$i][$k];
	}


}

?>
<?php  if($_MODULE['load_type']==1) { $cat=getCategorys($_MODULE['cate']);} 
 		if($_MODULE['load_type']==2) { $cat=$categorys;} 
   ?>



		<div style="margin-top:5px;"><div class="mod-cates">
	<div class="type950">
		<div class="<?=$_MODULE['show_style']?>  clear mod f_st" style="">
				
				<div class="tgbd search-right clear" style="">
					
					<div class="cat-bd" style="">
							<div class="am-cats">
						<ul class="clear" >
							<?php foreach ($cat as $k => $v) {?>


							<li class="cat-row col-<?=$k?> row-<?=$k?>" valign="top" >		
									 <div class="cat-rowbd ">							
										<div class="cat " style=""><span class="pcat-left" style=""><span class="pcat-right"><a href="<?php  if($v['parent']['url']){ echo $v['parent']['url'] ;} else { echo "#";}?>" target="_blank" ><?=$v['parent']['name']?></a></span></span></div>
										<div class="sub-cats clear">
											<div class="sub-catbox">
											<ul class="clear">
												<? foreach ($v['child'] as $c=> $r) {?>
												<li ><a href="<?  if($r['url']){ echo $r['url'];}else { echo "#";}?>" title="<?=$r['name']?>" target="_blank"><span ><?=$r['name']?></span></a>

												<?php if(hot($k+1,$c+1)) {?>	<i class="<?php echo hot($k+1,$c+1) ?>"></i><?php }?>

													<span class="sp-str">|</span></li>
												<?php }?>
											</ul>
											</div>
										</div>
								   </div></li>
									
									<?php }?>

						</ul>

					</div>
					</div>
				</div>
				<div class="tg-box-bd" style=""></div>
		</div>

	















	 </div>
	</div></div></div>


