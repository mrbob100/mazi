<li>

        <a  href="<?php echo e(route('category',['id'=>$category['id'],  'class'=>'azone-first','data-id'=>$category['id']])); ?>"  >
            <?= $category['name']?>
            <?php if( isset($category['childs']) ): ?>
                <span class="navbar-form pull-left azone "><i class="material-icons" style="margin-top: -2px;color: #005691;">&nbsp;&nbsp;&#x2730;&nbsp;</i></span>
            <?php endif;?>
        </a>
        <?php if( isset($category['childs']) ): ?>
            <ul class="azoneChild" id="azar">
                <?= $this->getMenuHtml($category['childs'])?>
            </ul>
        <?php endif;?>
</li>