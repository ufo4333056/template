<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-sousuo"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-sousuo"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
?>

<div class="mod-search"><div class="type950">
		<div class="search-box clear mod f_st">		
			<div class="search-title">����</div>
			<div class="sform">
				<form class="focus" name="SearchForm" action="http://shop<?php echo  $_shop->id?>.taobao.com/?scene=taobao_shop" method="post" target="_blank">
					<ul>
						<input type="hidden" name="userId" value="">
						<input type="hidden" name="id" value="<?php echo  $_shop->id?>">
						<input type="hidden" name="view_type" value="">
						<input type="hidden" name="order_type" value="">
						<input type="hidden" name="search" value="y">
						<li class="keyword clear">
							<input type="text" size="18" name="keyword" class="text" value="<?=$_MODULE['s_txt']?>" title="����ؼ���"><button type="submit" class="search-btn" title="�ѵ��ڱ���"></button>
						</li>
					</ul>
				</form>
		  </div>
		  <?php if($_MODULE['lnk_type']==2) {?>

		  <div class="key-box"><a href="<?php echo  $_shop->domainName?>/search.htm?search=y" target="_blank">�鿴���б���<span style="font-family:&quot;����&quot;;">&gt;&gt;</span></a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/category.htm?search=y&amp;orderType=newOn_desc" target="_blank">����Ʒ</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=hotsell_desc" target="_blank">������</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=price_asc" target="_blank">���۸�</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=hotkeep_desc" target="_blank">���ղ�</a><span></span></div>
 	<?php }?>

	<?php if($_MODULE['lnk_type']==1) {?>
 	<div class="key-box"><b><?=$_MODULE['key_titile']?></b>
<?php   $key_con=explode("#", $_MODULE['key_con']); foreach ($key_con as $key => $value) {?>

 		<a target="_blank" href="http://shop<?php echo  $_shop->id?>.taobao.com/search.htm?orderType=_hotsell&amp;viewType=grid&amp;baobei_type=&amp;keyword=<?=$value?>"><?=$value?></a>
 		<span>|</span><?php }?>
 		
 	</div>
	<?php }?>
		 </div>
		</div></div>
</div>
