<?php
/**
 * @author Burak Boz
 * @email repos@burakboz.net
 * @package Mobiliz
 * @description Mobiliz 7.4 compatible
 */
namespace BurakBoz\Mobiliz;
class MobilizClient
{
    private $token = "0000000000000000000000000000000000000000000000000000000000000000";
    private $server = "su0";
    private string $urlStructure = "https://ng.mobiliz.com.tr/%s";
    private string $apiPrefix = "/api/integrations";

    public function __construct($token = null, $server = null)
    {
        !\is_null($token) && $this->token = $token;
        !\is_null($server) && $this->server = $server;
    }

    /**
     * @return mixed|string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param mixed|string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed|string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @param mixed|string $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    /**
     * License Plate Formatter
     * @param string|null $str
     * @return string
     */
    public function formatPlate(?string $str): string
    {
        return \strtoupper(\trim(\str_replace(" ", "", \trim($str))));
    }

    /**
     * @param int|null $fleetId Filo ID - Belirli bir filo için filtrelemek amacıyla kullanılır.
     * @param int|null $groupId Grup ID - Belirli bir grup için filtrelemek amacıyla kullanılır.
     * @param string|null $networkId Seri numarası - Belirli bir araç için filtrelemek amacıyla kullanılır.
     * @param int|null $muId Araç ID - Belirli bir araç için filtrelemek amacıyla kullanılır.
     * @param string|null $startTime pattern:yyyy-MM-dd'T'HH:mm:ssZ
     * @return mixed
     */
    public function activityLast(int $fleetId = null, int $groupId = null, string $networkId = null, int $muId = null, string $startTime = null)
    {
        return $this->call($this->apiPrefix . '/activity/last', \get_defined_vars());
    }

    /**
     * @param int|null $fleetId
     * @param int|null $groupId
     * @param string|null $networkId
     * @param int|null $muId
     * @param string|null $plate
     * @param string|null $eventLogId
     * @param string|null $startTime
     * @param string|null $endTime
     * @return mixed
     */
    public function locations(int $fleetId = null, int $groupId = null, string $networkId = null, int $muId = null, string $plate = null, string $eventLogId = null, string $startTime = null, string $endTime = null)
    {
        return $this->call($this->apiPrefix . '/locations', \get_defined_vars());
    }

    /**
     * Sürücüler
     * @return mixed
     */
    public function drivers()
    {
        return $this->call($this->apiPrefix . '/drivers');
    }

    /**
     * Araçlar
     * @return mixed
     */
    public function vehicles()
    {
        return $this->call($this->apiPrefix . '/vehicles');
    }

    /**
     * Gruplar
     * @return mixed
     */
    public function groups()
    {
        return $this->call($this->apiPrefix . '/groups');
    }

    /**
     * Filolar
     * @return mixed
     */
    public function fleets()
    {
        return $this->call($this->apiPrefix . '/fleets');
    }

    /**
     * Olay Kodları
     * @return mixed
     */
    public function eventCodes()
    {
        return $this->call($this->apiPrefix . '/eventcodes');
    }

    /**
     * Özellikler
     * @param string|null $networkId
     * @return mixed
     */
    public function properties(string $networkId = null)
    {
        return $this->call($this->apiPrefix . '/properties', \get_defined_vars());
    }

    /**
     * Araç Türleri
     * @param string|null $locale
     * @return mixed
     */
    public function vehicleTypes(string $locale = null)
    {
        return $this->call($this->apiPrefix . '/vehicle-types', \get_defined_vars());
    }

    /**
     * Araç Alt Türleri
     * @param int $vehicleTypeId
     * @param string|null $locale
     * @return mixed
     */
    public function vehicleSubTypes(int $vehicleTypeId, string $locale = null)
    {
        $params = \get_defined_vars();
        unset($params["vehicleTypeId"]);
        return $this->call($this->apiPrefix . '/vehicle-types/'.$vehicleTypeId.'/subtypes', $params);
    }

    /**
     * İhlal Türleri
     * @param string|null $locale
     * @return mixed
     */
    public function violationTypes(string $locale = null)
    {
        return $this->call($this->apiPrefix . '/violation-types', \get_defined_vars());
    }

    /**
     * Yol Bilgisayarı Detay Raporu
     * @param string|null $startDate Örnek format : "2017-10-19T00:00:00", UTC
     * @param string|null $endDate Örnek format : "2017-10-19T00:00:00", UTC
     * @param string|null $locale Türkçe için : "tr_TR"
     * @param int|null $fleetId
     * @param int|null $groupId
     * @param int|null $muId
     * @param array|null $canbusSensorIdList Raporda listelenmesi istenen sensor id listesidir. Boş array gönderilirse, tüm sensörler için değerler listelenir.
     * @return mixed
     */
    public function reportCanBusDetail(
        string $startDate = null,
        string $endDate = null,
        string $locale = null,
        int $fleetId = null,
        int $groupId = null,
        int $muId = null,
        array $canbusSensorIdList = []
    )
    {
        return $this->call("/rs/canbus-reports/detail/instant",[],\get_defined_vars());
    }

    /**
     * Aktivite Detay Raporu
     * @param string|null $startDate Örnek format : "2017-10-19T00:00:00", UTC
     * @param string|null $endDate Örnek format : "2017-10-19T00:00:00", UTC
     * @param string|null $locale Türkçe için : "tr_TR"
     * @param int|null $fleetId
     * @param int|null $groupId
     * @param int|null $muId
     * @param array|null $reportEventsCommonIdList Raporda listelenmesi istenen durum listesidir. [0] olarak gönderilirse, tüm durumlar listelenir.
     * @return mixed
     */
    public function reportActivityDetail(
        string $startDate = null,
        string $endDate = null,
        string $locale = null,
        int $fleetId = null,
        int $groupId = null,
        int $muId = null,
        array $reportEventsCommonIdList = [0]
    )
    {
        return $this->call("/rs/vehicle-reports/detail/instant",[],\get_defined_vars());
    }

    /**
     * API Client
     * @param string $endpoint
     * @param array $get
     * @param array $post
     * @return mixed
     */
    private function call(string $endpoint = "/", array $get = [], array $post = [])
    {
        $get = \array_filter($get, static function ($i){ return !\is_null($i); });
        $ch = @\curl_init();
        $url = \sprintf($this->urlStructure, $this->server) . $endpoint;
        !empty($get) && $url .= "?" . \http_build_query($get);
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_VERBOSE => false,
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => "github.com/BurakBoz MobilizPHP/1.0",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Mobiliz-Token: " . $this->token
            ]
        ];
        if(!empty($post))
        {
            $options[CURLOPT_CUSTOMREQUEST] = "POST";
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = \json_encode($post);
        }
        @\curl_setopt_array($ch, $options);
        $response = @\curl_exec($ch);
        @\curl_close($ch);
        $result = \json_decode($response, false);
        if ($result && isset($result->success) && $result->success)
        {
            return $result->result;
        }
        return $result;
    }
}
