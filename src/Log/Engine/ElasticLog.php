<?php
namespace Burzum\DatabaseLog\Log\Engine;

use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;
use Cake\ElasticSearch\TypeRegistry;
use Cake\Log\Engine\BaseLog;
use Cake\ORM\TableRegistry;

class ElasticLog extends BaseLog
{
    public function __construct(array $config = [])
    {
        if (Plugin::loaded('ElasticSearch')) {
            throw new MissingPluginException(sprintf(
                'Install the CakePHP Elastic Search Plugin to use this logger'
            ));
        }

        if (empty($config['model'])) {
            $config['model'] = 'Logs';
        }

        parent::__construct($config);
        $this->Model = TypeRegistry::get($this->config('model'));
    }

    public function log($level, $message, array $context = [])
    {
        if (method_exists($this->Model, 'log')) {
            $this->Model->log($level, $message, $context);

            return;
        }

        $this->Model->newEntity(compact('level', 'message', 'context'));
        $this->Model->save($level, $message, $context);
    }
}
