<?php
/**
 * @var AppView $this
 * @var Tag $tag
 */

use App\Model\Entity\Tag;
use App\View\AppView;

$plural = count($tag->articles) === 1 ? '' : 's';
$this->assign('heading-class', 'post-heading');
$this->assign('heading', $tag->title);
$this->assign('meta', count($tag->articles) . " article{$plural} tagged with \"{$tag->title}\"");

foreach($tag->articles as $article) {
    echo $this->element('article-snippet', ['article' => $article]);
}
