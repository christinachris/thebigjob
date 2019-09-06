<?php
/**
 * @var AppView $this
 * @var array $url
 * @var boolean $disabled
 */

use App\View\AppView;

echo $this->Form->postLink(
    '<i class="fa fa-thumbs-up"></i> Approve',
    isset($disabled) && $disabled ? [] : $url,
    [
        'class' => 'btn btn-oval btn-info btn-edit',
        'escape' => false,
        'disabled' => isset($disabled) && $disabled
    ]
);
