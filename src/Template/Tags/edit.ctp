<?php
/**
 * @var AppView $this
 * @var Tag $tag
 * @var Article[] $articles
 */

use App\Model\Entity\Article;
use App\Model\Entity\Tag;
use App\View\AppView;

?>
<div class="title-block">
    <div class="title">
        <?= $tag->id ? 'Edit' : 'New' ?> Tag
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <?= $this->Form->create($tag, ['id' => 'tag-form']) ?>

            <div class="card-block">
                <?= $this->Form->control('title') ?>
            </div>

            <div class="card-footer">
                <?= $this->Form->button(__('Save Tag')) ?>

            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>

    <?php if (!$tag->isNew()): ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title">
                            Articles with this tag
                        </p>
                    </div>
                </div>

                <div class="card-block">
                    <?php if (!$tag->articles): ?>
                        No articles yet.
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tag->articles as $article): ?>
                                    <tr>
                                        <td>
                                            <?= $this->Html->link($article->title, ['controller' => 'articles', 'action' => 'view', $article->slug]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                </div>

                <div class="card-footer">
                    <?= $this->Html->link('Add article', ['controller' => 'articles', 'action' => 'add', '?' => ['tag' => $tag->id]], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>

<?php $this->start('script'); ?>
    <script>
        (function() {
            $("#tag-form").validate({
                rules: { title: 'required' }
            });
        })();
    </script>
<?php $this->end(); ?>