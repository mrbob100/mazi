<li>

<a href="#">
        <h5><?= $category['name']?></h5>
         <input type="checkbox"  style="margin-top: 10px;"  id="<?php echo e($category['id'])?>" value="<?php echo e($category['id'])?>" multiple name="<?php echo e($category['name'])?>"  />
        <?php if( isset($category['childs']) ): ?>
            <span class="navbar-form pull-left azone "><i class="material-icons" style="margin-top:-20px; color: #005691;">&nbsp;&nbsp;&#x2730;&nbsp;</i></span>
        <?php endif;?>
</a>
    <?php if( isset($category['childs']) ): ?>
        <ul class="azoneChild" id="azar">
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>