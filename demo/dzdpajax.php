<?php
header('POST /search/map/ajax/json HTTP/1.1');
$url = "http://www.dianping.com/search/map/ajax/json";
$header =array(
    "Host" => "www.dianping.com",
    "Accept" => "application/json, text/javascript",
    "Origin" => "http://www.dianping.com",
    "X-Requested-With" => "XMLHttpRequest",
    "X-Request" => "JSON",
    "Referer" => "http://www.dianping.com/search/map/category/2/10",
    "Accept-Encoding" => "gzip, deflate",
    "Accept-Language" => "zh-CN,zh;q=0.8,en;q=0.6",
    "Cookie" => "_hc.v=ce7ac0ea-f92e-cd5c-c32f-1de8e0f7b9e1.1477787046; ua=Qzone_9967935369; PHOENIX_ID=0a0102f1-158322ca194-8022255; __utma=205923334.445354544.1478310670.1478310670.1478310670.1; __utmb=205923334.1.10.1478310670; __utmc=205923334; __utmz=205923334.1478310670.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); s_ViewType=10; JSESSIONID=310757EAE668AD9FE9197723BB8CAA45; aburl=1; cy=2; cye=beijing",
    "Content-Type" => "application/json;charset=UTF-8",
    "Content-Length" => "171",
) ;
$params = array(
    "LoginForm[cityId]" => "2",
    "LoginForm[cityEnName]" => "beijing",
    "LoginForm[promoId]" => "0",
    "LoginForm[shopType]" => "10",
    "LoginForm[categoryId]" => "10",
    "LoginForm[regionId]" => "0",
    "LoginForm[sortMode]" => "2",
    "LoginForm[shopSortItem]" => "1",
    "LoginForm[keyword]" => "",
    "LoginForm[searchType]" => "1",
    "LoginForm[branchGroupId]" => "0",
    "LoginForm[shippingTypeFilterValue]" => "0",
    "LoginForm[page]" => "1",
);

//cityId=2&cityEnName=beijing&promoId=0&shopType=10&categoryId=10&regionId=0&sortMode=2&shopSortItem=1&keyword=&searchType=1&branchGroupId=0&shippingTypeFilterValue=0&page=1
$post_data =array('cityId'=>'2','cityEnName'=>'beijing','promoId'=>'0','shopType'=>'10','categoryId'=>'10','regionId'=>'0','sortMode'=>'2','shopSortItem'=>'1','keyword'=>'','searchType'=>'1','branchGroupId'=>'0','shippingTypeFilterValue'=>'0','page'=>'1');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
$ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13';

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER,  $header);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $post_data);

$result = curl_exec($ch);
$last = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$output = curl_exec($ch);
curl_close($ch);

//打印获得的数据
print_r($output);
exit;
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */
$login_url = "http://www.dianping.com/search/map/ajax/json";
// 提交的参数
//cityId=2&cityEnName=beijing&promoId=0&shopType=10&categoryId=10&regionId=0
//&sortMode=2&shopSortItem=1&keyword=&searchType=1&branchGroupId=0&shippingTypeFilterValue=0&page=50
$params = array(
    "LoginForm[cityId]" => "2",
    "LoginForm[cityEnName]" => "beijing",
    "LoginForm[promoId]" => "0",
    "LoginForm[shopType]" => "10",
    "LoginForm[categoryId]" => "10",
    "LoginForm[regionId]" => "0",
    "LoginForm[sortMode]" => "2",
    "LoginForm[shopSortItem]" => "1",
    "LoginForm[keyword]" => "",
    "LoginForm[searchType]" => "1",
    "LoginForm[branchGroupId]" => "0",
    "LoginForm[shippingTypeFilterValue]" => "0",
    "LoginForm[page]" => "1",
);
// 发送登录请求
requests::post($login_url, $params);
// 登录成功后本框架会把Cookie保存到www.waduanzi.com域名下，我们可以看看是否是已经收集到Cookie了
$cookies = requests::get_cookies("http://www.dianping.com");
print_r($cookies);  // 可以看到已经输出Cookie数组结构

// requests对象自动收集Cookie，访问这个域名下的URL会自动带上
// 接下来我们来访问一个需要登录后才能看到的页面
//$url = "https://www.zhihu.com/people/liang-jia-91-48";
//$html = requests::get($url);
//echo $html;
exit;