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


$orderAgent = $this->orderAgent;
$order = $orderAgent->getOrder();
$currency = $orderAgent->getCurrency();

?>
<div class="row order-detail">
    <div class="col-xs-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title row" style="font-weight: bold;">
                    <?php
                    $urlList = $this->url(['action' => 'list', 'controller' => 'admin-order', 'module' => 'OnlineShop'], null);
                    ?>
                    <div class="col-sm-6">
                        <a href="<?= $urlList ?>"><?= $this->translate('online-shop.back-office.order-list') ?></a>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <a href="#" data-action="open" data-id="<?= $order->getId() ?>"><?= $order->getOrdernumber() ?></a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <?= $order->getOrderDate() ?>
                    </div>
                </div>

                <h2 class="hide panel-title row" style="font-weight: bold;">
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-menu-left"></span></a>

                        <?= $this->translate('online-shop.back-office.order') ?> <a href="#" data-action="open" data-id="<?= $order->getId() ?>"><?= $order->getOrdernumber() ?></a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <?= $order->getOrderDate() ?>
                    </div>
                </h2>
            </div>
        </div>
        <!--
        TODO primary options
        <ul class="well well-sm nav nav-justified">
            <li class="col-md-12">
                <a class="text-center text-muted" href="#"><span class="glyphicon glyphicon-envelope"></span> <br>Nachricht</a>
            </li>
            <li class="col-md-12">
                <a class="text-center text-muted" href="#"><span class="glyphicon glyphicon-print"></span> <br>Tasks</a>
            </li>
            <li class="col-md-12">
                <a class="text-center text-muted" href="javascript:window.print();"><span class="glyphicon glyphicon-print"></span> <br>Drucken</a>
            </li>
            <li class="col-md-12">
                <a class="text-center text-danger" href="#"><span class="glyphicon glyphicon-remove"></span> <br>Storno</a>
            </li>
        </ul>
        -->

        <!-- order items -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-list-alt"></span> <?= $this->translate('online-shop.back-office.order.order-items') ?>

                <?php if($order->getComment()): ?>
                    <button type="button" class="btn btn-xs btn-default pull-right" data-container="body" data-toggle="popover" data-placement="right" title="<?= $this->translate('online-shop.back-office.order.comment.user') ?>" data-content="<?= nl2br($order->getComment()) ?>">
                        <span class="glyphicon glyphicon-comment"></span>
                    </button>
                <?php endif; ?>
            </div>
            <table class="table table-order-items">
                <thead>
                <tr>
                    <th width="70">ID</th>
                    <th><?= $this->translate('online-shop.back-office.order.product') ?></th>
                    <th class="text-right"><?= $this->translate('online-shop.back-office.order.price.unit') ?></th>
                    <th width="60" class="text-center"><?= $this->translate('online-shop.back-office.order.quantity') ?></th>
                    <th class="text-right" width="110"><?= $this->translate('online-shop.back-office.order.price.total') ?></th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr class="active">
                    <td colspan="6"></td>
                </tr>
                <?php foreach($order->getPriceModifications() ?: [] as $modification): /* @var \Pimcore\Model\Object\Fieldcollection\Data\OrderPriceModifications $modification */ ?>
                    <tr>
                        <td colspan="4" class="text-right"><?= $modification->getName() ?></td>
                        <th class="text-right"><?= $currency->toCurrency($modification->getAmount()) ?: '-' ?></th>
                        <th></th>
                    </tr>
                <?php endforeach; ?>
                <tr class="active">
                    <td colspan="4" class="text-right">Total</td>
                    <th class="text-right"><?= $currency->toCurrency($order->getTotalPrice()) ?></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($order->getItems() as $item):
                    /* @var OnlineShop_Framework_AbstractOrderItem $item */
                    ?>
                    <tr>
                        <td>
                            <a href="#" data-action="open" data-id="<?= $item->getId() ?>"><?= $item->getId() ?></a>
                        </td>
                        <td>
                            <?php
                            echo $item->isCanceled()
                                ? sprintf('<s>%s</s>', $item->getProductName())
                                : $item->getProductName()
                            ?>
                        </td>
                        <td class="text-right"><?= $currency->toCurrency($item->getTotalPrice() / $item->getAmount()) ?></td>
                        <td class="text-center"><?= $item->getAmount() ?></td>
                        <td class="text-right"><?= $currency->toCurrency($item->getTotalPrice()) ?></td>
                        <td>
                            <?php if($item->getComment()): ?>
                                <button type="button" class="btn btn-xs btn-default" data-container="body" data-toggle="popover" title="<?= $this->translate('online-shop.back-office.order.comment.user') ?>" data-content="<?= nl2br($item->getComment()) ?>">
                                    <span class="glyphicon glyphicon-comment"></span>
                                </button>
                            <?php endif; ?>

                            <!-- item actions -->
                            <?php if($item->isEditAble()):
                                $urlEdit = $this->url([
                                    'action' => 'item-edit'
                                    , 'controller' => 'admin-order'
                                    , 'module' => 'OnlineShop'
                                    , 'id' => $item->getId()
                                ]);
                                ?>
                                <div class="btn-group">
                                    <a href="<?= $urlEdit ?>" data-toggle="modal" data-target="#popup" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <?php if($item->isCancelAble()):
                                                $urlCancel = $this->url([
                                                    'action' => 'item-cancel'
                                                    , 'controller' => 'admin-order'
                                                    , 'module' => 'OnlineShop'
                                                    , 'id' => $item->getId()
                                                ]);
                                                ?>
                                                <a href="<?= $urlCancel ?>" data-toggle="modal" data-target="#popup" class="text-danger">
                                                    <span class="glyphicon glyphicon-remove text-danger"></span>
                                                    <?= $this->translate('online-shop.back-office.order.cancel.item') ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if($item->isComplaintAble()):
                                                $urlComplaint = $this->url([
                                                    'action' => 'item-complaint'
                                                    , 'controller' => 'admin-order'
                                                    , 'module' => 'OnlineShop'
                                                    , 'id' => $item->getId()
                                                ]);
                                                ?>
                                                <a href="<?= $urlComplaint ?>" data-toggle="modal" data-target="#popup" class="text-danger">
                                                    <span class="glyphicon glyphicon-share-alt"></span>
                                                    <?= $this->translate('online-shop.back-office.order.complaint.item') ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if($orderAgent->hasPayment()): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-credit-card"></span> <?= $this->translate('online-shop.back-office.order.payment.history') ?>
                </div>
                <table class="table table-condensed">
                    <tbody>
                    <?php foreach($order->getPaymentInfo() as $item):
                        /* @var \Pimcore\Model\Object\Fieldcollection\Data\PaymentInfo $item */

                        if(!$item->getPaymentFinish())
                        {
                            continue;
                        }

                        switch($item->getPaymentState())
                        {
                            case 'paymentAuthorized':
                                $class = 'bg-info text-info';
                                break;
                            case 'committed':
                                $class = 'bg-success text-success';
                                break;
                            case 'aborted':
                            default:
                                $class = 'bg-danger text-danger';
                                break;
                        }
                        ?>
                        <tr>
                            <td width="130"><small><?= $item->getPaymentFinish() ? $item->getPaymentFinish()->toString(Zend_Date::DATETIME_MEDIUM) : '' ?></small></td>
                            <td width="100">
                                <small>
                                    <?php
                                    $provider[] = 'qpay';
                                    $provider[] = 'datatrans';
                                    $provider[] = 'paypal';

                                    $amount = null;
                                    foreach($provider as $p)
                                    {
                                        $getter = sprintf('getProvider_%s_amount', $p);
                                        if(method_exists($item, $getter))
                                        {
                                            $amount = $item->$getter();
                                            if($amount)
                                            {
                                                echo $amount;
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </small>
                            </td>
                            <td class="<?= $class ?>">
                                <small title="<?= $item->getPaymentState() ?>"><?= $item->getMessage() ?></small>
                            </td>
                            <td class="text-right"><small><?= $item->getPaymentReference() ?></small></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-xs-5">
        <!-- customer infos -->
        <div role="tabpanel" class="tabpanel-customer-info">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#addressInvoice" aria-controls="addressInvoice" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-file"></span> <?= $this->translate('online-shop.back-office.order.address.invoice') ?></a>
                </li>
                <?php if($order->hasDeliveryAddress()) :?>
                    <li role="presentation">
                        <a href="#addressDelivery" aria-controls="addressDelivery" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home"></span> <?= $this->translate('online-shop.back-office.order.address.delivery') ?></a>
                    </li>
                <?php endif; ?>

                <?php if($order->getCustomer()): ?>
                    <li role="presentation" class="pull-right">
                        <a href="#customerDetail" aria-controls="customerDetail" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span></a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                /**
                 * print google static map
                 * @param stdClass $geoPoint
                 */
                $printMap = function (stdClass $geoPoint) {
                    $urlLink = sprintf('http://maps.google.de/maps?q=loc:%1$s,%2$s'
                        , $geoPoint->lat
                        , $geoPoint->lng
                    );
                    $urlImage = sprintf('http://maps.googleapis.com/maps/api/staticmap?center=%1$s,%2$s&zoom=11&size=200x200&sensor=false'
                        , $geoPoint->lat
                        , $geoPoint->lng
                    );
                    ?>
                    <a href="<?= $urlLink ?>" target="_blank" class="pull-right address-map">
                        <img src="<?= $urlImage ?>" alt=""/>
                    </a>
                    <?php
                };
                ?>

                <div role="tabpanel" class="tab-pane active" id="addressInvoice">
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <?php
                                $address = [];
                                if($order->getCustomerCompany())
                                {
                                    echo sprintf('<h4>%1$s</h4>', nl2br($order->getCustomerCompany()));
                                }
                                if($order->getCustomerName())
                                {
                                    echo sprintf('%1$s<br/>', $order->getCustomerName());
                                }
                                ?>
                                <?= $order->getCustomerStreet() ?><br/>
                                <?= $order->getCustomerZip().' - '.$order->getCustomerCity() ?><br/>
                                <?= strtoupper(Zend_Locale::getTranslation($order->getCustomerCountry(), 'territory')) ?><br/>
                                <?php if($order->getCustomer() && method_exists($order->getCustomer(), 'email')): ?>
                                    <?= sprintf('<a href="mailto:%1$s">%1$s</a>', $order->getCustomer()->getEmail()) ?>
                                <?php endif; ?>
                            </address>
                        </div>

                        <?= $this->geoAddressInvoice ? $printMap($this->geoAddressInvoice) : '' ?>
                    </div>
                </div>

                <?php if($order->hasDeliveryAddress()) :?>
                    <div role="tabpanel" class="tab-pane" id="addressDelivery">
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <?php
                                $address = [];
                                if($order->getDeliveryCompany())
                                {
                                    echo sprintf('<h4>%1$s</h4>', nl2br($order->getDeliveryCompany()));
                                }
                                if($order->getDeliveryName())
                                {
                                    echo sprintf('%1$s<br/>', $order->getDeliveryName());
                                }
                                ?>
                                <?= $order->getDeliveryStreet() ?><br/>
                                <?= $order->getDeliveryZip().' - '.$order->getDeliveryCity() ?><br/>
                                <?= strtoupper(Zend_Locale::getTranslation($order->getDeliveryCountry(), 'territory')) ?><br/>
                            </address>
                        </div>

                        <?= $this->geoAddressDelivery ? $printMap($this->geoAddressDelivery) : '' ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($order->getCustomer()): ?>
                <div role="tabpanel" class="tab-pane" id="customerDetail">

                    <h4><?= $this->translate('online-shop.back-office.order.customer.account') ?></h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="well text-center" style="margin-bottom: 0;">
                                <a href="#" data-action="open" data-id="<?= $order->getCustomer()->getId() ?>">
                                    <span class="glyphicon glyphicon-user" style="font-size: 400%;"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-condensed">
                                <tbody>
                                <?php
                                $arrIcon = [
                                    'created' => 'glyphicon glyphicon-certificate'
                                    , 'email' => 'glyphicon glyphicon-envelope'
                                    , 'orderCount' => 'glyphicon glyphicon-shopping-cart'
                                ];
                                foreach($this->arrCustomerAccount as $field => $value)
                                {
                                    echo sprintf('<tr><th>%1$s</th><td><span class="%3$s"></span> %2$s</td></tr>'
                                        , $this->translate('online-shop.back-office.order.customer-account.' . $field)
                                        , $value
                                        , '' #$arrIcon[ $field ]
                                    );
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- timeline -->
        <div class="timeline">

            <!-- Line component -->
            <div class="line text-muted"></div>

            <?php foreach($this->timeLine as $name => $group): ?>
                <!-- Separator -->
                <div class="separator text-muted">
                    <time><?= $name ?></time>
                </div>
                <?php foreach($group as $item): ?>
                    <!-- Panel -->
                    <article class="panel panel-<?= $item['context'] ?>">

                        <!-- Icon -->
                        <div class="panel-heading icon">
                            <span class="<?= $item['icon'] ?>" title="<?= $this->translate('online-shop.back-office.order.history.' . $item['type']) ?>"></span>
                        </div>
                        <!-- /Icon -->

                        <!-- Body -->
                        <div class="panel-body">
                            <div class="media ng-scope">
                                <img src="<?= $item['avatar'] ?>" width="40" class="img-circle pull-left" title="<?= $item['user'] ?>">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <?= $item['title'] ?>
                                        <small><?= $this->translate('online-shop.back-office.order.history.' . $item['type']) ?></small>
                                    </h4>
                                    <p><?= nl2br($item['message']) ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /Body -->

                    </article>
                    <!-- /Panel -->
                <?php endforeach; ?>

            <?php endforeach; ?>

            <!-- Separator -->
            <div class="separator text-muted">
                <time><?= $order->getOrderdate()->get(Zend_Date::DATETIME_MEDIUM) ?></time>
            </div>
            <!-- /Separator -->

            <article class="panel panel-default panel-outline">
                <div class="panel-heading icon">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="panel-body">
                    <?= $this->translate('online-shop.back-office.order.commit') ?>
                </div>
            </article>
        </div>
    </div>
</div>

<!-- Modal / Popup -->
<div class="modal" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php $this->headScript()->captureStart(); ?>
    $(function () {

        // pimcore open object
        $('[data-action=open]').click(function () {

            pimcore.helpers.openObject( $(this).data('id') , "object");

        });


        // enable popover
        $('[data-toggle="popover"]').popover({html: true});


        // remove modal on close
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
            $(this).find('.modal-content').html("");
        });

    });
    <?php $this->headScript()->captureEnd(); ?>
</script>