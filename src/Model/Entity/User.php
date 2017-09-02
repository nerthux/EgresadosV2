<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $student_id_number
 * @property int $email_validation_code
 * @property bool $email_verified
 * @property string $mobile_phone_number
 * @property int $sms_validation_code
 * @property bool $sms_verified
 * @property string $password_recovery_hash
 * @property string $role
 * @property int $generation_id
 * @property int $career_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $modified
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property bool $have_title
 * @property string $gender
 *
 * @property \App\Model\Entity\Generation $generation
 * @property \App\Model\Entity\Career $career
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Language[] $languages
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Skill[] $skills
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
