<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Админка',
            'brandUrl' => ['/admin'],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Пользователи', 'url' => ['/admin/user']],
                ['label' => 'Организации', 'url' => ['/admin/organization']],
                ['label' => 'Мероприятия', 'url' => ['/admin/event']],
                ['label' => 'Выступающие', 'url' => ['/admin/speaker']],
                ['label' => 'Регистрации', 'url' => ['/admin/registration']],
                ['label' => 'Результаты', 'url' => ['/admin/test-result']],
                ['label' => 'Feedback', 'url' => ['/admin/feedback']],
                ['label' => 'Отзывы', 'url' => ['/admin/comment']],
                ['label' => 'Стр.', 'url' => ['/admin/page']],

                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => '/admin'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left"><?= date('Y') ?> &copy; ООО «ОЙЛ-ТЕЛЕКОМ».</p>

            <p class="pull-right">Разработано студией: HiWEB</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>