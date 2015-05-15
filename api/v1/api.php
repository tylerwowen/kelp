<?php
require_once 'api.class.php';
require __DIR__ . '/vendor/autoload.php';

function wkt_to_json($wkt) {
    $geom = geoPHP::load($wkt,'wkt');
    return $geom->out('json');
}

class KelpAPI extends API
{
    protected $User;

    public function __construct($request, $origin) {
        parent::__construct($request);

        // Abstracted out for example
        // $APIKey = new Models\APIKey();
        // $User = new Models\User();

        // if (!array_key_exists('apiKey', $this->request)) {
        //     throw new Exception('No API Key provided');
        // } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
        //     throw new Exception('Invalid API Key');
        // } else if (array_key_exists('token', $this->request) &&
        //      !$User->get('token', $this->request['token'])) {
        //
        //     throw new Exception('Invalid User Token');
        // }

        //$this->User = $User;
    }

    /**
     * Endpoint tags
     */
     protected function tags($args) {
        if ($this->method == 'GET') {
          if($args[0] == 1){
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('../../config.ini');
            // Try and connect to the database
            $username = $config['username'];
            $password = $config['password'];
            $dbname = $config['dbname'];

            try {
                $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT tagnumber,location,date,AsWKT(coordinates) AS wkt FROM tags";
                $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                $geojson = array(
                   'type'      => 'FeatureCollection',
                   'features'  => array()
                );

                foreach ($result as $row){
                  $properties = $row;
                  // Remove wkt from properties
                  unset($properties['wkt']);
                  $feature = array(
                     'type' => 'Feature',
                     'geometry' => json_decode(wkt_to_json($row['wkt'])),
                     'properties' => $properties
                  );
                  array_push($geojson['features'], $feature);
                }
                $conn = NULL;
                return $geojson;
            }
            catch(PDOException $e){
              return "Error: " . $e->getMessage();
            }
          } else {
            return "Invalid arguments";
          }
        } else {
            return "Only accepts GET requests";
        }
     }
 }

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new KelpAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
?>
