<?php
/**
 * @var AppView $this
 * @var array $url
 * @var boolean $disabled
 */

use App\View\AppView;

echo $this->Form->postLink(
    '<i class="fa fa-eye-slash"></i> Unpublish',
    isset($disabled) && $disabled ? [] : $url,
    [
        'class' => 'btn btn-oval btn-warning btn-edit',
        'escape' => false,
        'disabled' => isset($disabled) && $disabled
    ]
);

