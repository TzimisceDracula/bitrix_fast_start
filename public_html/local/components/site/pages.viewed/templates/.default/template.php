<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<?if($arResult["ITEMS"][""]):?>

<div class="activities-description-wrap">
    <div class="activities-description">
        <div class="container">
            <div class="activities-inner">
                <h3>Последние посещенные вами страницы</h3>
                <ul>
                        <?
                        $arFilter = array(
                            "IBLOCK_ID" => @$arParams['IBLOCKS'],
                            "PROPERTY_USER" => CUser::GetSessionHash()
                        );

                        $arOrder = array(
                            "created" => "desc"
                        );
                        $arSelect = array(
                            "NAME",
                            "PROPERTY_URL"
                        );
                        $rsItems = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                        while($arItem = $rsItems -> GetNext())
                        {?>
                            <li><a href="<?echo $arItem["PROPERTY_URL_VALUE"]?>"><?echo $arItem["NAME"]?></a></li>
                       <? }
                        ?>


                </ul>
            </div>
        </div>
    </div>
</div>
<?endif;?>

