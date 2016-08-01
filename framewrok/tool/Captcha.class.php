<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/31 0031
 * Time: 上午 10:44
 */
namespace framewrok\tool;

class Captcha
{

    public function mkImage()
    {
        $captcha_list = [
            '意',
            '灵',
            '魔',
            '法',
            '传',
            '递',
            '创',
            '新',
        ];
//验证码的长度
        $captcha_list_length = count($captcha_list);
//随机选取四个中文
        $captcha_length = 4;
//定义已选取中文的列表
        $code_list = [];
//用于存放随机产生中文的下标
        $rand_list = [];
        for ($i = 1; $i <= $captcha_length; ++$i) {
            //随机产生的下标
            $rand_index = mt_rand(0, $captcha_list_length - 1);
            if (in_array($rand_index, $rand_list)) {
                //重新来一次
                --$i;
                continue;
            }
            //将下标存放到rand_list;
            $rand_list[] = $rand_index;
            $code_list[] = $captcha_list[$rand_index];
        }
//var_dump($code_list);
//echo "<br>";
//conde_list
//从已经选择的中文中再选三个
        $select_length = 3;
//定义已经选择的列表
//for($i=1;$i<=$select_length;++$i){
//    $select_rand_index=mt_rand(0,$captcha_length-1);
//    if(in_array($select_rand_index,$rand_list)) {
//        --$i;
//        continue;
//    }
//    $rand_list[]=$select_rand_index;
//    $select_list[]=$code_list[$select_rand_index];
//}
        $select_list = array_rand($code_list, $select_length);

        foreach ($select_list as $index) {
            $captcha_select[] = $code_list[$index];
        }
//将所选择的中文存储到session中用于验证
        @session_start();
        $_SESSION['captcha'] = implode('', $captcha_select);
//验证码图像
        $width = 120;
        $height =60;
//创建画布
        $img = imagecreatetruecolor($width, $height);
        $bg_color = imagecolorallocate($img, 255, 255, 255);

//填充一个白色的背景图
        imagefill($img, 0, 0, $bg_color);
//文字的字体
        $font_file = FRAMEWROK_PATH . 'tool/SIMLI.TTF';
        $codeW_count = 0;
//对每个文字处理
        foreach ($code_list as $key => $code) {
            //记录每个文字的内容
            $code_info[$key]['code_content'] = $code;
            //记录每个文字的大小
            $code_info[$key]['font_size'] = mt_rand(20,24);
            //记录每个文字的颜色
            $code_info[$key]['color'] = imagecolorallocate($img, mt_rand(50, 100), mt_rand(50, 100), mt_rand(50, 100));
            //记录每个文字的角度,所选择的需要倒立
            if (in_array($code, $captcha_select)) {
                $code_info[$key]['angle'] = 180;
            } else {
                $code_info[$key]['angle'] = 0;
            }
            //记录每个文字的位置,因为我们不知道每个文字的位置,所以我们需要获取文字的框
            $bbox = imageftbbox($code_info[$key]['font_size'], $code_info[$key]['angle'], $font_file, $code_info[$key]['code_content']);
            //每个字的宽高
            $code_info[$key]['code_w'] = abs($bbox[2] - $bbox[0]);
            //每个字的高
            $code_info[$key]['code_h'] = abs($bbox[7] - $bbox[1]);

            //计算全部字整体的宽
            $codeW_count += $code_info[$key]['code_w'];
        }
//计算文字的起始位置
        $start_x = ($width - $codeW_count) / 2;
//开始对每个文字写入
        foreach ($code_info as $key => $code) {
            if ($code['angle'] == 180) {
                // 将坐标向 右 上 移动 该字符的宽高
                $x = $start_x + $code['code_w'];
                $y = ($height - $code['code_h']) / 2;
            } else {
                $x = $start_x;
                $y = $height / 2;
            }
            imagefttext($img, $code['font_size'], $code['angle'], $x, $y, $code['color'], $font_file, $code['code_content']);
            $start_x += $code['code_w'];
        }
//输出图像
         header('Content-Type:image/png');
//         var_dump(headers_sent($f, $l));
//         var_dump($f, $l);
        ob_end_clean();
        imagepng($img);
//销毁图像资源
        imagedestroy($img);

    }
}