<div class="product-card gc gp">
    <div class="m-90 m-pre-5">
        <h3 class="card-title"><?= $product->title ?></h3>
    </div>
    <div class="m-90 m-pre-5">
        <?= $this->Html->image('cake.logo.svg') ?>
    </div>
    <div class="m-90 m-pre-5">
        <p class="card-price"><?= "£" . $product->price ?></p>
    </div>
    <div class="m-90 m-pre-5">
        <button class="btn add-to-cart-button" type="button"><i class="fa-solid fa-bag-shopping"></i></button>
    </div>

</div>
