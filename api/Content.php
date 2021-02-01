<?php


namespace Rakuten\api;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

use Rakuten\service\GuzzleRequest;

class Content
{
    protected $config;

    public function __construct()
    {
        $this->config=include('setting.php');
    }

    /**
     * Note:获取当前可用最新房间的列表
     * author fengyuan
     * date 2021/1/28 16:49
     * @param $since 自该日期起之后的可用房间
     * @param $page 页码数
     * @param $size 每页多少数据量
     * @return string
     * string 包含 meta，my_property_list ，pagination
     * @throws GuzzleException
     *
     */
    public function GetMyPropertyList($since,$page,$size)
    {
        $url=$this->config['rakuten_content_url'].'/my-property-list';
        $key=$this->config['rakuten_content_api_key'];
        $form_params=[
           'since'=>$since,
           'page'=>$page,
           'size'=>$size,
        ];

        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET',$form_params);


        return $result;
    }

    /**
     * Note:获取酒店的一些静态内容
     * author fengyuan
     * date 2021/1/28 17:23
     * @param string $extends e.g: “long,rooms”  “long,images,facilities,images” 以逗号分隔
     * @param string $lang e.g: en-US, ja-JP, zh-CN, …
     * @return string
     * @throws GuzzleException
     */
    public function PostProperties($extends,$lang='en-US'){
        $url=$this->config['rakuten_content_url'].'/properties';
        $key=$this->config['rakuten_content_api_key'];
        $form_params=[
            'extends'=>$extends,
//            'lang'=>$lang,
        ];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'POST',$form_params);

        return $result;
    }

    /**
     * Note:获取酒店的设施详细信息列表
     * author fengyuan
     * date 2021/1/28 17:23
     * @param string $code
     * @param string $description
     * @param string $is_for_room
     * @return string
     * @throws GuzzleException
     */
    public function GetPropertyFacilities($code,$description,$is_for_room){
        $url=$this->config['rakuten_content_url'].'/property-facilities';
        $key=$this->config['rakuten_content_api_key'];
        $form_params=[
            'code'=>$code,
            'description'=>$description,
            'is_for_room'=>$is_for_room
        ];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET',$form_params);

        return $result;
    }

    /**
     * Note:检查属性的详细信息更新
     * author fengyuan
     * date 2021/1/28 17:45
     * @param $updated_at
     * @return string
     * @throws GuzzleException
     */
    public function GetHotelsChangelog($updated_at){
        $url=$this->config['rakuten_content_url'].'/hotels-changelog';
        $key=$this->config['rakuten_content_api_key'];
        $form_params=[
            'updated_at'=>$updated_at,
        ];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET',$form_params);

        return $result;

    }




}