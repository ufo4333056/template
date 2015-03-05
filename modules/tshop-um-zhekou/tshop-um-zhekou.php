<?php
 $pjbt = $_MODULE['pjbt']? $_MODULE['pjbt']:"买家好评推荐"; 
?>

<div class="tb-module tshop-um tshop-um-zhekou" style="margin-bottom:<?php echo $_MODULE['mod_mb']?>px;">
  <?php
    $qzz1_5=explode('|',$_MODULE['qzz1_5']);//自定义商品图片 
    $ids = $_MODULE['qzz1_1'];//宝贝选择器
    $ids1 = $_MODULE['qzz1_6'];//评价选择器
    $categoryId = $_MODULE['qzz1_2'];//类目ID
    $keyword = $_MODULE['qzz1_3'];//关键词
    $sortType = $_MODULE['qzz1_4'];//商品排序
    $num = "3";//商品数量：最大为20， 默认为20 ----//【此处为何可填30，详情查看“V2.1.0版”升级日志！】
    $itemData = $_MODULE['qzz1_0'];//店铺商品数据：1为自动,2为手动,3为类目,4为关键字,5为效果图
    //$items = getItems($ids,$categoryId,$keyword,$sortType,$num,$itemData,"itemForm");//common.php里商品共享函数（宝贝选择器）
    $items = getItems($ids1,$categoryId,$keyword,$sortType,$num,$itemData,"itemRateForm");//common.php里商品共享函数（评价选择器）
   

?>
  <?php
/**
 * 开始设计PHP页面
 */
$title_txt=$_MODULE['title_txt']?$_MODULE['title_txt']:"请填写标题";

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
                    <span class="sales">已售<b><?php echo $item['soldCount']?></b>件</span>
                    <? }?>
                    <?php if ($_MODULE['jinpinzs_shouc']){?>
                    <span class="sc">收藏<b><?php echo $item['collectedCount']?></b>人</span>
                    <? }?>
                  </div>
                  <?php if ($_MODULE['gnxz']) {?>
                  <div class="row3">
                    <div class="item-ico" ></div>
                  </div>
                  <?php }else {?>
                  <div class="row3">
                    <div class="J_TWidget items-countdown" data-widget-type="Countdown" data-widget-config="{'endTime': '<?php echo (strtotime($djs[$key])-time())*1000;?>','interval': 1000,'timeRunCls': '.ks-countdown-run','timeUnitCls':{'d': '.ks-d','h': '.ks-h','m': '.ks-m','s': '.ks-s'},'minDigit': 1,'timeEndCls': '.ks-countdown-end'}">
                      <div class="ks-countdown-run run-txt">距活动结束仅剩</div>
                      <div class="ks-countdown-run time-txt"><span class="ks-d">1</span>天<span class="ks-h">0</span>时<span class="ks-m">50</span>分<span class="ks-s">5</span>秒</div>
                      <div class="ks-countdown-end" style="display: none;">活动己结束</div>
                    </div>
                  </div>
                  <?php }?>
                  <div class="row4">
                    <div class="desc-title" ><span class="desc-title-txt" ><span class="desc-title-txt" ><?php echo $pjbt;?></span></span></div>
                    <div class="desc-slide J_TWidget" data-widget-type="Carousel" data-widget-config="{'nextBtnCls':'desc-next','easing':'easeNone','activeTriggerCls':'desc-nav-act','effect':'scrolly','navCls':'desc-nav','prevBtnCls':'desc-prev','contentCls':'desc-con','autoplay':true}">
                      <div class="desc-con" style="position: absolute;">
                        <?php 
					  
					  if ($_MODULE['pjjzfs']) { echo $_MODULE['pjnr']; }else {
					  
					   if($item['rateList']){//评论选择器有值时，执行下面的
            $rates = $item['rateList'];
        }else{//兼容处理（自动、类目、关键词时执行）
            $rates = $rateManager->queryAuctionRates($item['id']);//根据宝贝id获取宝贝的评价信息列表
        }
        $ratenum = $item['rateList']?count($item['rateList']):"3";//评论显示条数
        if($rates!=null){//存在评价时，执行下面的
            foreach($rates as $kk => $rate){
                if($kk<$ratenum){//判断，控制评论输出的条数                
				   echo ' <div class="rate-item no-rate " style="display: block;">';
                    echo ''.$rate->feedback;                
					echo '</div>';
                }
            }
        }else{//兼容处理
            echo ' <div class="rate-item no-rate " >暂无评论</div>';  
        }  
					  }?>
                      </div>
                      <div class="desc-pages"><span title="上一条评论" class="desc-prev"></span><span title="下一条评论" class="desc-next"></span></div>
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
                          <div class="price-pre" >促销价</div>
                          <span class="price" >&yen;<em><?php echo  number_format($item['discountPrice'],$_MODULE[jinpinzs_pricexshu])?></em></span></div>
                        <a class="desc" href="<?php echo $item['url']?>" target="_blank" title="<?php echo $item['title']?>"><?php echo $item['title']?></a>
                        <div class="show_share show_sc show_like tg-btnbox">
                          <?php if ($_MODULE['jinpinzs_shouc']){?>
                          <a class="tg-btn sc J_TokenSign"  target="_blank" href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $item['id']?>&amp;itemtype=1" title="收藏宝贝"></a>
                          <?php }?>
                          <?php if ($_MODULE['jinpinzs_fenxiang']){?>
                          <span class="tg-btn share  sns-widget sns-sharebtn sns-widget-ui sns-sharebtn-text"   data-sharebtn='{"skinType":"1","type":"item","key":"<?php echo $item['id']?>","comment":"这个很赞","pic":"<?php echo $item['pic']?>","title":"<?php echo $item['title']?>", "client_id":"68"}'></span>
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
