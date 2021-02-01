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
        $client = new Client([
            // 您可以设置任意数量的默认请求选项。
            'timeout' => 200,
            'headers'=>[
                'x-api-key' => $key,
                'content-type' => 'application/json',
                'accept-encoding'=> 'gzip'
            ]
        ]);

        if($type=='POST'){
            //post请求
            $response = $client->request($type, $url, [
                'form_params' => $form_params
            ]);
        }else{
            //get请求
          $response = $client->request($type, $url, ['query'=>$form_params] );

        }

        $res = $response->getBody()->getContents();

        return $res;
    }
}