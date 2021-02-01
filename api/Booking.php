<?php


namespace Rakuten\api;


use Rakuten\service\GuzzleRequest;

class Booking
{
    protected $config;

    public function __construct()
    {
        $this->config=include('setting.php');
    }

    /**
     * Note: 获得酒店列表
     * author fengyuan
     * date 2021/1/28 19:00
     * @param $form_params array 需要传入的参数
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GetHotelList($form_params){

        $url=$this->config['rakuten_booking_url'].'/hotel_list';
        $key=$this->config['rakuten_booking_api_key'];

        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET',$form_params);

        return $result;
    }

    /**
     * author fengyuan
     * date 2021/1/29 10:20
     * @param $form_params 需要传入的参数
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GetHotelRooms($form_params)
    {
        $url=$this->config['rakuten_booking_url'].'/hotel_rooms';
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET',$form_params);

        return $result;
    }

    /**
     * Note:预定前查询预定政策
     * @param $form_params 需要传入的参数
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException author fengyuan
     * date 2021/1/29 10:41
     */
    public function PostBookingPolicy($form_params)
    {
        $url=$this->config['rakuten_booking_url'].'/booking_policy';
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'POST',$form_params);

        return $result;
    }

    /**
     * Note:查询预定生成预定政策
     * author fengyuan
     * date 2021/1/29 11:35
     * @param $booking_policy_id 预定政策id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GetBookingPolicy($booking_policy_id){

        $url=$this->config['rakuten_booking_url'].'/booking_policy/:'.$booking_policy_id;
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET');

        return $result;
    }

    /**
     * Note:生成预定政策以后，预定房间前置动作
     * author fengyuan
     * date 2021/1/29 11:57
     * @param $form_params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function PostPreBook($form_params)
    {
        $url=$this->config['rakuten_booking_url'].'/pre_book';
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'POST',$form_params);

        return $result;
    }

    /**
     * Note:下单预定酒店
     * @param $booking_id
     * @param $form_params array
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * author fengyuan
     * date 2021/1/29 12:31
     */
    public function PostBook($booking_id,$form_params)
    {
        $url=$this->config['rakuten_booking_url'].'/book/:'.$booking_id;
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'POST',$form_params);

        return $result;
    }

    /**
     * Note：获取预定状态
     * author fengyuan
     * date 2021/1/29 14:05
     * @param $booking_id
     * @param $status
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function GetBookStatus($booking_id,$status)
    {
        $url=$this->config['rakuten_booking_url'].'/book/:'.$booking_id.'/'.$status;
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'GET');

        return $result;
    }

    /**
     * Note:取消订单
     * author fengyuan
     * date 2021/2/1 18:01
     * @param $form_params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function PostCancel($form_params){
        $url=$this->config['rakuten_booking_url'].'/cancel';
        $key=$this->config['rakuten_booking_api_key'];
        $result=GuzzleRequest::GuzzleRequest($key,$url,'POST',$form_params);

        return $result;
    }


    

}