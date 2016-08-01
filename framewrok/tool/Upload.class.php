<?php
/************
*****@parame ex_mime:映射列表通过扩展自动获取mime********
*****@parame allow_ext_list:定义可允许的扩展名********
*****@parame allow_file_size:定义可允许的长度(字节)********
*****@parame prefix:定义文件名的前缀********
*****@parame upload_path:上传文件的目录********
*/
namespace framewrok\tool;
use \Finfo;
class Upload{
		  private $ex_mime=array(
			  '.jpg'=>'image/jpeg',
			  '.gif'=>'image/gif',
			  '.png'=>'image/png',
			  '.jpeg'=>'image/jpeg',
			  '.html'=>'text/html'
		  );
		  private $allow_ext_list=array('.jpg','.gif','.jpeg','.png');
		  private $allow_file_size=1048576;
		  private $prefix="tang_";
		  private $upload_path='./upload/';
  public function setPrefix($prefix){
         $this->prefix=$prefix;
  }
  public function setUploadPath($upload_path){
	    //检测是否存在目录并且可写
	     if(is_dir($upload_path)&&is_writable($upload_path)){
         $this->upload_path=$upload_path;
		 }
  }
  public function setAllowSize($allow_file_size){
	    //检测用户设置的大小
	      if($allow_file_size>0){
            $this->allow_file_size= (int)$allow_file_size;
		  }
  }
  public function setAllowExtList($allow_ext_list){
         $this->allow_ext_list=$allow_ext_list;
  }

  public function uploadFile($path){
      //判断文件的error
	  if(0 != $path['error']){
	   trigger_error("文件错误(error)");
	   return false;
	  }
	  //定义扩展名
	  
	  $allow_ext_list=$this->allow_ext_list;//???????
	  $ext=strrchr($path['name'],'.');
      //判断扩展名是否存在
	  if(!in_array($ext,$allow_ext_list)){
	    trigger_error("文件类型(扩展名)错误");
		return false;
	  }
	  //定义文件类型
//	  $allow_mime_list=array('image/jpg','image/jpeg','image/gif','image/png');
      $allow_mime_list=$this->getMime($allow_ext_list);
	  //获取文件类型
	  $info=new Finfo(FILEINFO_MIME_TYPE);
	  $mime=$info->file($path['tmp_name']);
	  //判断文件类型
	  if(!in_array($mime,$allow_mime_list)){
	   trigger_error("文件类型错误(mime)");
	   return false;
	  }
	  //定义文件类型大小
	  $allow_file_size=$this->allow_file_size;//????????
	  if($path['size']>$allow_file_size){
	    trigger_error("文件过大,超出了1M");
		return false;
	  }
	  //设置目录
	  $upload_path=$this->upload_path;//?????????
	  //设置子目录，以时间不同来划分
	  $subdir=date("Ymd").'/';
	  //判断是否存在子目录，没有则创建
	  if(!is_dir($upload_path.$subdir)){
	    mkdir($upload_path.$subdir);
	  }
	  //给文件起名
	  $prefix=$this->prefix;//?????????
	  $basename=uniqid($prefix,true).$ext;
	  
	  //移动
	  $move_result=move_uploaded_file($path['tmp_name'],$upload_path.$subdir.$basename);
	  if(!$move_result){
	    trigger_error("文件上传失败");
		return false;
	  }
      return $subdir.$basename;
   }
   //通过修改扩展名自动获取mime
   private function getMime($ext_list){
     //定义一个空数组，用于存储数据
	 $eime_list=[];
	 foreach($ext_list as $v){
	 $eime_list[]=$this->ex_mime[$v];
	 }
     return $eime_list;
   }

}
?>