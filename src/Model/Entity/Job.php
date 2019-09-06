<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $name
 * @property string $contract_type
 * @property string $job_details
 * @property FrozenTime $created
 *
 * @property Application[] $applications
 */
class Job extends Entity
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
        'id' => false,
        'name' => true,
        'published' => true,
        'contract_type' => true,
        'job_details' => true,
        'salary' => true,
        'published' => true,
        'applications' => true,
        'created' => true
    ];
}
