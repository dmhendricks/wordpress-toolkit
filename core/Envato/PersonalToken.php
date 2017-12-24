<?php
namespace WordPress_ToolKit;
use WordPress_ToolKit\ConfigRegistry;
/**
  * A class to perform simple Envato API operations when provided a user's
  *    personal access token.
  *
  * @link https://build.envato.com/api/#token
  * @since 0.1.4
  */
class PersonalToken extends ToolKit
{

  protected $token;
  private $client;

  /**
   * Class constructor, runs on object creation.
   *
   * @param mixed $personal_token A personal token to access the Envato API.
   * @link https://build.envato.com/create-token/
   */
  public function __construct( $personal_token )
  {

    // Set Envato credentials
    $this->token = $personal_token;
    $this->client = new \GuzzleHttp\Client();

  }

  /**
   * Validates a provided Envato personal token
   *
   * @return bool Whether or not the personal token is valid
   */
  public function validate()
  {

    $result = (array) json_decode( $this->client->request( 'GET', 'https://api.envato.com/v1/market/total-items.json' ) );
    return isset( $result['total-items'] );

  }

  /**
   * Validates a provided Envato purchase code
   *
   * @param string $purchase_code The purchase code to validate
   * @param bool $return_boolean If true, returns boolean result. If false,
   *    returns array with arror message on failure else ConfigRegistry object.
   * @return ConfigRegistry|array|bool Purchased item information, array|bool on
   *    failure.
   */
  public function validatePurchaseCode( $purchase_code, $return_boolean = true )
  {

    $result = array( 'error' => true, 'description' => 'Invalid purchase code.' );

    if( is_string( $purchase_code ) ) {
      $result = (array) json_decode( $this->client->request( 'GET', 'https://api.envato.com/v1/market/total-items.json' ) );
    } else {
      return $return_boolean ? false : $result;
    }

    // API returned error
    if( isset( $result['error'] ) ) return $return_boolean ? false : $result;

    // Return ConfigRegistry of result
    return $return_boolean ? true : new ConfigRegistry( $result );

  }

}
