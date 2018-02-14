<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
include(dirname(__FILE__).'/../cron/radio.php');
header('Content-Type: application/json');


$entity_data_class = GetEntityDataClass(RADIO_HLBLOCK_ID);
$rsData = $entity_data_class::getList(array(
	'select' => array("*"),
	'order' => array('UF_DT'=>'desc'),
	'limit' => 4
));
$lastArr = array();
$currArr = array();
$i = 0;
while($el = $rsData->fetch()){
    //убрать из UF_NAME символы  [ и ]
    $tmp1=explode("[",$el["UF_NAME"]);
    $tmp2=explode("]",$tmp1[1]);
    $el["UF_NAME"]=$tmp2[0];
	if($el["UF_DBID"]){
		if( $i == 0 ){
			$currArr=array(
				"n" => $el["UF_NAME"],
				"a" => $el["UF_ARTIST"],
				"d" => $el["UF_DURATION"]
			);
		}
		else{
			$class = "no-info";
			$lastArr[]=array(
				"n" => $el["UF_NAME"],
				"a" => $el["UF_ARTIST"],
				"d" => $el["UF_DURATION"],
				"c" => $class
			);
		}
		$i++;
	}
}

krsort($lastArr);
$lastArrOrd = array();
$i = 0;
foreach( $lastArr as $item ){
	if($i==0) $item["c"] .= ' gradient';
	$lastArrOrd[] = $item;
	$i++;
}
$out = array(
	"cur" => $currArr,
	"last" => $lastArrOrd,
	"next" => array()
);
echo json_encode( $out );
?>