<?php
namespace WordPress_ToolKit;

/**
 * ToolKit base class
 *
 * Loads configuration and sets constants
 */
class ToolKit {

  protected static $config;

  function __construct( $args = null )
  {

    // Set toolkit configuration defaults
    $defaults = new ConfigRegistry( dirname( __DIR__ ) . '/config.json' );

    // Define toolkit version
    if ( !defined( __NAMESPACE__ . '\VERSION' ) ) define( __NAMESPACE__ . '\VERSION', $defaults->get( 'toolkit-version' ) );

    // Replace default settings with those provided
    self::$config = $defaults->merge( new ConfigRegistry( $args ) );

  }

  /**
    * Append a field prefix as defined in $config
    *
    * @param string|null $field_name The string/field to prefix
    * @param string $before String to add before the prefix
    * @param string $after String to add after the prefix
    * @return string Prefixed string/field value
    * @since 0.1.0
    */
  public static function prefix( $field_name = null, $before = '', $after = '_' ) {

    $prefix = $before . self::$config->get( 'prefix' ) . $after;
    return $field_name !== null ? $prefix . $field_name : $prefix;

  }

  /**
    * Fetch a config value or entire object config
    *
    * @param string|null $key The configuration key path to return. If null,
    *   returns all config values.
    * @return string|ConfigRegistry Config key path value or ConfigRegistry object
    * @since 0.1.4
    */
  public function get_config( $key = null) {
    return self::$config->get( $key );
  }

}
