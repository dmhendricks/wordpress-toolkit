<?php
namespace WordPress_ToolKit\Envato;
use WordPress_ToolKit\ConfigRegistry;
use WordPress_ToolKit\ToolKit;

/**
  * A class to perform simple Envato API operations when provided a user's
  *    personal access token.
  *
  * @link https://build.envato.com/api/#token
  * @since 0.1.4
  */
class PersonalToken extends ToolKit
{

  protected $headers;
  private $client;
  private $base_url;

  /**
   * Set the personal token and create request headers
   *
   * @param mixed $personal_token A personal token to access the Envato API.
   * @link https://build.envato.com/create-token/
   */
  public function setToken( $personal_token )
  {

    //var_dump( self::$config->get() ); exit;

    // Set Envato credentials
    $this->headers = array( 'headers' => array(
      'Authorization' => 'Bearer ' . $personal_token,
      'User-Agent'    => 'Mozilla/5.0 (compatible; Envato Marketplace API Wrapper; dmhendricks/wordpress-toolkit/0.1.4)'
    ));
    $this->base_url = self::$config->get( 'envato/api_base_url' );
    $this->client = new \GuzzleHttp\Client();

  }

  /**
   * Validates a provided Envato personal token
   *
   * @return bool Whether or not the personal token is valid
   */
  public function validate()
  {

    if( !$this->base_url ) return false;

    try {

      $client = $this->client->request( 'GET', $this->base_url . 'market/total-items.json', $this->headers );
      $result = (array) json_decode( $client->getBody() );
      return isset( $result['total-items'] );

    } catch( \Exception $e ) {

      return false;

    }

  }

  /**
   * Validates a provided Envato purchase code
   *
   * @param string $purchase_code The purchase code to validate
   * @param bool $return_data If false, returns boolean result. If false,
   *    returns array with arror message on failure else ConfigRegistry object.
   * @return ConfigRegistry|array|bool Purchased item information, array|bool on
   *    failure.
   */
  public function validatePurchaseCode( $purchase_code, $item_id = null, $return_data = true )
  {

    $result = array( 'error' => true, 'description' => 'Envato API base URL not provided.' )
    if( !$this->base_url ) return $return_data ? $result : false;

    $item_id = $item_id ?: self::$config->get( 'envato/item_id' );
    $result['description'] = 'Invalid purchase code or item id.';

    if( !is_string( $purchase_code ) ) {

      return $return_data ? $result : false;

    } else {

      try {

        $client = $this->client->request( 'GET', $this->base_url . 'market/buyer/purchase?code=' . $purchase_code, $this->headers );
        $result = (array) json_decode( $client->getBody() );

      } catch( \Exception $e ) {

        $result['description'] = $e->getMessage();
        return $return_data ? $result : false;

      }

    }

    if( $item_id && $item_id != $result['item']->id ) {
      return $return_data ? array( 'error' => true, 'description' => 'Item ID does not match purchase code.' ) : false;
    }

    // Return ConfigRegistry of result
    return $return_data ? new ConfigRegistry( $result ) : true;

  }

}
