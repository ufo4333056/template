<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-haibao"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */

?>
<div class="tb-module tshop-um tshop-um-haibao" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px">

<div style="position:relative;height:<?php echo $_MODULE['height']?>px; ">
	<div   style="position:absolute; width:1920px;height:<?php echo $_MODULE['height']?>px;left:-485px;  overflow:hidden;" class="J_TWidget section scrollable dd" data-widget-type="Carousel" 
data-widget-config="{'effect':'<?php echo $_MODULE['effect']?>','easing':'<?php echo $_MODULE['easing']?>','steps':1,'viewSize':[1920],'circular':true,
'prevBtnCls':'prev','nextBtnCls':'next','disableBtnCls':'disable','lazyDataType':'img-src','autoplay':'<?php echo $_MODULE['autoplay']?>','activeIndex':0,'triggerType':'<?php echo $_MODULE['triggerType']?>','duration':<?php echo $_MODULE['duration']?>,'interval':<?php echo $_MODULE['interval']?>}">
<?php if ($_MODULE['btncls']) {?>
<span  class="prev">&nbsp;</span>
<span  class="next">&nbsp;</span>
<?php }?>

    <div class="ks-switchable-content">
        <?php for($i=1;$i<=$_MODULE['num'];$i++) { ?>
     <a target="_blank" href="<?php echo $_MODULE['url_'.$i]?>">
        <img width="1920" src="<?php echo $_MODULE['pic_'.$i]?>"/></a>
        <?php }?>



    </div>
    
    <ul class="ks-switchable-nav"  <?php if($_MODULE['switchablenav']==0) echo "style='display:none;'" ?>>
       <?php for($i=1;$i<=$_MODULE['num'];$i++) { ?>
        <li <?php if($i==1) echo "class=ks-active";?> ><?php echo $i;?></li> 
        <?php }?>       
    </ul>
   

</div>
		
			
		

</div>




</div>
