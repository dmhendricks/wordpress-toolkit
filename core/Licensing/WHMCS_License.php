<?php
namespace WordPress_ToolKit\Licensing;
use WordPress_ToolKit\ConfigRegistry;
use WordPress_ToolKit\ToolKit;

/**
  * A class to perform license code verification via the WHMCS Licensing Addon.
  *
  * @link https://www.whmcs.com/software-licensing/
  * @see https://docs.whmcs.com/Licensing_Addon
  * @since 0.2.0
  */
class WHMCS_License extends ToolKit
{

  protected $whmcs_url;
  protected $product_key;
  protected $local_key_expire_days;
  protected $allow_check_fail_days;

  /**
   * Validate user-provided license key
   *
   * @param string $key License key to validate
   * @param string $args Licensed product settings (overrides values
   *    passed by base class; required if not passed by base class)
   * @return array Result from validation attempt
   * @since 0.2.0
   */
  public function validate( $key, $localkey = '', $args = array() )
  {

    //var_dump( self::$config->get() );

    $result = array( 'valid' => false, 'message' => 'Invalid or missing server/product settings.' );

    return $result;

  }

}
