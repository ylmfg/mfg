/**
 * Created by Administrator on 2016/6/11 0011.
 */
function blind(target,type,handler){
    //非IE 检测是否可以监听多事件的能力 支持多个事件绑定
    if(target.addEventListener){
        target.addEventListener(type,handler);
    }else if(target.attachEvent){
        target.attachEvent('on'+type,handler);
    }//不支持多个事件绑定
    else{
        target['on'+type]=handler;
    }

}

//创建的xmlHTTPREQUEST
function createXHR(){
    if(window.XMLHttpRequest){
        return new XMLHttpRequest();
    }else{
        return new  ActiveXObject("Microsoft.XMLHTTP");
    }
}
blind($('#btn'),'click',function(e){
     //var event=e||window.event;
     //var target=event.target||event.srcElement;
     var textV=document.getElementsByTagName('textValue');
     var textValue=textV.value;
     var xhr=createXHR();
     xhr.open('post',"{framewrok\core\Factory::U('front/User/anwserMessage')}");
     xhr.setRequestHeader("Content-Type:application/x-www-form-urlencode");
     xhr.send('anwser='+textValue+'&'+'question='+question);

});
