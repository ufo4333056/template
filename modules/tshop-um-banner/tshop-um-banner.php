<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-banner"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 $banner_gonggao = explode("|",$_MODULE['banner_gonggao']);
 $banner_gglj = explode("|",$_MODULE['banner_gglj']);
 
 $banner_wwxiufu = explode("|",$_MODULE['banner_wwxiufu']);
 $banner_name = explode("|",$_MODULE['banner_name']); 
 $logo = $_MODULE['logo'] ?  $_MODULE['logo']:"http://img03.taobaocdn.com/imgextra/i3/47416673/TB25dXebVXXXXXhXpXXXXXXXXXX_!!47416673.png";
 
?>
<div class="tb-module tshop-um tshop-um-banner" >
<?php
/**
 * ��ʼ���PHPҳ��
 */
?><?php   $_shop->domainName?>	<?php   $_shop->ownerNick?><?php   $_shop->startTime?>	
<div class="bd" style="height:120px;">
	<?php if ($_MODULE['bannerxuanze']==1){?>
    <div class="logo " style=" position:absolute; z-index:9; left: <?php echo $_MODULLE['logo_left']?$_MODULLE['logo_left']:0;?>px; top: <?php echo $_MODULLE['logo_top']?$_MODULLE['logo_top']:0;?>px;"><img src="<?php echo $logo?>"></div>
    
				<div class="banner tlite" >
			<h3 style=" position:absolute; left:<?php echo $_MODULE['wz_left']?>px; top:<?php echo $_MODULE['wz_top']?>px;  font-family:<?php echo $_MODULE['family']?>;font-size:<?php echo $_MODULE['font_size']?>px;color:<?php echo $_MODULE['color']?>;font-weight:<?php echo $_MODULE['font_weight']?$_MODULE['font_weight_f']:"normal"?>;letter-spacing:<?php echo $_MODULE['letter_spacing']?>px;">	<?php if($_MODULE['title_wz']) echo $_MODULE['title_wz']; else   echo  $_shop->title;?>
				</h3>	
		</div>  <?php  } if($_MODULE['bannerxuanze']==0) {?> 
                
                <div class="banner <?php  if ($_MODULE['banner_picture']) { echo "diy"; } else {echo "zhidai";}?>" style="height:<?php echo $_MODULE['banner_height'];?>px;background:url(<?php echo $_MODULE['banner_picture']?>) no-repeat top center transparent;"></div>
				  <?php }?>          
        <?php if ($_MODULE['banner_shoucang']){?>	       
						<div class="banner shoucang">
                        
                        <?php echo getFav("", $_shop->id, "shop", "sc");//�ղ�?>
                        
                        </div>
               <?php }?>           
                        
           <?php if ($_MODULE['banner_gonggaogg']){?>	             
						<div class="banner gonggao">
			<div class="J_TWidget scroll-news" data-widget-type="Slide" data-widget-config="{'contentCls':'nav','hasTriggers':false,'effect':'scrolly','easing':'easeOutStrong','interval':3,'duration':0.1}" style="position: relative;">
				<ul class="nav" style="position: absolute; top: -80px;">
						
                        <?php foreach($banner_gonggao as $key=>$value ){?>
                        
								<li class="ks-switchable-panel-internal228" style="display: block;">
									<a target="_blank" href="<?php echo $banner_gglj[$key]?>">
										<?php echo $value?>
									</a>
								</li>
						<?php }?>		
							
											</ul>
			</div>
		</div>
        
        <?php }?>
        
			<?php if ($_MODULE['shaosongshezhi']){?>	
				<div class="banner shouc" style=" position:absolute; left:<?php echo $_MODULE['so_left']?>px; top:<?php echo $_MODULE['so_top']?>px;">
			<div class="form">					
				<form method="post" action="http://shop<?php echo  $_shop->id?>.taobao.com/?scene=taobao_shop" name="SearchForm">					
					<input type="hidden" name="userId" value="">
					<input type="hidden" name="shopId" value="<?php echo   $_shop->shopId?>">
					<input type="hidden" name="view_type" value="">
					<input type="hidden" name="order_type" value="">
					<input type="hidden" name="search" value="y">
					<input class="text" type="text" name="keyword" value="<?php echo   $_MODULE['hotwz']?>">
					<button class="button" type="submit"></button>
				</form>
			</div>
		</div>
			<?php }?>
            <?php if ($_MODULE['banner_fenxiang']){?>	
						<div class="banner fenxiang">	
						 <?php echo  getShare("", $_shop->id, 3, "shop", "fx");//����?>	
		</div>
        	<?php }?>
		 <?php if ($_MODULE['banner_wangwang']){?>	
				<div class="banner wang">		 
			<div class="ww tctu01">
			</div>
		</div> 
		<div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{ 'trigger':'.tctu01', 'align':{'node':'.tctu01', 'offset':[0,0], 'points':['tr','br']}}">
			<div class="tcc">
				<ul class="shouqian">
                   <?php foreach($banner_name as $key=>$value ){?>
					<li><?php echo $value?><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $banner_wwxiufu[$key]?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $banner_wwxiufu[$key]?>&site=cntaobao&s=2&charset=utf-8" alt="<?php echo $value?>"></a></li>
                   <?php }?>					
				</ul>
			</div>
		</div>
				<?php }?>
	</div>

	












</div>
