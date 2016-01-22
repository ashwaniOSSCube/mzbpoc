<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 01.07.13
 * Time: 10:12
 * To change this template use File | Settings | File Templates.
 *
 * @var $this Pimcore_View
 */
?>
<table width="700" class="content-table no-border" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td>
            <?=$this->wysiwyg('introduction')?>
        </td>
    </tr>

</table>

<?if(!$this->editmode) { ?>

    TODO

<?} else {?>
    <table width="700" class="content-table" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td style="padding: 10px; background-color:#ccc;">Hier stehen die E-Mail-Daten</td>
        </tr>
    </table>
<?}?>