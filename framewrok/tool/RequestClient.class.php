<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/25 0025
 * Time: 上午 1:43
 */

namespace framewrok\tool;


class RequestClient
{
    private $url;
    private $user_agent = 'TANG';

    //是否返回数据
    private $return = true;
    //是否携带响应头
    private $header = false;

    private $error;

    public function __set($p, $v)
    {

        $this->$p = $v;
    }

    public function getError()
    {
        //记录错误信息
        return $this->error;
    }

    public function get()
    {
        //初始化资源
        $curl = curl_init();
        //设置url
        curl_setopt($curl, CURLOPT_URL, $this->url);
        //设置useragent
        curl_setopt($curl, CURLOPT_USERAGENT, $this->user_agent);
        //判断是否携带响应头
        if ($this->header) {
            //没有携带了响应头则设置
            curl_setopt($curl, CURLOPT_HEADER, true);

        }
        //判断是否需要返回,为true就说明返回result并同时将其设置
        if ($this->return) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        }
        //发送请求
        $result = curl_exec($curl);

        if (false === $result) {
            $this->error = curl_error($curl);
            return false;
        } else {
            return $result;
        }
    }


}