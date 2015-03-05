<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-haibao"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
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
