<?php
/**
 * @var AppView $this
 * @var array $url
 * @var boolean $disabled
 */

use App\View\AppView;

echo $this->Form->postLink(
    '<i class="fa fa-trash"></i> Delete',
    isset($disabled) && $disabled ? [] : $url,
    [
        'class' => 'btn btn-oval btn-danger btn-delete',
        'escape' => false,
        'disabled' => isset($disabled) && $disabled
    ]
);
