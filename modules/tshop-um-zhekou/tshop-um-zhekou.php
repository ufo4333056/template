<?php
 $pjbt = $_MODULE['pjbt']? $_MODULE['pjbt']:"��Һ����Ƽ�"; 
?>

<div class="tb-module tshop-um tshop-um-zhekou" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
  <?php
    $qzz1_5=explode('|',$_MODULE['qzz1_5']);//�Զ�����ƷͼƬ 
    $ids = $_MODULE['qzz1_1'];//����ѡ����
    $ids1 = $_MODULE['qzz1_6'];//����ѡ����
    $categoryId = $_MODULE['qzz1_2'];//��ĿID
    $keyword = $_MODULE['qzz1_3'];//�ؼ���
    $sortType = $_MODULE['qzz1_4'];//��Ʒ����
    $num = "3";//��Ʒ���������Ϊ20�� Ĭ��Ϊ20 ----//���˴�Ϊ�ο���30������鿴��V2.1.0�桱������־����
    $itemData = $_MODULE['qzz1_0'];//������Ʒ���ݣ�1Ϊ�Զ�,2Ϊ�ֶ�,3Ϊ��Ŀ,4Ϊ�ؼ���,5ΪЧ��ͼ
    //$items = getItems($ids,$categoryId,$keyword,$sortType,$num,$itemData,"itemForm");//common.php����Ʒ������������ѡ������
    $items = getItems($ids1,$categoryId,$keyword,$sortType,$num,$itemData,"itemRateForm");//common.php����Ʒ������������ѡ������
   

?>
  <?php
/**
 * ��ʼ���PHPҳ��
 */
$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"����д����";

$zdy_pic= explode("#",$_MODULE['zdy_pic']);
$djs= explode("#",$_MODULE['djs']);
//echo $ids=$_MODULE['items'];
$categoryId=$_MODULE['cates'];

foreach ($items as $k=> $item) {
  //echo $item['title'];
  if(is_array($zdy_pic)){
    if($zdy_pic[$k]){ $items[$k][pic400]=$zdy_pic[$k];}
  }
}

