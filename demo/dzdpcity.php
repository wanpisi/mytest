<?php
/**
 * Created by PhpStorm.
 * User: laner
 * Date: 2016/10/30
 * Time: 上午10:30
 */

ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$configs = array(
    'name' => '大众点评',
    'tasknum' => 1,
    'log_show' => true,
    //'save_running_state' => true,
    'domains' => array(
        'http://www.dianping.com',
        'www.dianping.com'
    ),
    'scan_urls' => array(
        "hhttp://www.dianping.com/search/category/1/10/o3",            // 随便定义一个入口，反正没用
    ),
    'list_url_regexes' => array(
        "http://www.dianping.com/search/category/1/10/o3",         // 城市列表页
       // "http://www.mafengwo.cn/gonglve/ajax.php\?act=get_travellist\&mddid=\d+",   // 文章列表页
    ),
    'content_url_regexes' => array(
        "http://www.dianping.com/shop/22574666\d+",
    ),
    'export' => array(
        'type' => 'csv',
        'file' => PATH_DATA.'/dzdp.csv',
    ),
    'fields' => array(
        array(
            'name' => "mdd",
            'selector' => "//*[@id=\"page-header\"]/div[1]/a[2]",
            'required' => true,
        ),
        // 大众点评id
        array(
            'name' => "title",
            'selector' => "//*[contains(@class,'tit')]//h4",
            'required' => true,
        ),
        // 大众点评id
        array(
            'name' => "mddurl",
            'selector' => "//*[@id=\"hotregion\"]/li[1]/a/@href",
            'required' => true,
        ),
    ),
);

$spider = new phpspider($configs);

$spider->on_start = function($phpspider)
{
    requests::add_header('Referer','http://www.dianping.com/search/map/category/2/10');
};
$spider->on_extract_field = function($fieldname, $data, $page)
{
    if($fieldname =='mddurl'){
        $data = $page['request']['url'];
    }elseif($fieldname =='mddid'){

        $data1 =$page['mddid'];
        $data =explode("/",$data1)[3];


    }elseif($fieldname =='shop_url'){
        // 处理店铺URL
    }elseif ($fieldname == 'category'){

    }elseif ($fieldname == 'brand'){

    }
    return $data;
};

$spider->start();
