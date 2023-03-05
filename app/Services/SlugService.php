<?php

namespace App\Services;

use GuzzleHttp\Client;
use Overtrue\Pinyin\Pinyin;

use Illuminate\Support\Str;

class SlugService
{
    public function translate($text)
    {
        // 实例化 HTTP 客户端
        $client = new Client;

        // 初始化配置信息
        $api = 'https://fanyi-api.baidu.com/api/trans/vip/translate';
        $appid = config('services.baidu_translate.appid');
        $key = config('services.baidu_translate.key');
        $salt = time();

        // 如果没有配置百度翻译，自动使用兼容的拼音方案
        if (empty($appid) || empty($key)) {
            return $this->pinyin($text);
        }

        // 根据文档，生成 sign
        // http://api.fanyi.baidu.com/api/trans/product/apidoc
        // appid+q+salt+密钥 的MD5值
        $sign = md5($appid . $text . $salt . $key);

        // 发送 HTTP Get 请求
        $response = $client->get($api, [
            'query' => [
                "q"     =>  $text,
                "from"  => "zh",
                "to"    => "en",
                "appid" => $appid,
                "salt"  => $salt,
                "sign"  => $sign,
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        logger($result);

        // 尝试获取获取翻译结果
        if (isset($result['trans_result'][0]['dst'])) {
            return Str::slug($result['trans_result'][0]['dst']);
        } else {
            // 如果百度翻译没有结果，使用拼音作为后备计划。
            return $this->pinyin($text);
        }
    }

    public function pinyin($text)
    {
        return Str::slug(Pinyin::permalink($text));
    }
}
