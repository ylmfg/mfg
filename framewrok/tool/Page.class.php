<?php
/*********param:$pageNow 当前页数**************
**********param:$totalRow 总的记录数*************
**********param:$url 请求的url地址************
**********param:$url_param 请求的url额外参数***********
**********author:意灵魔法馆***********************
*/
/*特别说明用到了两个函数 parse_url(解析一个url并返回关联数组)
*http_build_query(生成一个url请求字符串)******
*/
namespace framewrok\tool;
class Page{
	function showPage($pageNow,$totalRow,$pageSize,$url,$url_param=array()){
		  //判断是否传递参数
		      $info=parse_url($url);


			  if(isset($info['query'])){

				//如果设置参数则用&拼接
				 $url.='&';
			  }else{
			   //如果没有设置参数则用?拼接
				 $url.='?';
			  }

		  //连接额外参数page
		  $url_param['pageNow']='';
		  $url .=http_build_query($url_param);

		  //处理
		 $total_page=ceil($totalRow/$pageSize);
		 //echo $url.$total_page;
		 //首页
		  $start_html=<<<HTML
				<li>
				<a href="{$url}1" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
				</li>
HTML;
			  $content_start=($pageNow-2)<1?1:$pageNow-2;
			  $content_end=($pageNow+2)>=$total_page?$total_page:$pageNow+2;
			  $content_html='';
			  //遍历页码数
			  for($i=$content_start;$i<=$content_end;++$i){
				 $active=($i==$pageNow)?'active':'';
		//翻页
		$content_html.=<<<HTML
				<li class="$active">
				<a href="$url$i">$i</a>
				</li>
HTML;
			  }
		//尾页
		  $end_html=<<<HTML
				<li>
				<a href="$url$total_page" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
				</li>
HTML;
		  //返回分页的部分
return '<ul class="pagination">'.$start_html.$content_html.$end_html.'</ul>';
		}
}
?>
