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

<head>

    <link href="/plugins/OnlineShop/static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/OnlineShop/static/vendor/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/plugins/OnlineShop/static/css/voucherservice/style.css" rel="stylesheet">
</head>

<body>


<?
$colors = [
    'used' => "#F7355B",
    'free' => "#47BFBD",
    'reserved' => "#FDC45B",
];

$seriesId = $this->getParam('id');
$urlParams = $this->getAllParams();
?>

<div class="container-fluid">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#manager" data-toggle="tab"><?=$this->ts('plugin_onlineshop_voucherservice_tab-manager')?></a></li>
            <li><a href="#statistics" id="statistic-tab" data-toggle="tab"><?=$this->ts('plugin_onlineshop_voucherservice_tab-statistics')?></a></li>
        </ul>

        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="manager">
                <div class="row">
                    <div class="col col-sm-12">
                        <h2><?=$this->ts('plugin_onlineshop_voucherservice_usage-headline')?></h2>
                    </div>
                </div>

                <div class="row header">
                    <div class="col col-sm-4">
                        <button type="button" class="btn btn-primary js-modal" data-modal="generate"><?=$this->ts('plugin_onlineshop_voucherservice_assign-config')?></button>
                    </div>

                    <!--Info and Error Messages Container-->

                    <div class="col col-sm-4">
                        <? if ($this->msg['error']) { ?>
                            <div class="alert alert-danger js-fadeout"> <?= $this->msg['error'] ?>  </div>
                        <? } elseif ($this->msg['success']) { ?>
                            <div class="alert alert-success js-fadeout"> <?= $this->msg['success'] ?>  </div>
                        <? } elseif ($this->msg['result']) { ?>
                            <div class="alert alert-info js-fadeout"> <?= $this->msg['result'] ?>  </div>
                        <? } ?>
                    </div>
                </div>

                <div class="row content-block token-container">

                    <div class="col col-sm-8 token-overview">
                        <div class=" row">
                            <div class="col col-sm-5">
                                <h3 style="float: left;"><i class="glyphicon glyphicon-list"></i> &nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_token-overview-headline')?></h3>
                            </div>
                            <div class="col col-sm-7 text-right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12">
                            </div>
                        </div>

                        <div class="table-container">
                            <table class="table">
                                <thead>
                                <tr class="active">
                                    <th><span class="sort glyphicon glyphicon-chevron-down" data-criteria="token"></span>&nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_table-token')?></th>
                                    <th class="text-center"><span class="sort glyphicon glyphicon-chevron-down" data-criteria="usages"></span>&nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_table-usages')?></th>
                                    <th class="text-center"><span class="sort glyphicon glyphicon-chevron-down" data-criteria="length"></span>&nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_table-length')?></th>
                                    <th class="text-center"><span class="sort active glyphicon glyphicon-chevron-down" data-criteria="timestamp"></span>&nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_table-date')?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if ($this->paginator) { ?>
                                    <? foreach ($this->paginator as $code) { ?>
                                        <tr>
                                            <td class="token"><?= $code['token'] ?></td>
                                            <td class="text-center"><?= (int)$code['usages'] ?></td>
                                            <td class="text-center"><?= (int)$code['length'] ?></td>
                                            <td class="text-center"><?= $code['timestamp'] ?></td>
                                        </tr>
                                    <? } ?>
                                <? } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="statistics">
                <div class="row">
                    <div class="col col-sm-12">
                        <h2><?=$this->ts('plugin_onlineshop_voucherservice_tab-statistics-headline')?></h2>
                    </div>
                </div>

                <div class="row header">

                    <div class="col col-sm-4">
                        <? if ($this->error) { ?>
                            <div class="alert alert-danger"> <?= $this->error ?>  </div>
                        <? } ?>
                    </div>
                    <div class="col col-sm-8 text-right">
                            <button type="button" class="btn btn-default js-modal" data-modal="cleanup-reservations"><span class="glyphicon glyphicon-refresh"></span>&nbsp;<?=$this->ts('plugin_onlineshop_voucherservice_cleanup-reservations-button')?></button>
                    </div>
                </div>

                <?= $this->template('voucher/parts/statistics.php', ['statistics' => $this->statistics, 'colors' => $colors]) ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal Templates -->

<?= $this->template('voucher/parts/modals/single/assign-settings-modal.php', ['settings' => $this->settings, 'generateWarning' => $this->generateWarning, 'urlParams' => $urlParams]) ?>
<?= $this->template('voucher/parts/modals/cleanup-reservations-modal.php', ['urlParams' => $urlParams]) ?>

<!--Plugin and Lib Scripts -->

<script src="/plugins/OnlineShop/static/vendor/jquery-2.1.3.min.js"></script>
<script src="/plugins/OnlineShop/static/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="/plugins/OnlineShop/static/vendor/chart.min.js"></script>

<script src="/plugins/OnlineShop/static/js/voucherservice/voucherSeriesTabScript.js"></script>

<!--Script for statistics-->
<? if (is_array($this->statistics['usage'])) { ?>
    <?= $this->template('voucher/parts/usageStatisticScript.php', ['usage' => $this->statistics['usage'], 'colors'=>$colors]) ?>
<? } ?>


</body>
