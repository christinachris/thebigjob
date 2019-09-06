<?php
/**
 * @var AppView $this
 * @var array $url
 */

use App\View\AppView;

echo $this->Html->link(
    '<i class="fa fa-edit"></i> Edit',
    $url,
    ['class' => 'btn btn-oval btn-primary btn-edit', 'escape' => false]
);