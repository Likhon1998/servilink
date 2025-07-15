<?php
/**
 * @var \App\View\AppView $this
 */

$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to CakePHP App</title>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
</head>
<body>
    <header>
        <div class="container text-center" style="margin-top: 3rem;">
            <h1>Welcome to Our CakePHP Application</h1>
            <p>Please login or register to continue.</p>
            <div style="margin-top: 2rem;">
                <a href="<?= $this->Url->build('/users/login') ?>" class="button" style="margin-right: 1rem;">Login</a>
                <a href="<?= $this->Url->build('/users/register') ?>" class="button button-outline">Register</a>
            </div>
        </div>
    </header>
</body>
</html>
