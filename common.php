<?php
/**
**********************************************
* �ļ�����common.php ��Դ��                 *
* ��  ����V2.1.2                            *
* ��  �ߣ�������                            *
* ��ϵQQ��465498623                         *
* ��  ַ��http://www.tbcommon.com           *
*                                         *
* ע�⣺վ���и�������ʹ�ý̳̣���ӭ�鿴�����ļ��������10k����*
*                                          *
* QQ����Ⱥ��163395301 ����֤��common����� *
*********************************************
*/
?>

<?php
//�ۿۼ�
function discountPrice($item){
    if($item->discountPrice || $item->discountPrice!=$item->price) {
        $discountPrice = number_format($item->discountPrice,3,".","");//��ʽ�����֣�ȡ��λС����
    }else{
        $discountPrice = number_format($item->price,3,".","");//ͬ��
    }
    $discountPrice = substr($discountPrice,0,-1);//��ȡ��λС��
    return $discountPrice;
}
//������Ʒ���
function getItems($ids, $categoryId, $keyword, $sortType = " ", $num = "20", $itemData = "1", $idsType= "itemForm") {
global $itemManager, $uriManager, $rateManager;
$arraySize = array(
	16,20,24,30,32,36,40,48,50,60,64,70,72,80,88,90,100,110,120,125,128,130,145,160,170,180,190,200,210,220,230,234,
	240,250,270,290,300,310,315,320,336,350,360,400,430,460,468,480,490,540,560,570,580,600,640,670,720,728,760,960,970
);
$itemsObj = array();
$ratesObj = array();
if($ids!=null && $itemData == 2){//�ֶ�
	if($idsType == 'itemRateForm'){//����ѡ����
		$itemRates = $rateManager->parse($ids);
		foreach($itemRates->keySet() as $id){
			$item = $itemManager->queryById($id);
			$rate = $itemRates->get($id);
			$itemsObj[]=$item;
			$ratesObj[]=$rate;
		}
	}else{//����ѡ����
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
}elseif($categoryId!=null && $itemData == 3){//��Ŀ
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
}elseif($keyword!=null && $itemData == 4){//�ؼ���
    $itemsObj = $itemManager-> queryByKeyword ($keyword, $sortType, $num);  
}elseif($itemData == 1){//�Զ�
    $itemsObj = $itemManager-> queryByKeyword (" ", $sortType, $num);
}
$skuLists = $itemsObj!=null ? $itemManager->queryOpenSkuDOListByOpenItemDOList($itemsObj) : "";//sku�б���Ϣ
$itemData = $itemsObj!=null ? $itemData : "5"; //�µ���û���ϴ���Ʒʱ��ִ�з��Ԥ��
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
                $qzz['zhekou'] = number_format(str_replace(',','',discountPrice($item))/str_replace(',','',$item->price),2)*10;//�������ۿ�
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
}elseif($itemData == 5) {//���Ԥ��
	$qzzrange = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); //�������飨���������޸ģ��չ�20�����ɣ�
	shuffle($qzzrange); 
	$qzzarray = array_slice($qzzrange, 0); 
	for ($i = 0; $i < $num; $i++){
		$qzz['url'] = "http://www.taobao.com/?id=www.qiaozhezou.com";
		foreach($arraySize as $imgSize){
			$qzz['pic'.$imgSize] = "../../assets/images/img/qzz_".$qzzarray[$i].".jpg_".$imgSize."x".$imgSize.".jpg";
		}
		$qzz['title'] = "��������δ��ӣ��������Ͻǵı༭��ťѡ��������ı���";
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
//������Ŀ��Ϣ
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
//���ɶ�ά��
function getErcode($erId, $widthHeight = "90", $type = "1") {
switch($type){
case 1://������Ʒ
	$code = 'type=ci&item_id='.$erId.'&v=1';break;
case 2://��è��Ʒ
	$code = 'v=1&type=bi&item_id='.$erId;break;
case 3://���е���.
	$code = 'type=cs&shop_id='.$erId.'&v=1';break;
case 4://��è����
	$code = 'v=1&type=bs&shop_id='.$erId;break;
case 5://΢��.
	$code = 'type=we&we_id='.$erId.'&v=1';break;
default://������Ʒ
	$code = 'type=ci&item_id='.$erId.'&v=1';
}
$imgsrc = 'http://gqrcode.alicdn.com/img?'.$code.'&w='.$widthHeight.'&h='.$widthHeight;
return $imgsrc;
}
//ϲ��SNS���
function getLike($likeText, $likeKey, $likeSkintype = "2", $likeType = "item", $likeClass = "qzzlike"){
if($likeType == 'item'){
	$likeType = "2";//��Ʒ
}elseif($likeType == 'shop'){
	$likeType = "4";//����
}elseif($likeType == 'webpage'){
	$likeType = "3";//��ҳ
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
//����SNS���
function getShare($shareText, $shareKey, $shareSkintype = "1", $shareType = "item", $shareClass = "qzzshare"){
$fx = '<div class="sns-widget '.$shareClass.'" data-sharebtn="{
\'skinType\':\''.$shareSkintype.'\',
\'type\':\''.$shareType.'\',
\'key\':\''.$shareKey.'\',
\'comment\':\'�������Ŷ...\',
\'title\':\'\',
\'pic\':\'\',
\'client_id\':\'68\',
\'isShowFriend\':\'false\'}" title="��˷��������">'.$shareText.'</div>	
';
return $fx;
}
//����ʱWidget���
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
		<span class="ks-d time">0</span> <span class="unit">��</span>
		<span class="ks-h time">0</span> <span class="unit">ʱ</span>
		<span class="ks-m time">0</span> <span class="unit">��</span>
		<span class="ks-s time">0</span> <span class="unit">��</span>	
	</div>
    <div class="ks-countdown-end '.$endClass.'">
		<span class="endcontent">'.$endText.'</span>
    </div>
</div>
';
return $djs;
}
//�ղص���or����
function getFav($favText, $favItemid, $favData, $favClass = "qzzfav"){
global $uriManager;//��global�����˺����ⲿ��$uriManager����
if($favData == 'shop'){
	$sc_url = $uriManager->favoriteLink();//�����ղ�
	$sc_title = "����ղر�����";
}elseif($favData == 'item'){
	$sc_url = "http://favorite.taobao.com/popup/add_collection.htm?id=".$favItemid."&itemtype=1&scjjc=1";//��Ʒ�ղ�
	$sc_title = "����ղ��������";
}
$sc = '<a class="J_TokenSign '.$favClass.'" title="'.$sc_title.'" href="'.$sc_url.'" target="_blank">'.$favText.'</a>';
return $sc;
}
//��Ʒ���ﳵ
function getCart($cartText, $cartUrl, $cartClass = "qzzcart"){
$gwc = '<a class="J_CartPluginTrigger '.$cartClass.'" title="���빺�ﳵ" href="'.$cartUrl.'">'.$cartText.'</a>';
return $gwc;
}
//Ԫ��͸����
function getOpacity($opacity){
$alpha = 'filter:progid:DXImageTransform.Microsoft.Alpha(opacity='.$opacity.');opacity:.'.$opacity.';';
return $alpha;
}
//png24��ie6��͸��
function getPng_24($png){
$pngdata = " data-widget-type=\"Compatible\" data-widget-config=\"{'png':true,'".$png."':true}\" ";	
return $pngdata;
}
?>