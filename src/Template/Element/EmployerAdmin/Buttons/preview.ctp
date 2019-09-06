<?php
/**
 * @var AppView $this
 * @var array $url
 * @var string|null $target
 */

use App\View\AppView;

$attributes = ['class' => 'btn btn-oval btn-secondary btn-view', 'escape' => false];
if (isset($target)) {
    $attributes['target'] = $target;
}

echo $this->Html->link(
    '<i class="fa fa-search"></i> Preview',
    $url,
    $attributes
);