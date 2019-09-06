<?php
namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property string $title
 * @property FrozenTime $created
 * @property FrozenTime $modified
 *
 * @property Article[] $articles
 */
class Tag extends Entity
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
        'title' => true,
        'created' => true,
        'modified' => true,
        'articles' => true
    ];
}
