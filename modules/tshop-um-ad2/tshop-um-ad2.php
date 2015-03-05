<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-ad2"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 $col_cnt = $_MODULE['col_cnt'];
 $g_height = $_MODULE['g_height']? $_MODULE['g_height']:"131";
 for($n=0; $n<  $col_cnt ;$n++){
	 $defpic[$n]=  $_MODULE['defpic'.$n] ? $_MODULE['defpic'.$n] : "";
	  $hoverpic[$n]=  $_MODULE['hoverpic'.$n]?  $_MODULE['hoverpic'.$n] :"";
	   $link[$n]=  $_MODULE['link'.$n];
	 
	 }
?>

<div class="tb-module tshop-um tshop-um-ad2" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px ;">
  <?php
/**
 * 开始设计PHP页面
 */
?>
  <div class="type950">
    <div class="mod f0">
      <div class="clear cnt<?php echo  $col_cnt?> hover-on">
      
      <?php  for($n=0; $n< $col_cnt ;$n++){?>
        <div class="col col<?php echo $n?>" style=" <?php echo  "height:".$g_height."px"?> ">
          <div class="item-box pic-def">
          <a href="<?php echo $link[$n]=$link[$n] ? $link[$n] :"#"?>" target="_blank">
            <div class="def-pic"  <?php if ($defpic[$n])  echo " style=background:url($defpic[$n]) no-repeat;"?>     ></div>
            <div class="hover-pic" <?php if(empty($hoverpic[$n])){$hoverpic[$n]=$defpic[$n];} if ($hoverpic[$n])  echo "style=background:url($hoverpic[$n]) no-repeat"?>></div>
            </a>
          </div>
        </div>
        <?php }?>
      
      </div>
    </div>
  </div>
</div>
