<?php
/**
 * @var AppView $this
 * @var Application $application
 */

use App\Model\Entity\Application;
use App\View\AppView;

?>
<div class="applications view large-9 medium-8 columns content">
    <h3><?= h($application->candidates) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employer') ?></th>
            <td><?php //employer company_name?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Title') ?></th>
            <td><?php //job name?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Name') ?></th>
            <td><?php //candidate first name. last name?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Email') ?></th>
            <td><?php //candidate email?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Phone Number') ?></th>
            <td><?php //Candidate phone_no?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate State') ?></th>
            <td><?php //Candidate State?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Candidate Country') ?></th>
            <td><?php //Candidate Country?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Employer') ?></th>
            <td><?php //employer company_name?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?php //h($application->date) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Resume') ?></th>
            <td><?php //candidate resume file?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Cover Letter') ?></th>
            <td><?php //candidate cover letter?></td>
        </tr>
    </table>

</div>
