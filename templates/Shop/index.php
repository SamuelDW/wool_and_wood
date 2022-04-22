<?php
/**
 * * @var \App\View\AppView $this
 *
 * @var \App\View\AppView $this
 * @var mixed $products
 */

$this->assign('title', 'Wool & Wood | Shop');
?>
<div class="gc">
    <div class="m-90 m-pre-5">

    </div>
</div>
<?php foreach($products as $product):?>
    <?php $productCell = $this->cell('ProductCard', [
            $product
        ]);
    ?>
    <?= $productCell ?>
<?php endforeach ?>
