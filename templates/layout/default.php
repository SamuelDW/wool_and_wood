<?php
/**
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbca3d3ac0.js" crossorigin="anonymous"></script>

    <?= $this->Html->css(['app']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('Navigation/header') ?>
    <main class="main">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
    </main>
    <footer>
    </footer>
</body>
</html>