?>
  <div class="type950">
    <div class="mod hdtype<?php echo $_MODULE['title_type']?>  clear f_st">
      <?php if ($_MODULE['title_type']!=0){?>
      <div class="tghd" >
        <div class="tghd-bg2" style="height:100%;">
          <h3 ><span ><?php echo $title_txt;?></span></h3>
        </div>
        <?php if($_MODULE['more_show']){?>
        <a class="more" href="<?php echo $_MODULE['more_url']?>" target="_blank" ></a>
        <?php }?>
      </div>
      <?php }?>
      <div class="tgbd">
        <div class="mall-slide J_TWidget" data-widget-type="Slide" data-widget-config="{'duration':0.6,'easing':'easeOutStrong','activeTriggerCls':'nav-act','interval':3,'effect':'fade','navCls':'mall-nav','contentCls':'mall-con','autoplay':false}">
          <div class="mall-con-box clear">
            <div class="mall-con">
              <?php foreach ($items as $key => $item) {
  # code...
?>
              <div class="item ks-switchable-panel-internal359" style="display: block; opacity: 1; position: absolute; z-index: 9;">
                <div class="pic-box">
                  <div class="bpic-box"><a class="d-picbg" style="background-image:url(<?php echo $item['pic310']?>);" href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"></a></div>
                </div>
                <div class="info-box">
                  <div class="row1">
                    <div class="bprice-box" >
                      <div class="bprice-bg"><span class="b-price ">&yen;<em><?php echo  number_format($item['discountPrice'],$_MODULE[jinpinzs_pricexshu])?></em></span><a  class="buy-btn" href="<?php echo $item['url']?>" target="_blank"></a></div>
                    </div>
                  </div>
                  <div class="row2 show_sales">
                    <?php if ($_MODULE['jinpinzs_xiaoliang']){?>
                    <span class="sales">����<b><?php echo $item['soldCount']?></b>��</span>
                    <? }?>
                    <?php if ($_MODULE['jinpinzs_shouc']){?>
                    <span class="sc">�ղ�<b><?php echo $item['collectedCount']?></b>��</span>
                    <? }?>
                  </div>
                  <?php if ($_MODULE['gnxz']) {?>
                  <div class="row3">
                    <div class="item-ico" ></div>
                  </div>
                  <?php }else {?>
                  <div class="row3">
                    <div class="J_TWidget items-countdown" data-widget-type="Countdown" data-widget-config="{'endTime': '<?php echo (strtotime($djs[$key])-time())*1000;?>','interval': 1000,'timeRunCls': '.ks-countdown-run','timeUnitCls':{'d': '.ks-d','h': '.ks-h','m': '.ks-m','s': '.ks-s'},'minDigit': 1,'timeEndCls': '.ks-countdown-end'}">
                      <div class="ks-countdown-run run-txt">��������ʣ</div>
                      <div class="ks-countdown-run time-txt"><span class="ks-d">1</span>��<span class="ks-h">0</span>ʱ<span class="ks-m">50</span>��<span class="ks-s">5</span>��</div>
                      <div class="ks-countdown-end" style="display: none;">�������</div>
                    </div>
                  </div>
                  <?php }?>
                  <div class="row4">
                    <div class="desc-title" ><span class="desc-title-txt" ><span class="desc-title-txt" ><?php echo $pjbt;?></span></span></div>
                    <div class="desc-slide J_TWidget" data-widget-type="Carousel" data-widget-config="{'nextBtnCls':'desc-next','easing':'easeNone','activeTriggerCls':'desc-nav-act','effect':'scrolly','navCls':'desc-nav','prevBtnCls':'desc-prev','contentCls':'desc-con','autoplay':true}">
                      <div class="desc-con" style="position: absolute;">
                        <?php 
					  
					  if ($_MODULE['pjjzfs']) { echo $_MODULE['pjnr']; }else {
					  
					   if($item['rateList']){//����ѡ������ֵʱ��ִ�������
            $rates = $item['rateList'];
        }else{//���ݴ����Զ�����Ŀ���ؼ���ʱִ�У�
            $rates = $rateManager->queryAuctionRates($item['id']);//���ݱ���id��ȡ������������Ϣ�б�
        }
        $ratenum = $item['rateList']?count($item['rateList']):"3";//������ʾ����
        if($rates!=null){//��������ʱ��ִ�������
            foreach($rates as $kk => $rate){
                if($kk<$ratenum){//�жϣ������������������                
				   echo ' <div class="rate-item no-rate " style="display: block;">';
                    echo ''.$rate->feedback;                
					echo '</div>';
                }
            }
        }else{//���ݴ���
            echo ' <div class="rate-item no-rate " >��������</div>';  
        }  
					  }?>
                      </div>
                      <div class="desc-pages"><span title="��һ������" class="desc-prev"></span><span title="��һ������" class="desc-next"></span></div>
                      <ul class="desc-nav">
                        <li class="desc-nav-act ks-switchable-trigger-internal413">1</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="mall-nav-box">
            <ul class="mall-nav clear">
              <?php foreach ($items as $key => $item) {
  # code...
?>
              <li class=" <?php if($key==0) echo "nav-act"; ?> ">
                <div class="act-ico"><i ></i></div>
                <div class="spic-box">
                  <div class="spic-bd" >
                    <div class="spic-box1"> <a class="d-picbg" style="background-image:url(<?php echo $item['pic90']?>);" href="<?php echo $item['url']?>" target="_blank"></a>
                      <div class="info-box">
                        <div class="price-box">
                          <div class="price-pre" >������</div>
                          <span class="price" >&yen;<em><?php echo  number_format($item['discountPrice'],$_MODULE[jinpinzs_pricexshu])?></em></span></div>
                        <a class="desc" href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo $item['title']?></a>
                        <div class="show_share show_sc show_like tg-btnbox">
                          <?php if ($_MODULE['jinpinzs_shouc']){?>
                          <a class="tg-btn sc J_TokenSign"  target="_blank" href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $item['id']?>&amp;itemtype=1" title="�ղر���"></a>
                          <?php }?>
                          <?php if ($_MODULE['jinpinzs_fenxiang']){?>
                          <span class="tg-btn share  sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-text"   data-sharebtn='{"skinType":"1","type":"item","key":"<?php echo $item['id']?>","comment":"�������","pic":"<?php echo $item['pic']?>","title":"<?php echo $item['title']?>", "client_id":"68"}'></span>
                          <?php }?>
                          <?php if ($_MODULE['jinpinzs_xihuan']){?>
                          <span class="sns-widget" data-like="{'skinType':2, 'type':2, 'key':'<?=$item['id']?>'}"></span>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
