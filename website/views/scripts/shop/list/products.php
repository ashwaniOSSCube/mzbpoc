<div class="row">
    <?php $i=0; foreach($this->products as $product): $i++; ?>
        <?= $this->partial('shop/list/product.php', array('product'=> $product, 'view'=>$this)) ?>
        <?php if($i%3 == 0): ?>
            </div>
            <div class="row <?= $i ?>">
        <?php endif; ?>
    <?php endforeach; ?>
</div><!-- end row -->
