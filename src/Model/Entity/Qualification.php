<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Qualification Entity
 *
 * @property int $candidate_id
 * @property string $degree_name
 * @property string $degree_level
 * @property \Cake\I18n\FrozenDate $expected_graduation_date
 * @property string $gpa
 * @property string $major
 * @property string $institution
 */
class Qualification extends Entity
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
        'candidate_id'=>true,
        'degree_name' => true,
        'degree_level' => true,
        'expected_graduation_date' => true,
        'gpa' => true,
        'major' => true,
        'institution' => true
    ];
}
