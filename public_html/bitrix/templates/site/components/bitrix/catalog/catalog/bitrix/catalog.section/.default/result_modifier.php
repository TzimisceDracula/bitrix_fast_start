<?php
foreach($arResult["ITEMS"] as $cell=>$arElement)
{
    if ($arElement['PREVIEW_PICTURE']['ID'])
    {
        $arParams['CATALOG_WIDTH'] = 288;
        $arParams['CATALOG_HEIGHT'] = 288;
        $file = Cfile::ResizeImageGet($arElement['PREVIEW_PICTURE']['ID'],array('width' => $arParams['CATALOG_WIDTH'], 'height' => $arParams['CATALOG_HEIGHT']), BX_RESIZE_IMAGE_EXACT, true);
        $arResult['ITEMS'][$cell]['PREVIEW_PICTURE']['WIDTH'] = $file['width'];
        $arResult['ITEMS'][$cell]['PREVIEW_PICTURE']['HEIGHT'] = $file['height'];
        $arResult['ITEMS'][$cell]['PREVIEW_PICTURE']['SRC'] = $file['src'];
    }

}
