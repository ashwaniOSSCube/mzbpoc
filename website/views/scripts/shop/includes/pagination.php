<div class="pagination" id="js-pagination">
    <ul>
    <?php if (isset($this->previous)): ?>
        <li>
            <a class="pagination-link" href="<?= $this->url(array('page' => $this->previous)); ?>"><?= $this->translate("page.previous") ?></a>
        </li>
    <?php endif; ?>

    <?php foreach ($this->pagesInRange as $page): ?>
        <li class="page <?= $this->current == $page ? 'active':'' ?>">
            <?php if($this->current == $page): ?>
                <span><?= $page ?></span>
            <?php else: ?>
                <a class="pagination-link" href="<?= $this->url(array('page' => $page)); ?>">
                    <?= $page ?>
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>

    <?php if (isset($this->next)): ?>
        <li>
            <a class="pagination-link" href="<?= $this->url(array('page' => $this->next)); ?>">
                <?= $this->translate("page.next") ?>
            </a>
        </li>
    <?php endif; ?>
    </ul>
</div>