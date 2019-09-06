<p>
    <?php echo $this->Html->link('Upload File', ['action' => 'upload'], ['class' => 'btn btn-primary']) ?>
</p>


<div class="row">

    <?php
    foreach ($post as $post) {
        ?>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="<?php echo $post->path; ?>"/>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $post->name; ?></h4>
                    <?php
                    echo $this->Html->link('Edit', ['action' => 'edit'], ['class' => 'btn btn-primary']);

                    // echo $this->Form->button('Delete',['class'=>'btn btn-primary']);
                    // echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
        <?php

    }
    ?>

</div>

