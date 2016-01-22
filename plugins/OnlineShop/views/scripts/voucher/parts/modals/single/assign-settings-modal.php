<?php
/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


?>

<div id="generate" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body-content">
                <h3><?=$this->ts('plugin_onlineshop_voucherservice_modal_assign-headline')?></h3>
                <div class="row">
                    <div class="col col-sm-8">
                        <table class="table current-data table-only-body">
                            <tbody>
                            <? foreach ($this->settings as $name => $setting) { ?>
                                <tr>
                                    <td><?= $name ?></td>
                                    <td>
                                        <? if (is_numeric($setting)) {
                                            echo number_format($setting, 0, ',', ' ');
                                        } else {
                                            echo $setting;
                                        } ?>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                        <? if ($this->generateWarning) { ?>
                            <div class="alert alert-danger"><?= $this->generateWarning ?></div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer">
                <a href="<?=$this->url(array_merge($this->urlParams, ['action' => 'generate']))?>" class="btn btn-primary js-loading" data-msg="<?=$this->ts('plugin_onlineshop_voucherservice_modal_assign-infotext')?>"><?=$this->ts('plugin_onlineshop_voucherservice_modal_assign-submit')?></a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->ts('plugin_onlineshop_voucherservice_modal_cancle')?></button>
            </div>
        </div>
    </div>
</div>
