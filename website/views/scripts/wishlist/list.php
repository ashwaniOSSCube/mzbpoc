<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
$wishlist = $this->wishlist;
/* @var OnlineShop_Framework_ICart $wishlist */
?>
<div class="container">
    <div id="mainbody">
        <div class="row">
            <h1 class="page-title">My wishlist</h1>

            <div id="wishlist-list">
                <?php if(count($wishlist->getItems()) === 0): ?>
                    your wishlist is empty!
                <?php else: ?>
                    <form action="<?= $this->url(array('action' => 'quantity'), 'wishlist') ?>" method="post">
                    <table id="wishlist-list-items">
                        <tbody>
                        <?php foreach($wishlist->getItems() as $item): $linkDetail = $item->getProduct()->getShopDetailLink($this); ?>
                            <tr>
                                <td class="wishlist-list-items-image">
                                    <a href="<?= $linkDetail ?>" ><img src="<?= $item->getProduct()->getFirstImage(array('width' => 120, 'height' => 120, 'aspectratio' => true)) ?> " alt="" border="0" /></a>
                                </td>
                                <td class="wishlist-list-items-name" valign="top">
                                    <h4><a href="<?= $linkDetail ?>" ><?= $item->getProduct()->getOSName() ?></a></h4>
                                    <b><?= $item->getPrice() ?></b>
                                    <div class="wishlist-list-items-options">
                                        <a href="<?= $this->url(array('action' => 'add', 'item' => $item->getItemKey()), 'cart') ?>" class="add-to-cart btn btn-mini btn-primary" >add to cart</a>
                                        |
                                        <a href="<?= $this->url(array('action' => 'remove', 'item' => $item->getItemKey()), 'wishlist') ?>" >remove from wishlist</a>
                                    </div>
                                </td>
                                <td class="wishlist-list-items-added" valign="top">Added on <?= $item->getAddedDate()->toString('M. MMM YYYY') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>