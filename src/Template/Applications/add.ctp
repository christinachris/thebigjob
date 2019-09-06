<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>

<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($application) ?>
    <fieldset>
        <legend><?= __('Add application') ?></legend>
        <?php
        echo $this->Form->input('candidate.id');
        ?>
    </fieldset>
    <?= $this->Form->submit(); ?>
    <?= $this->Form->end() ?>
</div>
