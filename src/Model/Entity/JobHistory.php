<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobHistory Entity
 *
 * @property int $candidate_id
 * @property string $title
 * @property string $company
 * @property string $job_description
 * @property \Cake\I18n\FrozenDate $date_start
 * @property \Cake\I18n\FrozenDate $date_finish
 */
class JobHistory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'candidate_id',
        'title' => true,
        'company' => true,
        'job_description' => true,
        'date_start' => true,
        'date_finish' => true
    ];
}
