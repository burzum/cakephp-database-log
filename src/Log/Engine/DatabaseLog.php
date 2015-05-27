<?php
namespace Burzum\DatabaseLog\Log\Engine;

use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class DatabaseLog extends BaseLog
{
    public function __construct(array $config = [])
    {
        if (empty($config['model'])) {
            $config['model'] = 'Burzum/DatabaseLog.Logs';
        }
        parent::__construct($config);
        $this->Model = TableRegistry::get($this->config('model'));
    }

    public function log($level, $message, array $context = [])
    {
        $this->Model->log($level, $message, $context);
    }
}
