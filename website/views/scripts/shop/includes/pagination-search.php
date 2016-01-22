<div class="pagination" id="js-pagination">
    <ul>
    <?php if (isset($this->previous)): ?>
        <li>
            <a href="<?= $this->url(array('page' => $this->previous, 'controller' => $this->controller, 'action' => $this->action, 'country' => $this->country), "action"); ?>"><?= $this->translate("page.previous") ?></a>
        </li>
    <?php endif; ?>

    <?php foreach ($this->pagesInRange as $page): ?>
        <li class="page <?= $this->current == $page ? 'active':'' ?>">
            <?php if($this->current == $page): ?>
                <span><?= $page ?></span>
            <?php else: ?>
                <a href="<?= $this->url(array('page' => $page, 'controller' => $this->controller, 'action' => $this->action, 'country' => $this->country), "action"); ?>">
                    <?= $page ?>
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>

    <?php if (isset($this->next)): ?>
        <li>
            <a href="<?= $this->url(array('page' => $this->next, 'controller' => $this->controller, 'action' => $this->action, 'country' => $this->country), "action"); ?>">
                <?= $this->translate("page.next") ?>
            </a>
        </li>
    <?php endif; ?>
    </ul>
</div>