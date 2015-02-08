<?php

namespace Promod\CoDQuery;

class CoDServerInfo
{
    $protocol;
    $hostname;
    $map;
    $clients = [];
    $maxclients;
    $gametype;
    $pure;
    $maxping;
    $allowAnonymous;
    $passwordProtected;
    $otherInfo = [];
    $shortVersion;
    $floodProtect;
    $maxRate;
    $minPing;
    $punkbuster;
    $mod;
    $killcam;
    $consoleDisabled;
    $hardware;
    $privateClients;
    $timeoutsAllowed;

    function __construct()
    {

    }

    //pb..timeoutsallowed.mod.hw..kc..ff..pure....pswrd...con_disabled....sv_allowAnonymous...maxping.minping.nettype.gametype....game....sv_maxclients...hostname....clients
}
