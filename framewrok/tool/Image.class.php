<?php
namespace framewrok\tool;
class Image{
  //基础路径
  private $thumb_path='./';

  private $src_file;
//类型与创建函数的映射
  private $image_list=array(
	 'image/jpg'=>'imagecreatefromjpg',
	 'image/gif'=>'imagecreatefromgif',
	 'image/jpeg'=>'imagecreatefromjpeg',
	 'image/png'=>'imagecreatefrompng',
  );
//输出的映射
  private $image_out=array(
       'image/png'=>'imagepng',
       'image/jpeg'=>'imagejpeg',
       'image/jpg'=>'imagejpg',
       'image/gif'=>'imagegif',
	  );
  public function __construct($file){
  
    if(!file_exists($file)){
	    trigger_error("文件出错".E_USER_WARNING());
	}else{
	   $this->src_file=$file;
	}
  }
  public function setThumbPath($thumb_path){
    if(is_dir($thumb_path)){
	      $this->thumb_path=$thumb_path;
	} 
  }
    public function createFun($file){
    $mime=$this->getMime($file);
	return $this->image_list[$mime];
     
  }
  public function getMime($file){
     $info=getimagesize($file);
	 $mime=$info['mime'];
     return $mime;
  
  }
  //缩略图
  public function thumb($thumb_w,$thumb_h){
   $creatFun=$this->createFun($this->src_file);//$createFun=
   $src_img =$creatFun($this->src_file);
//缩略图画布
$thumb_img=imagecreatetruecolor($thumb_w,$thumb_h);

$color=imagecolorallocate($thumb_img,255,255,255);

//填充颜色
imagefill($thumb_img,0,0,$color);

//计算原图宽高
$src_w=imagesx($src_img);
$src_h=imagesy($src_img);

//原图的采样的区域位置
$src_x=0;
$src_y=0;
//原图采样的宽 高
$src_area_w=$src_w;
$src_area_h=$src_h;

if($src_w/$thumb_w>$src_h/$thumb_h){
$thumb_area_w=$thumb_w;
$thumb_area_h=$src_h/($src_w/$thumb_w);
}else{
$thumb_area_h=$thumb_h;
$thumb_area_w=$src_w/($src_h/$thumb_h);
}
//缩略图的采样的区域位置
$thumb_x=($thumb_w-$thumb_area_w)/2;
$thumb_y=($thumb_h-$thumb_area_h)/2;

imagecopyresampled($thumb_img,$src_img,$thumb_x,$thumb_y,$src_x,$src_y,$thumb_area_w,$thumb_area_h,$src_area_w,$src_area_h);

//缩略图的基础路径
$thumb_path=$this->thumb_path;
$sub_dir=date("Ymd").'/';
if(!is_dir($thumb_path.$sub_dir)){
  mkdir($thumb_path.$sub_dir,0755,true);
}
//获取后缀名与原图保持一致
$ext=strrchr($this->src_file,'.');

$basename=uniqid('',true).'-'.$thumb_w.'x'.$thumb_h.$ext;

//输出图像
$out_mime=$this->getMime($this->src_file);

$out_image=$this->image_out[$out_mime];
$out_image($thumb_img,$thumb_path.$sub_dir.$basename);

//销毁画布资源
imagedestroy($thumb_img);
imagedestroy($src_img);

return $sub_dir.$basename;

  }
}
?>