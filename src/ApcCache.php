<?php
namespace Lubed\ApcCache;

use Lubed\Caches\Cache;
use Lubed\Caches\Exceptions;
class ApcCache implements Cache {
    public function getInstance(?array $params=NULL) {
        if(!$params){
            Exceptions::CacheFailed('Invalid cache impl params');
        }
        return ApcHandler::getInstance($params);
    }
}