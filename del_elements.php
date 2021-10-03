<?php
set_time_limit(60000);
// включаем вывод ошибочек
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// включаем замер исполнения скрипта

// подключаем prolog bitrix 
require $_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/prolog_before.php';
// подключаем нужные модули
CModule::IncludeModule("iblock");
$infoblock = 3; // Инфоблок с ID ХХХ (необходимо установить ID нужного инфоблока)
$rs_Element = CIBlockElement::GetList(array(), array('IBLOCK_ID' => $infoblock), array('ID'));
while ( $ar_Element = $rs_Element->Fetch() ) {
    $ar_Resu[] = array(  // собираем массив того, что нам нужно
        'ID' => $ar_Element['ID'], // id элемента
    ); 
}
foreach ($ar_Resu as $element) {
   CIBlockElement::Delete($element["ID"]);
}
?>
