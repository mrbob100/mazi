<li>
    <a href="">
        <a  href="<?php echo e(route('handbooks',['id'=>$category['id'],'data-id'=>$category['id']])); ?>" >
            <?= $category['name']?>
            <?php if( isset($category['childs']) ): ?>
                <span class="navbar-form pull-right  " style="font-size: 16px;"> </span>
            <?php endif;?>
        </a>
        <?php if( isset($category['childs']) ): ?>
            <ul >
                <?= $this->getMenuHtml($category['childs'], $tab . '--')?>
            </ul>
        <?php endif;?>
</li>