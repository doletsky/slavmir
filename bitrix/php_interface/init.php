<?
const AUDIO_IBLOCK_ID = 1;
const ARTISTS_IBLOCK_ID = 2;
const VIDEO_IBLOCK_ID = 3;
const PLAYLIST_IBLOCK_ID = 4;

const PROGRAM_IBLOCK_ID = 5;
const PROGRAM_ARTISTS_IBLOCK_ID = 6;

const NEWS_AUTHORS_IBLOCK_ID = 9;
const NEWS_IBLOCK_ID = 10;
const ARTICLES_IBLOCK_ID = 11;
const NEWS_SLIDER_IBLOCK_ID = 12;
const ARTICLES_SLIDER_IBLOCK_ID = 13;




// Sec -> Hours:Minutes:Second
function duration($sec){
   if( strpos( $sec, ":" ) !== false ){
      return $sec;
   }
   return gmdate("i:s",$sec);
}


const RADIO_HLBLOCK_ID = 1;
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
CModule::IncludeModule('highloadblock');
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();   
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}
const CONFIG_HLBLOCK_ID = 2;



class sv{
   static $config = array();
   static $configObj = null;
}



function SetConfig($key,$value){
   $val = GetConfig( $key );
   if( is_null( $val ) ){ // новое значение
      $result = sv::$configObj::add(array(
         "UF_KEY" => $key,
         "UF_VALUE" => $value
      ));
   }
   else{ // изменить старое
      #echo 'change';
      $result = sv::$configObj::update(sv::$config[$key]["ID"], array("UF_VALUE"=>$value));
      sv::$config[$key]["UF_VALUE"] = $value;
   }
}
function GetConfig($key){
   if( !count(sv::$config) ){
      if( is_null( sv::$configObj ) ) sv::$configObj = GetEntityDataClass(CONFIG_HLBLOCK_ID);
      #echo 'init';
      $rsData = sv::$configObj::getList(array(
         'select' => array('*')
      ));
      while($el = $rsData->fetch()){
         sv::$config[$el["UF_KEY"]] = $el;
      }
   }
   if( isset( sv::$config[$key] ) ){
      return sv::$config[$key]["UF_VALUE"];   
   }
   else return null;
}



function pre($t){
	echo '<pre>';
	print_r($t);
	echo '</pre>';
}

/**
 * Склоняем словоформу
 */
function morph($n, $f1, $f2, $f5) {
   $n = abs($n) % 100;
   $n1= $n % 10;
   if ($n>10 && $n<20) return $f5;
   if ($n1>1 && $n1<5) return $f2;
   if ($n1==1) return $f1;
   return $f5;
}

function getDateMonth($ruStandart){ // конвертирует формат даты с 04.11.2008 в 04 Ноября, 2008
	$MES = array( 
	"01" => "января", 
	"02" => "февраля", 
	"03" => "марта", 
	"04" => "апреля", 
	"05" => "мая", 
	"06" => "июня", 
	"07" => "июля", 
	"08" => "августа", 
	"09" => "сентября", 
	"10" => "октября", 
	"11" => "ноября", 
	"12" => "декабря"
	);
	$arData = explode(".", $ruStandart); 
	$d = ($arData[0] < 10) ? substr($arData[0], 1) : $arData[0];

	$newData = $d." ".$MES[$arData[1]]." ".$arData[2]; 
	return $newData;
}

function small_russian_date() {
   $translation = array(
      "am" => "дп",
      "pm" => "пп",
      "AM" => "ДП",
      "PM" => "ПП",
      "Monday" => "понедельник",
      "Mon" => "пн",
      "Tuesday" => "вторник",
      "Tue" => "вт",
      "Wednesday" => "среда",
      "Wed" => "ср",
      "Thursday" => "четверг",
      "Thu" => "чт",
      "Friday" => "пятница",
      "Fri" => "пт",
      "Saturday" => "суббота",
      "Sat" => "сб",
      "Sunday" => "воскресенье",
      "Sun" => "вс",
      "January" => "января",
      "Jan" => "янв",
      "February" => "февраля",
      "Feb" => "фев",
      "March" => "марта",
      "Mar" => "мар",
      "April" => "апреля",
      "Apr" => "апр",
      "May" => "мая",
      "May" => "мая",
      "June" => "июня",
      "Jun" => "июн",
      "July" => "июля",
      "Jul" => "июл",
      "August" => "августа",
      "Aug" => "авг",
      "September" => "сентября",
      "Sep" => "сен",
      "October" => "октября",
      "Oct" => "окт",
      "November" => "ноября",
      "Nov" => "ноя",
      "December" => "декабря",
      "Dec" => "дек",
      "st" => "ое",
      "nd" => "ое",
      "rd" => "е",
      "th" => "ое",
      );
   if (func_num_args() > 1) {
      $timestamp = func_get_arg(1);
      return strtr(date(func_get_arg(0), $timestamp), $translation);
   } else {
      return strtr(date(func_get_arg(0)), $translation);
   };
}

