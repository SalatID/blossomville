<?php
namespace App\Logging;
// use Illuminate\Log\Logger;
use DB;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
class MySQLLoggingHandler extends AbstractProcessingHandler{
/**
 *
 * Reference:
 * https://github.com/markhilton/monolog-mysql/blob/master/src/Logger/Monolog/Handler/MysqlHandler.php
 */
    public function __construct($level = Logger::DEBUG, $bubble = true) {
        $this->table = 'log_program';
        parent::__construct($level, $bubble);
    }
    protected function write(array $record):void
    {
    //    dd($record['context']['exception']->getFile());   
       $data = array(
           'file'          =>$record['context']['exception']->getFile()??'not file',
           'line'          =>$record['context']['exception']->getLine()??'not line',
           'message'       => $record['message'],
           'trace'         =>$record['context']['exception']->getTraceAsString(),
           'ip_address'    =>$_SERVER['REMOTE_ADDR'],
           'context'       => json_encode($record['context']),
           'level'         => $record['level'],
           'level_name'    => $record['level_name'],
           'channel'       => $record['channel'],
           'record_datetime' => $record['datetime']->format('Y-m-d H:i:s'),
           'extra'         => json_encode($record['extra']),
           'formatted'     => $record['formatted'],
           'created_at'    => date("Y-m-d H:i:s"),
           'user'          => session()->has('userData')?session()->get('userData')['full_name']:'guest'
       );
       DB::connection()->table($this->table)->insert($data);     
    }
}