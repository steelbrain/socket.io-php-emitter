<?php
class Socket_Emitter{
     private static $key = 'socket.io#emitter',$namespace;
     private static $redis;
     public static function init($redis,$namespace = '/'){
          self::$redis = $redis;
          self::$namespace = $namespace;
     }
     public static function emit($rooms,...$args){
          self::$redis->publish(self::$key, msgpack_pack([[
               'type' => 2,
               'data' => $args,
               'nsp' => self::$namespace
          ], [
               'rooms' => $rooms,
               'flags' => []
          ]]));
     }
};