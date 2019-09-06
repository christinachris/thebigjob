<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[] $articles
 * @var string[] $tagList
 * @var string $query
 * @var int $selectedTagId
 */

?>
<style>
    .col1 {
        float: left;
        width: 80%;
        margin-bottom: 20px;
    }
    .col2 {
        float: right;
        width: 20%;
        margin-bottom: 20px;
    }
    .search-box-wrapper {
        display: inline-flex;
        font-size: 16px;
    }

    .search-box-input {
        font-size: inherit;
        border: 0.05em solid #85ce36;
        /*border-radius: 0.5em 0 0 0.5em;*/
        padding: 0.2em 0.5em;
        outline: 0;
        float: left;
        width: 100%;
    }

    .search-box-input:hover,
    .search-box-input:focus {
        border-color: #85ce36;
    }

    .search-box-button {
        font-size: inherit;
        border: 0.2em solid #85ce36;
        /*border-radius: 0 0.5em 0.5em 0;*/
        background-color: #85ce36;
        border-left: 0;
        color: white;
        font-weight: bold;
        outline: 0;
        cursor: pointer;
        float: right;
        width: 100%;
        margin-bottom: 20px;
    }

    .search-box-button:hover,
    .search-box-button:focus {
        border-color: #85ce36;
        background-color: #85ce36;
    }

</style>
<div class="title-block">
    <div class="title">Search results</div>
    <div class="subheading"><?= "Showing articles that match \"{$query}\"" ?></div>
    <div class="large-search-wrapper">
        <?= $this->Form->create(null, ['url' => ['controller' => 'articles', 'action' => 'search'], 'method' => 'GET']) ?>
        <div class="row">
            <div class="col-lg-9">
                <?= $this->Form->control('query', ['label' => '', 'class' => 'search-box-input', 'value' => $query]) ?>
                <?= $this->Form->control('tag', ['class' => 'form-control', 'options' => $tagList, 'empty' => 'Select a tag...', 'value' => $selectedTagId]) ?>
            </div>
            <div class="col-lg-3">
                <?= $this->Form->button('Search', ['type' => 'submit','class'=>'search-box-button']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
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
        <?php foreach ($articles as $article): ?>
            <tr class="article-row <?= $article->published ? 'published' : 'unpublished' ?>">
                <td style="width: 40%">
                    <?= $this->Html->link($article->title, ['action' => 'edit', $article->slug]) ?>
                </td>
                <td>
                    <?= $article->created->timeAgoInWords() ?>
                </td>
                <td class="action-col">
                    <?php if ($article->published) { ?>
                        <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'view', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/edit', ['url' => ['action' => 'edit', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/hide', ['url' => ['action' => 'hide', $article->id]]) ?>
                        <?= $this->element('Admin/Buttons/archive', ['url' => ['action' => 'archive', $article->id]]) ?>
                    <?php } else {?>
                        <?= $this->element('Admin/Buttons/preview', ['url' => ['action' => 'view', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/edit', ['url' => ['action' => 'edit', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/publish', ['url' => ['action' => 'publish', $article->slug]]) ?>
                        <?= $this->element('Admin/Buttons/archive', ['url' => ['action' => 'archive', $article->id]]) ?>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
$paginator = $this->Paginator->setTemplates([
    'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
    'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
    'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
    'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt;</a></li>',
    'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt;</a></li>'
]);

?>
<nav>
    <ul class="pagination">
        <?php
        echo $paginator->first();
        if($paginator->hasPrev()){
            echo $paginator->prev();
        }
        echo $paginator->numbers();
        if($paginator->hasNext()){
            echo $paginator->next();
        }
        echo $paginator->last();
        ?>
    </ul>
</nav>

</div>

