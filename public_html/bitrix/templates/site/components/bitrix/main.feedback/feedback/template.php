<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">


    <form action="<?=POST_FORM_ACTION_URI?>#feedback" method="POST" class="form-horizontal form-style-dashed">
        <?=bitrix_sessid_post()?>
        <h1>Задать вопрос:</h1>
        <a name="feedback"></a>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="form-group">
                    <label for="input-6" class="col-sm-4 col-xs-12 control-label <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>">Ваше имя:</label>

                    <div class="col-sm-8">
                        <input id="input-6" type="text" class="form-control" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="Иван Иванов" <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-9" class="col-sm-4 col-xs-12 control-label <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>">E-mail:</label>

                    <div class="col-sm-8">
                        <input id="input-9" type="email" class="form-control" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="info@intervolga.ru"
                               <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-10" class="col-sm-4 col-xs-12 control-label <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>">Текст сообщения:</label>

                    <div class="col-sm-8">
                        <textarea name="MESSAGE" class="form-control" rows="7" id="input-10"><?=$arResult["MESSAGE"]?></textarea>
                    </div>
                </div>
                <?if($arParams["USE_CAPTCHA"] == "Y"):?>
                    <div class="form-group">
                        <label for="input-5" class="col-sm-4 col-xs-12 control-label required">Защитный код:</label>

                        <div class="col-sm-8 col-xs-12">
                            <div class="input-group-captcha">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="image">
                                            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                                            <img class="img-responsive" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" alt="CAPTCHA"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="captcha_word" type="text" placeholder="Код с картинки" maxlength="50" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endif;?>

                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button class="btn btn-primary" type="submit">Отправить</button>
                    </div>
                </div>
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <input type="hidden" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
            </div>
        </div>
    </form>




</form>
</div>