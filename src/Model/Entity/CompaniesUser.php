<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompaniesUser Entity
 *
 * @property int $companies_id
 * @property int $id
 * @property int $users_id
 * @property string $position
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property bool $current_job
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\User $user
 */
class CompaniesUser extends Entity
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
        '*' => true,
        'id' => false
    ];
}
