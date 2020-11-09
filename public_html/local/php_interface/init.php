<?php
use \Bitrix\Main;
$eventManager = Main\EventManager::getInstance();
$eventManager -> addEventHandlerCompatible("main", "OnEndBufferContent", array("PagesViewed","Collection"));


class PagesViewed
{
    function Collection($content)
    {
        global $APPLICATION;
        $iblockID = 4;
        $i =0;

        $urlString = Main\Application::getInstance()->getContext()->getRequest()->getRequestUri();
        $url = new Main\Web\Uri($urlString);

        if (Main\Loader::includeModule("iblock")){
            $arFilter = array(
                'IBLOCK_ID' => $iblockID,
                'PROPERTY_USER' => CUser::GetSessionHash(),
                'PROPERTY_URL' => $url -> getPath()
            );
        }
        if (!CIBlockElement::GetList(false, $arFilter, array(), false, false)){
            $el = new CIBlockElement;
            $arLoadProductArray = array(
                'MODIFIED_BY' => CUser::GetSessionHash(),
                'IBLOCK_SECTION_ID' => false,
                'IBLOCK_ID' => $iblockID,
                'PROPERTY_VALUES' => array(
                    'url' => $url -> getPath(),
                    'user' => CUser::GetSessionHash(),
                ),
                'NAME' => $APPLICATION->getTitle()
            );
            $el -> Add($arLoadProductArray);

            $arSelect = array("ID");
            $arFilter = array(
                'IBLOCK_ID' => $iblockID,
                'PROPERTY_USER' => CUser::GetSessionHash()
            );
            $res = CIBlockElement::GetList(array('created' => 'desc'), $arFilter, false, false, $arSelect);
            while ($ar_fields = $res->GetNext()){
                $i++;
                if ($i > 3){
                    CIBlockElement::Delete($ar_fields['ID']);
                }
            }
        }
    }
}