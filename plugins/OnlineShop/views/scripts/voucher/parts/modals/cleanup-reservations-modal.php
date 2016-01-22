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

<div id="cleanup-reservations" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="clearfix"></div>
            </div>
            <div class="modal-body-content">
                <form class="form-horizontal js-cleanup-reservations-modal-form"
                      action="<?=$this->url(array_merge($this->urlParams, ['action' => 'cleanup-reservations']))?>">
                    <h3><?=$this->ts('plugin_onlineshop_voucherservice_modal_cleanup-reservations-headline')?></h3>
                    <div class="form-group" style="margin-top: 20px">
                        <div class="col col-sm-12">
                            <label for="duration"><?=$this->ts('plugin_onlineshop_voucherservice_modal_cleanup-reservations-olderthan-x-minutes')?></label>
                            <input type="number" name="duration" id="duration" class="form-control form-control-25 text-center" min="0" value ="5"/>
                        </div>
                        <input type="hidden" name="id" value="<?= $this->getParam('id') ?>">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="col col-sm-6 text-left">
                    <p><?=$this->ts('plugin_onlineshop_voucherservice_modal_cleanup-reservations-infotext')?></p>
                </div>
                <button onclick="$('.js-cleanup-reservations-modal-form').submit()" class="btn btn-primary js-loading"
                        data-msg="Cleaning up Tokens, please wait."><?=$this->ts('plugin_onlineshop_voucherservice_modal_cleanup-reservations-submit')?>
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->ts('plugin_onlineshop_voucherservice_modal_cancle')?></button>
            </div>
        </div>
    </div>
</div>