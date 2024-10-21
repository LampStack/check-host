<?php
header('Content-type: application/json');

class CheckHost
{
    private $baseUrl = 'https://check-host.net';

    private function Request($url)
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    private function check($checkType, $hostname, $maxNodes, $nodes = null)
    {
        $url = "{$this->baseUrl}/check-$checkType?host=$hostname&max_nodes=$maxNodes";

        if ($nodes !== null) {
            $nodesParam = is_array($nodes) ? implode('&node=', $nodes) : $nodes;
            $url .= "&node=$nodesParam";
        }

        return $this->Request($url);
    }

    public function NodesIPs()
    {
        $url = "{$this->baseUrl}/nodes/ips";
        return $this->Request($url);
    }

    public function NodesHosts()
    {
        $url = "{$this->baseUrl}/nodes/hosts";
        return $this->Request($url);
    }
    public function checkTCP($hostname, $maxNodes, $nodes = null)
    {
        return $this->check('tcp', $hostname, $maxNodes, $nodes);
    }

    public function checkHTTP($hostname, $maxNodes, $nodes = null)
    {
        return $this->check('http', $hostname, $maxNodes, $nodes);
    }

    public function checkDNS($hostname, $maxNodes, $nodes = null)
    {
        return $this->check('dns', $hostname, $maxNodes, $nodes);
    }

    public function checkPing($hostname, $maxNodes, $nodes = null)
    {
        return $this->check('ping', $hostname, $maxNodes, $nodes);
    }

    public function checkUDP($hostname, $maxNodes, $nodes = null)
    {
        return $this->check('udp', $hostname, $maxNodes, $nodes);
    }

    public function getLink($requestId)
    {
        return "{$this->baseUrl}/check-report/$requestId";
    }

    public function CheckResult($requestId)
    {
        $url = "{$this->baseUrl}/check-result/$requestId";
        return $this->Request($url);
    }
}