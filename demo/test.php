<?php

$str ='/search/category/2314/0/r10515';
$data =explode("/",$str)[3];
print_r($data);
    exit;

$html = 'https://item.jd.com/sss';

preg_match('#//item.jd.com/\w*[a-zA-Z]#i',$html,$sku);

print_r($sku);
exit;
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */
$login_url = "https://www.zhihu.com/login/email";
// 提交的参数
$params = array(
    "LoginForm[returnUrl]" => "https://www.zhihu.com/login/email",
    "LoginForm[_xsrf]" => "b258f49d32463edc1ffa551df0cc95e7",
    "LoginForm[remember_me]" => "true",
    "LoginForm[username]" => "644922531@qq.com",
    "LoginForm[password]" => "jiajia1016",
);
// 发送登录请求
requests::post($login_url, $params);
// 登录成功后本框架会把Cookie保存到www.waduanzi.com域名下，我们可以看看是否是已经收集到Cookie了
$cookies = requests::get_cookies("www.zhihu.com");
print_r($cookies);  // 可以看到已经输出Cookie数组结构

// requests对象自动收集Cookie，访问这个域名下的URL会自动带上
// 接下来我们来访问一个需要登录后才能看到的页面
$url = "https://www.zhihu.com/people/liang-jia-91-48";
$html = requests::get($url);
echo $html;
exit;