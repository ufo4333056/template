<?php
/**
**********************************************
* 文件名：common.php 开源版                 *
* 版  本：V2.1.2                            *
* 作  者：瞧着走                            *
* 联系QQ：465498623                         *
* 网  址：http://www.tbcommon.com           *
*                                         *
* 注意：站内有各个函数使用教程，欢迎查看！该文件请控制在10k以内*
*                                          *
* QQ交流群：163395301 （验证：common，必填） *
*********************************************
*/
?>

<?php
//折扣价
function discountPrice($item){
    if($item->discountPrice || $item->discountPrice!=$item->price) {
        $discountPrice = number_format($item->discountPrice,3,".","");//格式化数字（取三位小数）
    }else{
        $discountPrice = number_format($item->price,3,".","");//同上
    }
    $discountPrice = substr($discountPrice,0,-1);//截取两位小数
    return $discountPrice;
}
//店铺商品相关
function getItems($ids, $categoryId, $keyword, $sortType = " ", $num = "20", $itemData = "1", $idsType= "itemForm") {
global $itemManager, $uriManager, $rateManager;
$arraySize = array(
	16,20,24,30,32,36,40,48,50,60,64,70,72,80,88,90,100,110,120,125,128,130,145,160,170,180,190,200,210,220,230,234,
	240,250,270,290,300,310,315,320,336,350,360,400,430,460,468,480,490,540,560,570,580,600,640,670,720,728,760,960,970
);
$itemsObj = array();
$ratesObj = array();
if($ids!=null && $itemData == 2){//手动
	if($idsType == 'itemRateForm'){//评价选择器
		$itemRates = $rateManager->parse($ids);
		foreach($itemRates->keySet() as $id){
			$item = $itemManager->queryById($id);
			$rate = $itemRates->get($id);
			$itemsObj[]=$item;
			$ratesObj[]=$rate;
		}
	}else{//宝贝选择器
		$arrayIds = is_string($ids) ? explode(',', $ids) : (array) $ids;
		if($sortType == " "){
			foreach($arrayIds as $id){
				$item = $itemManager->queryById($id);
				$itemsObj[]=$item;
			}
		}else{
			$itemsObj = $itemManager->queryByIds($arrayIds,$sortType);
		}
	}
}elseif($categoryId!=null && $itemData == 3){//类目
	$jsonArray = json_decode($categoryId);
	foreach($jsonArray as $jsonObject){
		$childIds = explode(",",$jsonObject->{childIds});
		if($childIds != null){
			foreach($childIds as $childId){
				$items_xfl = $itemManager->queryByCategory($childId,$sortType,$num);
				foreach($items_xfl as $itemCate){
					$itemsObj[] = $itemCate!=null ? $itemCate : "";
				}
			}
		}else{
			$items_dfl = $itemManager->queryByCategory($jsonObject->{rid},$sortType,$num);
			foreach($items_dfl as $itemCate){
				$itemsObj[] = $itemCate!=null ? $itemCate : "";
			}
		}
	}
}elseif($keyword!=null && $itemData == 4){//关键字
    $itemsObj = $itemManager-> queryByKeyword ($keyword, $sortType, $num);  
}elseif($itemData == 1){//自动
    $itemsObj = $itemManager-> queryByKeyword (" ", $sortType, $num);
}
$skuLists = $itemsObj!=null ? $itemManager->queryOpenSkuDOListByOpenItemDOList($itemsObj) : "";//sku列表信息
$itemData = $itemsObj!=null ? $itemData : "5"; //新店铺没有上传商品时，执行风格预览
$items = array(); 
if($itemData != 5 || $itemsObj!=null){
    foreach ($itemsObj as $key => $item) {
        if($key<$num){
            if($item->exist){
                $qzz['url'] = $uriManager->detailURI($item);
                foreach($arraySize as $imgSize){
                    $qzz['pic'.$imgSize] = $item->getPicUrl($imgSize);
                }
                $qzz['title'] = $item->title;
                $qzz['price'] = $item->price;
                $qzz['discountPrice'] = discountPrice($item);
                $qzz['zhekou'] = number_format(str_replace(',','',discountPrice($item))/str_replace(',','',$item->price),2)*10;//求商算折扣
                $qzz['soldCount'] = $item->soldCount;
                $qzz['collectedCount'] = $item->collectedCount;
                $qzz['id'] = $item->id;
				$qzz['skuList'] = $skuLists[$key];
				foreach($arraySize as $imgSize){
					$qzz['skuPics' . $imgSize] = $itemManager->getSkuPropertyPics($skuLists[$key],$imgSize,$imgSize);
				}
				$qzz['rateList'] = $ratesObj[$key]!=null?$ratesObj[$key]:"";
            }
        }else{break;}
        $items[] = $qzz;
    }
}elseif($itemData == 5) {//风格预览
	$qzzrange = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //定义数组（根据需求修改，凑够20个即可）
	shuffle($qzzrange); 
	$qzzarray = array_slice($qzzrange, 0); 
	for ($i = 0; $i < $num; $i++){
		$qzz['url'] = "http://www.taobao.com/?id=www.qiaozhezou.com";
		foreach($arraySize as $imgSize){
			$qzz['pic'.$imgSize] = "../../assets/images/img/qzz_".$qzzarray[$i].".jpg_".$imgSize."x".$imgSize.".jpg";
		}
		$qzz['title'] = "宝贝数据未添加，请点击右上角的编辑按钮选择添加您的宝贝";
		$qzz['price'] = "598.00";
		$qzz['discountPrice'] = "398.98";
		$qzz['zhekou'] = number_format(398.98/598.00,2)*10;
		$qzz['soldCount'] = "1588";
		$qzz['collectedCount'] = "988";
		$qzz['id'] = "1".$qzzarray[$i];
    	$items[] = $qzz;
	}
}
return $items;
}
//店铺类目信息
function getCategorys($json, $categoryData = "1") {
global $shopCategoryManager, $uriManager;
if(!empty($json) && $categoryData == 2) {
	$allShopCategory = json_decode($json);
} elseif($categoryData == 1) {
	$allShopCategory = $shopCategoryManager->queryAll();
}
$categorys = array();
foreach($allShopCategory as $jsonObject) {
	if(!empty($json) && $categoryData == 2) {
		$shopCategory = $shopCategoryManager->queryById($jsonObject->{rid});
	} elseif($categoryData == 1) {
		$shopCategory = $jsonObject;
	}
	$category = array();
	$category['parent']['url'] = $uriManager->shopCategoryURI($shopCategory);
	$category['parent']['name'] = $shopCategory->name;
	$category['parent']['id'] = $shopCategory->id;
	if(!empty($json) && $categoryData == 2) {
		$subCategories = explode(",", $jsonObject->{childIds});
	} elseif($categoryData == 1) {
		$subCategories = $shopCategoryManager->querySubCategories($shopCategory->id);
	}
	foreach($subCategories as $childId) {
		if(!empty($json) && $categoryData == 2) {
			$shopCategory = $shopCategoryManager->queryById($childId);
		} elseif($categoryData == 1) {
			$shopCategory = $childId;
		}
		$qzz['url'] = $uriManager->shopCategoryURI($shopCategory);
		$qzz['name'] = $shopCategory->name;
		$qzz['id'] = $shopCategory->id;
		$category['child'][] = $qzz;
	}
	$categorys[] = $category;
}
return $categorys;
}
//生成二维码
function getErcode($erId, $widthHeight = "90", $type = "1") {
switch($type){
case 1://集市商品
	$code = 'type=ci&item_id='.$erId.'&v=1';break;
case 2://天猫商品
	$code = 'v=1&type=bi&item_id='.$erId;break;
case 3://集市店铺.
	$code = 'type=cs&shop_id='.$erId.'&v=1';break;
case 4://天猫店铺
	$code = 'v=1&type=bs&shop_id='.$erId;break;
case 5://微淘.
	$code = 'type=we&we_id='.$erId.'&v=1';break;
default://集市商品
	$code = 'type=ci&item_id='.$erId.'&v=1';
}
$imgsrc = 'http://gqrcode.alicdn.com/img?'.$code.'&w='.$widthHeight.'&h='.$widthHeight;
return $imgsrc;
}
//喜欢SNS组件
function getLike($likeText, $likeKey, $likeSkintype = "2", $likeType = "item", $likeClass = "qzzlike"){
if($likeType == 'item'){
	$likeType = "2";//商品
}elseif($likeType == 'shop'){
	$likeType = "4";//店铺
}elseif($likeType == 'webpage'){
	$likeType = "3";//网页
}
$xh = '<div class="sns-widget '.$likeClass.'" data-like="{
\'skinType\':\''.$likeSkintype.'\',
\'type\':\''.$likeType.'\',
\'key\':\''.$likeKey.'\',
\'text\':\''.$likeText.'\',
\'client_id\':\'68\'}"></div>	
';	
return $xh;
}
//分享SNS组件
function getShare($shareText, $shareKey, $shareSkintype = "1", $shareType = "item", $shareClass = "qzzshare"){
$fx = '<div class="sns-widget '.$shareClass.'" data-sharebtn="{
\'skinType\':\''.$shareSkintype.'\',
\'type\':\''.$shareType.'\',
\'key\':\''.$shareKey.'\',
\'comment\':\'这个很赞哦...\',
\'title\':\'\',
\'pic\':\'\',
\'client_id\':\'68\',
\'isShowFriend\':\'false\'}" title="点此分享给好友">'.$shareText.'</div>	
';
return $fx;
}
//倒计时Widget组件
function getCountdown($endTime, $runText, $endText, $runClass = "qzzrun", $endClass = "qzzend", $djsClass = "qzzdjs"){
$djs = '<div class="J_TWidget '.$djsClass.'" data-widget-type="Countdown"  data-widget-config="{
\'endTime\': \''.$endTime.'\',
\'interval\': 1000, 
\'timeRunCls\': \'.ks-countdown-run\', 
\'timeUnitCls\':{\'d\':\'.ks-d\',\'h\':\'.ks-h\',\'m\':\'.ks-m\',\'s\':\'.ks-s\',\'i\':\'.ks-i\'},
\'minDigit\': 2,
\'timeEndCls\':\'.ks-countdown-end\'
}">
	<div class="ks-countdown-run '.$runClass.'">
		<i></i>'.$runText.'
		<span class="ks-d time">0</span> <span class="unit">天</span>
		<span class="ks-h time">0</span> <span class="unit">时</span>
		<span class="ks-m time">0</span> <span class="unit">分</span>
		<span class="ks-s time">0</span> <span class="unit">秒</span>	
	</div>
    <div class="ks-countdown-end '.$endClass.'">
		<span class="endcontent">'.$endText.'</span>
    </div>
