<?php
namespace Burzum\DatabaseLog\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity.
 */
class Log extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'message' => true,
        'level' => true,
        'context' => true,
    ];
}
