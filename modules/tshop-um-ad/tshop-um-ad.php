<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-ad"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
 $guide_s = $_MODULE['guide_s'];
  $g_height =  $_MODULE['g_height']?$_MODULE['g_height']:"277";
 $g_pic =  $_MODULE['g_pic']? $_MODULE['g_pic']:"";
 $g_link  =explode("#",$_MODULE['g_link']);
?>
<div class="tb-module tshop-um tshop-um-ad" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
<?php
/**
 * ��ʼ���PHPҳ��
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
