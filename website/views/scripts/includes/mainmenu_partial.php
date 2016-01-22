<?php
    /**@var $page Zend_Navigation_Page*/
    foreach ($this->container as $page) {
?>
    <?php if($page->getVisible()) { ?>

        <li class="<?= $page->getActive(true) ? 'active' : '' ?>">
            <a class="<?= $page->getClass() ?> <?= $page->getActive(true) ? 'mainactive' : '' ?>" id="menu_<?= $page->getId() ?>" href="<?= $page->getDocument()?>"> <?= $page ?> </a>

            <?php if($page->hasChildren()) { ?>

                <ul>
                    <?php foreach($page as $subpage) { ?>
                        <?php if($subpage->getVisible()) { ?>
                            <li>
                                <a href="<?= $subpage->getDocument() ?>"> <?= $subpage ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>

                </ul>

            <?php } ?>

        </li>
    <?php } ?>

<?php } ?>

