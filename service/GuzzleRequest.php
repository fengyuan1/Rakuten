<?php


namespace Rakuten\service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GuzzleRequest
{
    /**
     * Note；发送
     * author fengyuan
     * date 2021/1/22 10:09
     * @param $url
     * @param $type
     * @param $form_params
     * @return string
     * @throws GuzzleException
     */
    public static function GuzzleRequest($key,$url, $type = 'GET', $form_params = [])
    {
        try {

            $client = new Client([
                // 您可以设置任意数量的默认请求选项。
                'timeout' => 200,
                'headers' => [
                    'x-api-key' => $key,
                    'content-type' => 'application/json',
                    'accept-encoding' => 'gzip'
                ]
            ]);

            if ($type == 'POST') {
                //post请求
                $response = $client->request($type, $url, [
                    'json' => $form_params
                ]);
            } else {
                //get请求
                $response = $client->request($type, $url, ['query' => $form_params]);

            }

            $res = $response->getBody()->getContents();

        }catch (\Exception $e){
           return self::returnJson(0,$e->getMessage(),[]);
        }

        return self::returnJson(1,'请求成功',json_decode($res,true));
    }

    public static function returnJson($code,$msg,$data){
        return ['code'=>$code,'msg'=>$msg,'data'=>$data];
    }
}