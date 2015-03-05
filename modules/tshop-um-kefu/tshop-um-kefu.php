<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-kefu"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-kefu"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
?>
	<?php $kefuwang=explode('#', $_MODULE['kefuwang']) ;  $kefuwwname=explode('#', $_MODULE['kefuwwname']) ; $kefubjphoto=explode('#', $_MODULE['kefubjphoto']) ;?>
	<?php $kefuwang_al=explode('#', $_MODULE['kefuwang_al']) ;  $kefuwwname_al=explode('#', $_MODULE['kefuwwname_al']) ; $kefubjphoto_al=explode('#', $_MODULE['kefubjphoto_al']) ;?>
<div class="container  <?php if ($regionWidth==190) echo "container190";?>">
		<div class="hd">
			<div class="tltie"></div>
		</div>
<?php if ($_MODULE['wwxuanzhe']==0) {?>

		<div class="bd wwbp ">
			<div class="nr">				
				<ul class="ww_ul sq">
					<li class="wwbt_li wwbt190"><?=$_MODULE['kefuwangbt']?></li>
				<?php foreach ($kefuwwname as $key => $v) {?>
				<li class="wwbp_li"><?=$v?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$kefuwang[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$kefuwang[$key]?>&site=cntaobao&s=<?=$_MODULE['subshoustyle_shang']?>&charset=utf-8" alt="<?=$v?>"></a></li>
				<?php }?>	


				</ul>
				<ul class="ww_ul sh">	
					<li class="wwbt_li wwbt190"><?=$_MODULE['kefuwangshbt']?></li>

				<?php foreach ($kefuwwname_al as $key => $v) {?>
				<li class="wwbp_li"><?=$v?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$kefuwang_al[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$kefuwang_al[$key]?>&site=cntaobao&s=<?=$_MODULE['subshoustyle_shang']?>&charset=utf-8" alt="<?=$v?>"></a></li>
				<?php }?>	


				</ul>
			</div>
		</div><?php }?>
		<?php if ($_MODULE['wwxuanzhe']==1) {?>
				<div class="bd">	
			<div class="wwbt"><?=$_MODULE['kefuwangbt']?></div>
			<div class="wang">
			

				<?php foreach ($kefuwwname as $key => $v) {?>
						<span class="wa" style="background:url(<?=$kefubjphoto[$key]?>) no-repeat;">	
							<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$kefuwang[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$kefuwang[$key]?>&site=cntaobao&s=<?=$_MODULE['subshoustyle_shang']?>&charset=utf-8" alt="com.caucho.quercus.env.ArgGetValue@3fd"></a>
							<span><?=$v?></span>					
						</span>	
				<?php }?>		
						
							
			</div>	
			<div class="wwbt w2"><?=$_MODULE['kefuwangshbt']?></div>
			<div class="wang">				
				
						

				<?php foreach ($kefuwwname_al as $key => $v) {?>
						<span class="wa" style="background:url(<?=$kefubjphoto_al[$key]?>) no-repeat;">	
							<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?=$kefuwang_al[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?=$kefuwang_al[$key]?>&site=cntaobao&s=<?=$_MODULE['subshoustyle_shang']?>&charset=utf-8" alt="com.caucho.quercus.env.ArgGetValue@3fd"></a>
							<span><?=$v?></span>					
						</span>	
				<?php }?>		
						
						
							
			</div>
		</div><?php }?>

		<?php if($_MODULE['kefushijianshizi']){?>
		<div class="shijian">
			<div class="shibt"><?=$_MODULE['kefushijian']?></div><div class="shinr"><?=$_MODULE['kefushijiantxt']?></div>		</div><?php }?>
			</div>
</div>
