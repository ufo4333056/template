<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-ad"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
 $guide_s = $_MODULE['guide_s'];
  $g_height =  $_MODULE['g_height']?$_MODULE['g_height']:"277";
 $g_pic =  $_MODULE['g_pic']? $_MODULE['g_pic']:"";
 $g_link  =explode("#",$_MODULE['g_link']);
?>
<div class="tb-module tshop-um tshop-um-ad" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * 开始设计PHP页面
 */
?>
<div class="type950">
			<div class="mod um_guide">
            <?php if ($guide_s=="s_s1"  || $guide_s=="s_s2"  ){?>
					<div class="um_guide_c guide_bg_small gb<?php echo $guide_s;?>" style=" <?php  echo 'height:'. $g_height.'px;';  if ($g_pic) { echo "background:url($g_pic) no-repeat;"; }?>      " ><div class="clear hover-on">
                    <?php for ($n=0; $n<8; $n++){?>
                    <a class="a_<?php echo $n?> " href="<?php echo  $g_link[$n] ? $g_link[$n]: "#" ;?>" target="_self"></a>             
                    <?php }?>
                    
                    </div></div>
             <?php }?>       
                    
               <?php if ($guide_s=="b_s1"  || $guide_s=="b_s2"  ){?>       
                    <div class="um_guide_c guide_bg_big gb<?php echo $guide_s;?>" style=" <?php  echo 'height:'. $g_height.'px;'; if ($g_pic) { echo "background:url($g_pic) no-repeat;" ;}?>      "><div class="clear hover-on">
                   <?php for ($n=0; $n<6; $n++){?>
                    <a class="a_<?php echo $n?> " href="<?php echo  $g_link[$n] ? $g_link[$n]: "#" ;?>" target="_self"></a>             
                    <?php }?>
                    
                    
                    </div></div>
                  <?php }?>         
                    
			</div>
			</div>
</div>
