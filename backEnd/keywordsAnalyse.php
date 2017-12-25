<?php
/**
 * Created by PhpStorm.
 * User: jinyueyuan
 * Date: 2017/12/24
 * Time: 19:14
 */
error_reporting(E_ALL ^ E_NOTICE);
require_once './src/QcloudApi/QcloudApi.php';
$username = $_GET['name'];
$url = 'http://120.79.42.137:8080/Entity/Ud7adca934ab4e/Card/Userrelation?Userrelation.adder='.$username;
$titleArray="";
$contentArray="";
//function getUserContent($url){
//    $response = file_get_contents($url );
//    if($response!=null){
//        $newresponse = json_decode($response);
//        $Moment = $newresponse[0]['Moment'];
//        $titleArray = $Moment[0]['title'];
//        $contentArray =  $Moment[0]['content'];
//        for($i = 1;$i<count($Moment);$i++){
//            $titleArray .= (','.$Moment[$i]['title']);
//            $contentArray .= (','.$Moment[$i]['content']) ;
//        }
//    }
//}
function getUserContent($url){
    $response = file_get_contents($url );
    if($response!=null){
        $newresponse = json_decode($response,true);
        //var_dump($newresponse);
        $Moment = $newresponse['Userrelation'];
        //var_dump($Moment);
        $titleArray = $Moment[0]['addee'];
        $contentArray =  $Moment[0]['relation'];
        for($i = 1;$i<count($Moment);$i++){
            $titleArray .= (','.$Moment[$i]['addee']);
            $contentArray .= (','.$Moment[$i]['relation']) ;
        }
    }
}
getUserContent($url);
//echo $titleArray;
//echo $contentArray;
//$response = file_get_contents('http://example.com/path/to/api/call?param1=5');

$config = array(
    'SecretId'       => 'AKIDlPtDMKjpJcnpgQwPdgYHpCOVUI1fosDS',
    'SecretKey'      => 'EH9qNn2EF5kEYihU8bsywGQOBnJeoodH',
    'RequestMethod'  => 'POST',
    'DefaultRegion'  => 'gz');

$wenzhi = QcloudApi::load(QcloudApi::MODULE_WENZHI, $config);

//$package = array(
//    "title"=>$titleArray,
//    "content"=>$contentArray);
$package = array(
    "title"=>"Dior新款，秋冬新款娃娃款甜美圆领配毛领毛呢大衣外套、码数：SM、P330",
    "content"=>"Dior新款，秋冬新款娃娃款甜美圆领配毛领毛呢大衣外套、码数：SM、P330");
$a = $wenzhi->TextKeywords($package);
//
//if ($a === false) {
//    $error = $wenzhi->getError();
//    echo "Error code:" . $error->getCode() . ".\n";
//    echo "message:" . $error->getMessage() . ".\n";
//    echo "ext:" . var_export($error->getExt(), true) . ".\n";
//
//} else {
//    var_dump($a);
//}

//echo "\nRequest :" . $wenzhi->getLastRequest();
//echo "\nResponse :" . $wenzhi->getLastResponse();
echo $wenzhi->getLastResponse();
//echo "\n";
