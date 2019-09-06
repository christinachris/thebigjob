<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Posts Entity
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property FrozenTime $created
 * @property int $candidate_id
 */
class Posts extends Entity
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
        'path' => true,
        'created' => true,
        'candidate_id' => true
    ];
}
