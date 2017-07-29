<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResortsRoom Entity.
 *
 * @property int $Id
 * @property int $resort_id
 * @property \App\Model\Entity\Resort $resort
 * @property string $RoomType
 * @property string $Main_Image
 * @property string $Description
 * @property string $Specification
 * @property string $Speciality
 * @property string $feature_id
 * @property \App\Model\Entity\Feature $feature
 * @property string $image_id
 * @property \App\Model\Entity\Image $image
 * @property int $Max_Adult
 * @property int $Max_Children
 * @property int $Position
 * @property bool $Status
 */
class ResortsRoom extends Entity
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
        'Id' => false,
    ];
}
