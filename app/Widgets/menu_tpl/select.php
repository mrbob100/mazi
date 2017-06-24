<option
    value="<?= $category['id']?>"
    <?php $sas=$this->config['tpl'] ?>
    <?php if($category['id'] == $this->model->parent_id) echo ' selected'?>
    <?php if($category['id'] == $this->model->id) echo ' disabled'?>
><?= $tab . $category['name']?></option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'], $tab . '--')?>
    </ul>
<?php endif;?>