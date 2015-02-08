<?php

namespace Promod\CoDQuery;

require 'ServerinfoFactory.php';

class CoDServer
{
    private $address, $port, $rcon_password;

    function __construct($address, $port = 28960, $rcon_password = '')
    {
        $this->address = $address;
        $this->port = $port;
        $this->rcon_password = $rcon_password;
    }

    private function command($commands = '')
    {
        if(empty($commands))
        {
            return 'Error: empty command';
        }

        if(!is_array($commands))
        {
            $commands = array($commands);
        }

        $responses = [];

        $socket = fsockopen('udp://' . $this->address, $this->port);
        stream_set_timeout($socket, 2);

        foreach($commands as $command)
        {
            $response = '';
            fwrite($socket, str_repeat(chr(255), 4) . $command);
            $bytes_left = 1;
            do
            {
                $response .= fread($socket, $bytes_left);
            } while(($bytes_left = stream_get_meta_data($socket)['unread_bytes']) > 0);
            $responses[] = $response;
        }

        fclose($socket);

        return $responses;
    }

    function rcon($command)
    {
        if(empty($rcon_command))
        {
            return 'Error: RCON password not set.';
        }
        return $this->command('rcon ' . $rcon_password . ' ' . $command);
    }

    public function info()
    {
        $responses = $this->command(['getInfo', 'getStatus']);
        return ServerinfoFactory::generateInfo($responses[0], $responses[1]);
    }
}