function russian_date() {
   $translation = array(
      "am" => "дп",
      "pm" => "пп",
      "AM" => "ДП",
      "PM" => "ПП",
      "Monday" => "Понедельник",
      "Mon" => "Пн",
      "Tuesday" => "Вторник",
      "Tue" => "Вт",
      "Wednesday" => "Среда",
      "Wed" => "Ср",
      "Thursday" => "Четверг",
      "Thu" => "Чт",
      "Friday" => "Пятница",
      "Fri" => "Пт",
      "Saturday" => "Суббота",
      "Sat" => "Сб",
      "Sunday" => "Воскресенье",
      "Sun" => "Вс",
      "January" => "Января",
      "Jan" => "Янв",
      "February" => "Февраля",
      "Feb" => "Фев",
      "March" => "Марта",
      "Mar" => "Мар",
      "April" => "Апреля",
      "Apr" => "Апр",
      "May" => "Мая",
      "May" => "Мая",
      "June" => "Июня",
      "Jun" => "Июн",
      "July" => "Июля",
      "Jul" => "Июл",
      "August" => "Августа",
      "Aug" => "Авг",
      "September" => "Сентября",
      "Sep" => "Сен",
      "October" => "Октября",
      "Oct" => "Окт",
      "November" => "Ноября",
      "Nov" => "Ноя",
      "December" => "Декабря",
      "Dec" => "Дек",
      "st" => "ое",
      "nd" => "ое",
      "rd" => "е",
      "th" => "ое",
      );
   if (func_num_args() > 1) {
      $timestamp = func_get_arg(1);
      return strtr(date(func_get_arg(0), $timestamp), $translation);
   } else {
      return strtr(date(func_get_arg(0)), $translation);
   };
}

/**
 * Генерация превьюшек для больших изображений
 *
 * @param string $src путь от корня сайта к исходной картинке
 * @param int $size размер изображения (сторона квадрата в пикселях)
 * @param int $lifeTime время жизни превьюшки в секундах (по дефолту месяц)
 * @return string
 */
function MakeImage($src, $params = false) {
	if (!is_array($params) AND is_numeric($params)) $params = array('w'=>intval($params)); // подмена
	if (is_numeric($src)) if ($src > 0) $src = CFile::GetPath($src);
   if( !$src ) return false;
	if (file_exists($_SERVER['DOCUMENT_ROOT'].$src)) {
		$ext = strtolower(pathinfo($_SERVER['DOCUMENT_ROOT'].$src, PATHINFO_EXTENSION)); // Расширение файла картинки
		$allowed_ext = array("jpg", "jpeg", "gif", "png");
		if (in_array($ext, $allowed_ext)) {
			$base_name = basename($src, ".".$ext); // Основное имя файла (без расширения)
			$code = substr(md5(serialize($params)), 8, 16); // сократим суффикс с параметрами до 16 символов, но возьмем его из середины хэша
         $newExt=$ext;
         if(isset($params["f"])){
               $newExt=$params["f"];
         }
			$target_file = $_SERVER['DOCUMENT_ROOT'].dirname($src)."/".$base_name."_thumb_".$code.".".$newExt; // Имя файла с превьюшкой
			$source_filemtime = filemtime($_SERVER['DOCUMENT_ROOT'].$src);
			if (file_exists($target_file)) $target_filemtime = filemtime($target_file);
			else $target_filemtime = 0;
			if ($source_filemtime>$target_filemtime) { // файл-исходник обновлен, либо нету сгенерированного
				require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/phpThumb/phpthumb.class.php"); // Подключаем и иннициализируем phpThumb
				$phpThumb = new phpThumb();
				$phpThumb->f = $ext;
				$phpThumb->src = $src;
				$phpThumb->config_allow_src_above_docroot = true; // Разрешаем работать в других разделах (для многосайтовости)
				// Дефолтные параметры:
				$phpThumb->q = 100;
				$phpThumb->bg = "ffffff";
				$phpThumb->far = "C";
				$phpThumb->aoe = 0;
				/*$phpThumb->zc = 1;*/
				// Применение всех параметров
				if (is_array($params)) {
					foreach ($params as $param=>$value) {
						$phpThumb->$param = $value;
					}
				}
				$phpThumb->GenerateThumbnail();
				$phpThumb->RenderToFile($target_file);
			}
		}
		if (file_exists($target_file)) {
			return substr($target_file, strlen($_SERVER['DOCUMENT_ROOT']));
		}
	}
	return false;
} 


AddEventHandler("sale", "OnSalePayOrder", Array("addEventClass", "accountPay"));
\Bitrix\Main\Loader::includeModule('sale');
use Bitrix\Sale;
class addEventClass
{
    //при изменении флага оплаты автоматически выставляются разрешение на доставку и флаг отгружен, что
    //переводит автоматом пополняет вн.счет пользователя
    //!ВНИМАНИЕ! в случае перечислений не только для зачисления на счет доставка также произойдет автоматически!
    function accountPay($id, $flag)
    {
        if($flag=="Y")
        {
            $order = Sale\Order::load($id);
            if ($order)
            {
                $shipmentCollection = $order->getShipmentCollection();
                foreach ($shipmentCollection as $shipment) {
                    if (!$shipment->isSystem()) {
                        $shipment->allowDelivery(); //разрешаем доставку
                        $shipment->setField("DEDUCTED", "Y"); //флаг отгрузки "отгружен"
                    }
                }
                $result = $order->save();
            }
        }
    }
}