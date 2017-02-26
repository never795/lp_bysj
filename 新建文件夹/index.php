<?php 





$user = array('FromUserName' =>"null" ,'ToUserName'=>"null",'MsgType'=>null);

getMes();
//resMsg($user['FromUserName'],$user['ToUserName'],"text","content");

function getMes(){
	$postStr = @$GLOBALS["HTTP_RAW_POST_DATA"];
	//file_put_contents("log.txt", $postStr, FILE_APPEND);
	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    $user['FromUserName'] = $postObj->FromUserName;
    $user['ToUserName'] = $postObj->ToUserName;
    $user['MsgType'] = $postObj->MsgType;
    $keyword = trim($postObj->Content);
    $time = time();

    switch ($user['MsgType']) {
    	case 'text':
    		$content = "lp";
    		resMsg($user['FromUserName'],$user['ToUserName'],"text",$content);
    		break;
    	
    	default:
    		# code...
    		break;
    }

}

function resMsg($fromUsername="",$toUsername="",$msgType="text",$content=""){
	$xmlRes = "
		<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[%s]]></MsgType>
		<Content><![CDATA[%s]]></Content>
		</xml>
	";
	$resultStr = sprintf($xmlRes, $fromUsername, $toUsername, time(), $msgType, $content);
    echo $resultStr;
}





















function res(){
if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "haha";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
}
 ?>