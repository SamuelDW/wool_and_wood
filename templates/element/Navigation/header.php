<?php
/**
 * * @var \App\View\AppView $this
 *
 * @var \App\View\AppView $this
 */
?>
<header>
    <div class="gc" id = "header-logo">
        <div class="m-100">
            Image
        </div>
    </div>
    <div class="gc" id="nav-links">
        <div class = "m-100 gp">
            <nav>
                <div class="m-25">
                    <?= $this->Html->link('Home', ['prefix' => false, 'controller' => 'Home', 'action' => 'index']) ?>
                </div>
                <div class="m-25">
                <?= $this->Html->link('About', ['prefix' => false, 'controller' => 'About', 'action' => 'index']) ?>
                </div>
                <div class="m-25">
                <?= $this->Html->link('Shop', ['prefix' => false, 'controller' => 'Shop', 'action' => 'index']) ?>
                </div>
                <div class="m-25">
                <?= $this->Html->link('Contact', ['prefix' => false, 'controller' => 'Contact', 'action' => 'index']) ?>
                </div>
            </nav>
        </div>
        <div class="gc" id="search-bar">
            <div class="m-100">
                <?= $this->Form->control('search', [
                    'class' => 'input-text',
                    'id' => 'universal-search',
                    'label' => 'Search',
                    'placeholder' => 'Search...',
                    'data-ajax-url' => $this->Url->build([
                        'controller' => 'Searches',
                        'action' => 'freeText',
                        '_ext' => 'json',
                    ]),
                ]) ?>
            </div>
        </div>
    </div>
</header>
