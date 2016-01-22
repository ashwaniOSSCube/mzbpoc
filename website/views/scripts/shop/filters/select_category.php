<?php
// init
$values = $this->values;

// resort values
$valuesIndex = array();
foreach($this->values as $entry)
{
    $valuesIndex[ $entry['value'] ] = $entry['count'];
}

// category to show
if($this->currentValue)
{
    $current = Object_ProductCategory::getById( $this->currentValue );
}
?>
<div class="filterSection gradient js_filterparent" id="filter-categories">
    <h4 class="title"><?= $this->translate("general.filters." . $this->label) ?></h4>
    <?php if($current): ?>
    <input type="hidden" name="parentCategoryIds" value="<?= $current->getId() ?>" />
    <?php endif; ?>

    <?php
    $view = $this;
    /**
     * @param Object_ProductCategory_List $categories
     * @param integer                     $level
     */
    $printCategories = function($categories, $level) use (&$printCategories, $current, $valuesIndex, $view){
        ?>
        <ul class="level-<?= $level ?>">
            <?php

            $front = Zend_Controller_Front::getInstance();
            $request = $front->getRequest();

            foreach($categories as $category): /* @var Object_ProductCategory $category */

                // init
                $classes = array();

                // ...
                if($category && $current && $category->getId() == $current->getId())
                {
                    $classes[] = 'selected';
                }


                // print category name
                $link = sprintf('<a href="%s" class="name">%s</a>',
                    $view->url(array('country' => $request->getParam('country'), 'name' => $category->getNavigationPath(), 'category' => $category->getId()), "shop-category-listing", true),
                    $category->getName()
                );


                // display sub categories?
                $children = false;
                $reg = sprintf('#^%s#i', $category->getFullPath());
                if($current && preg_match($reg, $current->getFullPath()))
                {
                    $children = true;
                    $classes[] = 'children';
                }

                ?>
                <li class="<?= implode(' ', $classes) ?>">
                    <?php
                    echo $link;

                    // display sub categories?
                    if($children)
                    {
                        $subCategories = new Object_ProductCategory_List();
                        $subCategories->setCondition('o_parentId = ?', $category->getId());
                        $printCategories( $subCategories, $level +1 );
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    };

    // print root categorys
    $printCategories( Website_ShopCategory::getTopLevelCategories(), 0 );
    ?>
</div>
