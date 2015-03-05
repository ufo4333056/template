<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-fenlei"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-fenlei"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
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


