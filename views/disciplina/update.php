<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title = $model->codDisciplina .' - '. $model->nomeDisciplina;
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?= Html::encode($this->title) ?></h1>
    <ol class="breadcrumb">
        <li><a href="?r=disciplina/index"><i class="fa fa-calendar"></i> Disciplinas</a></li>
        <li class="active"><a href="?r=disciplina/index">Lista</a></li>
    </ol>
</section>
<section class="content">
<div class="box box-success">    
    <div class="disciplina-update box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
</section>
