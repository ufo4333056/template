<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-kefu"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-kefu"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
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
