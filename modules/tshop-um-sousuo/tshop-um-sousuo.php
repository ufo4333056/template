<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-sousuo"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-sousuo"  style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
?>

<div class="mod-search"><div class="type950">
		<div class="search-box clear mod f_st">		
			<div class="search-title">搜索</div>
			<div class="sform">
				<form class="focus" name="SearchForm" action="http://shop<?php echo  $_shop->id?>.taobao.com/?scene=taobao_shop" method="post" target="_blank">
					<ul>
						<input type="hidden" name="userId" value="">
						<input type="hidden" name="id" value="<?php echo  $_shop->id?>">
						<input type="hidden" name="view_type" value="">
						<input type="hidden" name="order_type" value="">
						<input type="hidden" name="search" value="y">
						<li class="keyword clear">
							<input type="text" size="18" name="keyword" class="text" value="<?=$_MODULE['s_txt']?>" title="输入关键字"><button type="submit" class="search-btn" title="搜店内宝贝"></button>
						</li>
					</ul>
				</form>
		  </div>
		  <?php if($_MODULE['lnk_type']==2) {?>

		  <div class="key-box"><a href="<?php echo  $_shop->domainName?>/search.htm?search=y" target="_blank">查看所有宝贝<span style="font-family:&quot;宋体&quot;;">&gt;&gt;</span></a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/category.htm?search=y&amp;orderType=newOn_desc" target="_blank">按新品</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=hotsell_desc" target="_blank">按销量</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=price_asc" target="_blank">按价格</a><span></span>
 	<a href="<?php echo  $_shop->domainName?>/search.htm?search=y&amp;orderType=hotkeep_desc" target="_blank">按收藏</a><span></span></div>
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