</div>
';
return $djs;
}
//收藏店铺or宝贝
function getFav($favText, $favItemid, $favData, $favClass = "qzzfav"){
global $uriManager;//用global引入了函数外部的$uriManager变量
if($favData == 'shop'){
	$sc_url = $uriManager->favoriteLink();//店铺收藏
	$sc_title = "点此收藏本店铺";
}elseif($favData == 'item'){
	$sc_url = "http://favorite.taobao.com/popup/add_collection.htm?id=".$favItemid."&itemtype=1&scjjc=1";//商品收藏
	$sc_title = "点此收藏这个宝贝";
}
$sc = '<a class="J_TokenSign '.$favClass.'" title="'.$sc_title.'" href="'.$sc_url.'" target="_blank">'.$favText.'</a>';
return $sc;
}
//商品购物车
function getCart($cartText, $cartUrl, $cartClass = "qzzcart"){
$gwc = '<a class="J_CartPluginTrigger '.$cartClass.'" title="加入购物车" href="'.$cartUrl.'">'.$cartText.'</a>';
return $gwc;
}
//元素透明度
function getOpacity($opacity){
$alpha = 'filter:progid:DXImageTransform.Microsoft.Alpha(opacity='.$opacity.');opacity:.'.$opacity.';';
return $alpha;
}
//png24在ie6下透明
function getPng_24($png){
$pngdata = " data-widget-type=\"Compatible\" data-widget-config=\"{'png':true,'".$png."':true}\" ";	
return $pngdata;
}
?>