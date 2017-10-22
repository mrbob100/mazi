<li>
    <a href="">
        <a  href="<?php echo e(route('category',['id'=>$category['id'],'data-id'=>$category['id']])); ?>" >
        <?= $category['name']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="navbar-form pull-right  "> </span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'], $tab . '   ')?>
        </ul>
    <?php endif;?>
</li>