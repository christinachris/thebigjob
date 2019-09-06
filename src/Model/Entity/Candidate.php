<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidate Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_no
 * @property string $state
 * @property string $country
 * @property string $postname
 * @property string $postpath
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Application[] $applications
 * @property \App\Model\Entity\JobHistory[] $job_histories
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\Qualification[] $qualifications
 * @property \App\Model\Entity\Skill[] $skills
 */
class Candidate extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone_no' => true,
        'state' => true,
        'country' => true,
        'postname' => true,
        'postpath' => true,
        'created' => true,
        'applications' => true,
        'job_histories' => true,
        'orders' => true,
        'posts' => true,
        'qualifications' => true,
        'skills' => true,
        'link'=>true
    ];
}
