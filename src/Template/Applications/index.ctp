<?php
/**
 * @var AppView $this
 * @var Application[]|CollectionInterface $applications
 */

use App\Model\Entity\Application;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>

<div class="title-block">
    <div class="title">
        Applications
    </div>
</div>

<div class="card card-block">

    <table class="table">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('Employer') ?></th>
            <th><?= $this->Paginator->sort('Job Name') ?></th>
            <th><?= $this->Paginator->sort('Candidate') ?></th>
            <th><?= $this->Paginator->sort('Date Created') ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($applications as $application): ?>
            <tr class="application-row ">
                <td style="width: 20%">
                    <?= $this->Html->link($application->Employer['company_name'], ['action' => 'view', $application->id]) ?>
                    <?php //echo $application->job->employer->company_name;?>
                </td>
                <td style="width: 20%">
                    <?= $this->Html->link($application->Jobs['name'], ['action' => 'view', $application->id]) ?>
                    <?php echo $application->job->name;?>
                </td>
                <td style="width: 30%">
                    <?= $this->Html->link($application->Candidates['first_name'], ['action' => 'view', $application->id]) ?>
                    <?php echo $application->candidate->first_name;?>
                    <?php echo $application->candidate->last_name;?>
                </td>
                <td>
                    <?= $application->date->timeAgoInWords() ?>
                </td>
                <td class="action-col">
                    <?= $this->element('Admin/Buttons/view', ['url' => ['action' => 'view', $application->id]]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <?php
    $paginator = $this->Paginator->setTemplates([
        'number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
        'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
        'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt;</a></li>',
        'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt;</a></li>'
    ]);

    ?>
    <nav>
        <ul class="pagination">
            <?php
            echo $paginator->first();
            if($paginator->hasPrev()){
                echo $paginator->prev();
            }
            echo $paginator->numbers();
            if($paginator->hasNext()){
                echo $paginator->next();
            }
            echo $paginator->last();
            ?>
        </ul>
    </nav>

</div>

<style>
    th > a:after {
        content: " \f0dc";
        font-family: FontAwesome;
    }
    th > a.asc:after {
        content: " \f0dd";
        font-family: FontAwesome;
    }
    th > a.desc:after {
        content: " \f0de";
        font-family: FontAwesome;
    }
</style>