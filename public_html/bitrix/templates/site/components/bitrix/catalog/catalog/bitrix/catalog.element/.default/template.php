<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>

<div class="row">
    <?if(is_array($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'])):?>
    <div class="portfolio-works-slider">
        <div class="slider-inner">
            <?if ($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']['SRC']):?>
            <div class="item-wrap">
                <a data-blueimp="portfolio-works" class="item" href="<?=$arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']['SRC']?>">
                    <img src="<?=$arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']['SRC']?>" alt="<?=$arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE']['DESCRIPTION']?>"/>
                </a>
            </div>
            <?else:?>
            <?foreach ($arResult['DISPLAY_PROPERTIES']['img']['FILE_VALUE'] as $img):?>
            <div class="item-wrap">
                <a data-blueimp="portfolio-works" class="item" href="<?=$img['SRC']?>">
                    <img src="<?=$img['SRC']?>" alt="<?=$img['DESCRIPTION']?>"/>
                </a>
            </div>
            <?endforeach;?>
            <?endif;?>
        </div>
        <div class="slider-nav slider-next intervolga-chevron-right"></div>
        <div class="slider-nav slider-prev intervolga-chevron-left"></div>
    </div>
    <div id="live-galery" class="blueimp-gallery blueimp-gallery-controls " style="display: none;">
        <div class="slides" style="padding: 10px 0px; width: 7680px;"></div>
        <a class="prev"></a>
        <a class="next"></a>
        <a class="close"></a>
    </div>
    <div class="col-xs-12 col-md-12">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
    <?endif;?>
</div>

<?if($arResult["CATALOG_RING"]["NEXT"] || $arResult["CATALOG_RING"]["PREV"]):?>
<ul class="pager">
    <?if($arResult["CATALOG_RING"]["PREV"]):?>
    <li class="previous">
        <a href="<?=$arResult["CATALOG_RING"]["PREV"]["DETAIL_PAGE_URL"]?>">
            <div class="title">Предыдущий товар</div>
            <?=$arResult["CATALOG_RING"]["PREV"]["NAME"]?>
        </a>
    </li>
    <?endif;?>
    <?if($arResult["CATALOG_RING"]["NEXT"]):?>
    <li class="next">
        <a href="<?=$arResult["CATALOG_RING"]["NEXT"]["DETAIL_PAGE_URL"]?>">
            <div class="title">Следующий товар</div>
            <?=$arResult["CATALOG_RING"]["NEXT"]["NAME"]?>
        </a>
    </li>
    <?endif;?>
</ul>
<?endif;?>
