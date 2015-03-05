<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-slidepic"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-slidepic" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
$height =$_MODULE['height']?$_MODULE['height']:390;

for ($i=0; $i <$_MODULE['num'] ; $i++) { 
	$list[$i]['pic']=$_MODULE['pic'.$i];
	$list[$i]['url']=$_MODULE['url'.$i];
	$list[$i]['title']=$_MODULE['title'.$i];
}


?>

<div class="designbox type<?php echo $regionWidth?> f_st">
	<div class="mod" style="border-width:1px;padding:9px 8px;">
	<div class="J_TWidget spic3  nav-type4" data-widget-type="Carousel" data-widget-config="{

		'interval':<?=$_MODULE['interval']?>,

		'effect':'<?=$_MODULE['effect']?>',	

		'contentCls':'spic3-con',

		'navCls': 'spic3-nav', 

		'prevBtnCls':'prevbtn',

		'nextBtnCls':'nextbtn',

		'easing':'<?=$_MODULE['easing']?>',

		'duration': <?=$_MODULE['duration']?>,

		'autoplay': <?=$_MODULE['autoplay']?> ,

		'activeTriggerCls': 'current'  }" style="height:<?=$height?>px;width:932px; position:relative">
	 		<div class="spic3-box d_relative d_hide" style="height:<?=$height?>px;"> 
					<ul class="spic3-con clear" style="position: absolute; width: 999999px; left: -932px;">
						<?php foreach ($list as $key => $value) {?>
								<li style="height: <?=$height?>px; width: 932px; display: block; float: left;" class="ks-switchable-panel-internal575"><a class="def_pic" href="#" target="_blank"><img src="<?=$value['pic']?>"></a></li>
						<?php }?>


					</ul>
		 </div>
		 <?php if ($_MODULE['switchablenav']){?>
		<div class="spic3-navbox nav-site"><div class="nav-cenet">
			<ul class="spic3-nav clear">
				<?php foreach ($list as $key => $value) {?>
				<li class=" ks-switchable-trigger-internal574 <?php if($key==0) echo "current"?>  " style="width:<?php echo  932/$_MODULE['num'];?>px;"><b class="def-b" style=""><?=$value['title']?></b><b class="act-b" style=""><?=$value['title']?></b></li>
				<?php }?>
			

			</ul></div></div>
			<?php }?>
			<?php if ($_MODULE['btncls']){?>
		<div class="page_btnbox bsite" style="display:block;">				
			<b class="prevbtn page_btn" title="上一页"><span></span></b>
			<b class="nextbtn page_btn" title="上一页"><span></span></b>
		</div>
		<?php }?>
	</div>
	</div>
</div>
</div>
