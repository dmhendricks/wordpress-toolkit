<?php
namespace WordPress_ToolKit\Helpers;
use WordPress_ToolKit\ToolKit;

/**
  * A class to perform various string manipulation and validation functions
  *
  * @since 0.1.0
  */
class StringHelper extends ToolKit
{

  /**
    * Return constant, if defined (with filter validation, if specified)
    *
    * Example usage:
    *    echo $this->get_const( 'DB_HOST' ); // MySQL host name
    *    echo $this->get_const( 'MY_BOOLEAN_CONST', FILTER_VALIDATE_BOOLEAN );
    *       // null if undefined, true if valid boolean, else false
    *
    * @param string $const The name of constant to retrieve.
    * @param const $filter_validate filter_var() filter to apply (optional).
    *    Valid values: http://php.net/manual/en/filter.filters.validate.php
    * @return mixed Value of constant if specified, else null.
    * @since 0.1.0
    */
  public function get_const( $const, $filter_validate = null ) {

    if( !defined( $const ) ) {
      return null;
    } else if( $filter_validate ) {
      return filter_var( constant( $const ), $filter_validate);
    }
    return constant( $const );

  }

  /**
    * Checks whether a JSON string has valid syntax
    *
    * @param string $json The JSON string to test
    * @return bool
    * @since 0.1.0
    */
  public static function is_json( $json ) {

    json_decode( $json );
    return (json_last_error() == JSON_ERROR_NONE);

  }

}
