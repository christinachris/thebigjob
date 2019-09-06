<?php
/**
 * @var AppView $this
use App\View\AppView;

**/
?>
<div class="row">
    <div class="col-md-6">
        <div class="card card-block">
            <div class="title-block">
                <h3 class="title">Site Settings</h3>
            </div>

            <div class="subtitle-block">
                <h3 class="subtitle">This page is under construction</h3>
            </div>

            <?php
//            echo $this->Form->create($settings, ['id' => 'settings-form', 'type' => 'file']);
//            echo $this->Form->control('title');
//            echo $this->Form->control('subtitle');
//            echo $this->Html->link('View current image', $settings->background_image_url);
//            echo $this->Form->control('background_image', ['type' => 'file']);
//            echo $this->Form->button(__('Save Settings'));
//            echo $this->Form->end();
            ?>

        </div>
    </div>
</div>

<?php $this->start('script'); ?>
<script>
    (function() {
        $("#settings-form").validate({
            rules: {
                title: {
                    required: true
                },
            }
        });
    })();
</script>
<?php $this->end(); ?>
