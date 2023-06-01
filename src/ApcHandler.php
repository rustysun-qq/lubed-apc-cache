<?php
namespace Lubed\ApcCache;

use Lubed\Caches\CacheHandler;

class ApcHandler implements CacheHandler {
    private static $instance=NULL;

    private function __construct() {
    }

    public function fetch(string $name, &$result) {
        return apc_fetch($name, $result);
    }

    public function store(string $name, $value) {
        return apc_store($name, $value);
    }

    public function flush() {
        return apc_clear_cache();
    }

    public function remove(string $name) {
        return apc_delete($name);
    }

    public static function getInstance(array $options=[]) {
        if (NULL===self::$instance) {
            self::$instance=new ApcHandler;
        }
        return self::$instance;
    }
}