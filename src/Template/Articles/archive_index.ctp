<?php
/**
 * @var AppView $this
 * @var Article[] $articles
 */

use App\Model\Entity\Article;
use App\View\AppView;

?>

<div class="title-block">
    <div class="title">
        Archived Articles
    </div>
</div>

<div class="card card-block">

    <table class="table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($archivedArticles as $article): ?>
                <tr>
                    <td style="width: 40%">
                        <?= $this->Html->link($article->title, ['action' => 'edit', $article->slug]) ?>
                    </td>
                    <td>
                        <?= $article->created->timeAgoInWords() ?>
                    </td>
                    <td class="action-col">
                        <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'view', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/restore', ['url' => ['action' => 'restore', $article->id]]) ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    th > a:after {
        content: " \f0dc";
        font-family: FontAwesome;
    }
    th > a.asc:after {
        content: " \f0dd";
        font-family: FontAwesome;
    }
    th > a.desc:after {
        content: " \f0de";
        font-family: FontAwesome;
    }
</style>