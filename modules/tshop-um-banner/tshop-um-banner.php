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
<div class="bd" style="height:120px;  background:url(../../assets/images/pink-hdbg.gif) no-repeat;">
	<?php if ($_MODULE['bannerxuanze']==1){?>
    
    
				<div class="banner tlite" >
                <div  style=" position:absolute; left:50%; top:33px; width:100%; height:100%;">
			<h3 style=" position: relative; left:-50%;   font-family:<?php echo $_MODULE['family']?>;font-size:<?php echo $_MODULE['font_size']?>px;color:<?php echo $_MODULE['color']?>;font-weight:<?php echo $_MODULE['font_weight']?$_MODULE['font_weight_f']:"normal"?>;letter-spacing:<?php echo $_MODULE['letter_spacing']?>px;">	<span style=" white-space: nowrap; "><?php if($_MODULE['title_wz']) echo $_MODULE['title_wz']; else   echo  $_shop->title;?></span></h3>	
            
		</div>  
        </div>
		
		
		<?php  } if($_MODULE['bannerxuanze']==0) {?> 
                
                <div class="banner <?php  if ($_MODULE['banner_picture']) { echo "diy"; } else {echo "zhidai";}?>" style="height:<?php echo $_MODULE['banner_height'];?>px;background:url(<?php echo $_MODULE['banner_picture']?>) no-repeat top center transparent;"></div>
				  <?php }?>          
        <?php if ($_MODULE['banner_shoucang']){?>	       
						<div class="banner shoucang">
                        
                        <?php echo getFav("", $_shop->id, "shop", "sc");//�ղ�?>
                        
                        </div>
               <?php }?>           
                        
           <?php if ($_MODULE['banner_gonggaogg']){?>	             
						<div class="banner gonggao" style=" position:absolute; left:<?php echo $_MODULE['banner_gonggao_left'] ?>px ;top:<?php echo $_MODULE['banner_gonggao_top'];  ?>px; ">
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
				<div class="banner" style=" position:absolute; left:<?php echo $_MODULE['so_left']?>px; top:<?php echo $_MODULE['so_top']?>px; background:url(../../assets/images/pink-search-bg.png) no-repeat;">
			<div class="form">					
				<form method="post" action="http://shop<?php echo  $_shop->id?>.taobao.com/?scene=taobao_shop" name="SearchForm">					
					<input type="hidden" name="userId" value="">
					<input type="hidden" name="shopId" value="<?php echo   $_shop->shopId?>">
					<input type="hidden" name="view_type" value="">
					<input type="hidden" name="order_type" value="">
					<input type="hidden" name="search" value="y">
					<input class="text" type="text" name="keyword" value="<?php echo   $_MODULE['hotwz']?>">
					<button class="button" type="submit" ></button>
				</form>
			</div>
		</div>
			<?php }?>
            <?php if ($_MODULE['banner_fenxiang']){?>	
						<div class="banner fenxiang">	
						 <?php echo  getShare("", $_shop->id, 3, "shop", "fx");//����?>	
		</div>
        	<?php }?>
            <?php if ($_MODULE[' h-goods']){?>	
            <div class="h-goods" style="width:386px;"><div class="h-item-box">
	 	 <a class="h-picbox" href="http://item.taobao.com/item.htm?id=41150599888" target="_blank" style="background-image:url(http://img01.taobaocdn.com/bao/uploaded/i1/TB1GyvGGXXXXXbMaXXXXXXXXXXX_!!0-item_pic.jpg_80x80.jpg);"></a>
	 	 <div class="h-info h-row-2" style=""><a style="" class="h-desc" href="http://item.taobao.com/item.htm?id=41150599888" target="_blank">Ǳ��Ϻ�� ±���Ϻ ����±ζС��Ϻ ��հ�װ��˫���� ����</a><span class="h-price" style="">RMB<em>500.00</em></span><div class="h-tag h-tag-0" style="">��Ʒ</div></div>
	 	 </div><div class="h-item-box">
	 	 <a class="h-picbox" href="http://item.taobao.com/item.htm?id=41150599888" target="_blank" style="background-image:url(http://img01.taobaocdn.com/bao/uploaded/i1/TB1GyvGGXXXXXbMaXXXXXXXXXXX_!!0-item_pic.jpg_80x80.jpg);"></a>
	 	 <div class="h-info h-row-2" style=""><a style="" class="h-desc" href="http://item.taobao.com/item.htm?id=41150599888" target="_blank">Ǳ��Ϻ�� ±���Ϻ ����±ζС��Ϻ ��հ�װ��˫���� ����</a><span class="h-price" style="">RMB<em>500.00</em></span><div class="h-tag h-tag-1" style="">����</div></div>
	 	 </div></div>
         
         <?php }?>
		
         <?php if ($_MODULE[' h-time']){?>	
        
        <div style="" class="J_TWidget h-countdown" data-widget-type="Countdown" data-widget-config="{'endTime':'2015-03-11 00:00:00','interval': 1000,'timeRunCls': '.ks-countdown-run','timeUnitCls':{'d': '.ks-d','h': '.ks-h','m': '.ks-m','s': '.ks-s'},'minDigit':2,'timeEndCls':'.ks-countdown-end'}">
	<div class="ks-countdown-run run-txt" style="">����ʼ����:</div>
  <div class="ks-countdown-run time-txt" style=""><span class="ks-d h-number" style="">0</span><span>��</span><span class="ks-h h-number" style="">7</span><span>ʱ</span><span class="ks-m h-number" style="">18</span><span>��</span><span class="ks-s h-number" style="">20</span><span>��</span></div>
	<div class="ks-countdown-end end-txt" style="display:none;">��ѽ���</div>
</div>
        
       <?php }?>  
        
        <div class="h-sico" style=""><div class="def-ico"></div></div>
        
        
        
	</div>

	












</div>
