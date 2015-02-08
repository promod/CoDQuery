<?php

namespace Promod\CoDQuery;

class ServerinfoFactory
{
    private function __construct(){}

    public static function generateInfo($infoResponse, $statusResponse)
    {
        if(!ServerinfoFactory::startsWith($statusResponse, str_repeat(chr(255), 4).'statusResponse'))
        {
            return;
        }

        if(!ServerinfoFactory::startsWith($infoResponse, str_repeat(chr(255), 4).'infoResponse'))
        {
            return;
        }

        $players = explode("\n", $statusResponse);
        $longInfo = explode('\\', $players[1]);
        $players = array_slice($players, 2, count($players)-3);
        $shortInfo = explode('\\', $infoResponse);

        $data = [];
        for($i=1,$cnt=count($longInfo);$i<$cnt;++$i)
        {
            $data[$longInfo[$i]] = $longInfo[++$i];
        }
        $longInfo = $data;

        $data = [];
        for($i=1,$cnt=count($shortInfo);$i<$cnt;++$i)
        {
            $data[$shortInfo[$i]] = $shortInfo[++$i];
        }
        $shortInfo = $data;

        switch($longInfo['gamename'])
        {
            case 'Call of Duty':
            case 'CoD:United Offensive':
            case 'Call of Duty 2':
            case 'Call of Duty 4':
            case 'Call of Duty: World at War':
                var_dump($shortInfo);
                var_dump($longInfo);
                var_dump($players);
                return TRUE;
            default:
                die("Unknown game: ".$longInfo['gamename']);
        }
    }

    private static function startsWith($haystack, $needle)
    {
         return substr($haystack, 0, strlen($needle)) === $needle;
    }
}
