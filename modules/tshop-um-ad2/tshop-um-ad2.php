<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-ad2"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
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
 * ��ʼ���PHPҳ��
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
