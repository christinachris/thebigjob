<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employer Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $about
 * @property string $email
 * @property string $contact_no
 * @property string $web_url
 * @property string $industry
 * @property string $location
 *
 * @property \App\Model\Entity\Job[] $jobs
 */
class Employer extends Entity
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
        'company_name' => true,
        'about' => true,
        'email' => true,
        'contact_no' => true,
        'web_url' => true,
        'industry' => true,
        'location' => true,
        'jobs' => true
    ];
}
