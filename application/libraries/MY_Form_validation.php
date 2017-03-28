<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Form validation extended rules for CodeIgniter
*/
class MY_Form_validation extends CI_Form_validation {
	
	private $_standard_date_format = 'Y-m-d';
	protected $CI;
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Check if the field's value has a valid date format, if not provided,
	 * it will use the $_standard_date_format value
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	 
	function valid_date($str, $format = NULL) {
		
		if(is_null($format) or $format === FALSE) {
			$format = $this->_standard_date_format;
		}

		if(function_exists ('date_parse_from_format')) {
			$parsed = date_parse_from_format($format, $str);
		} else {
			$parsed = $this->_date_parse_from_format($format, $str);
		}

		if($parsed['warning_count'] > 0 or $parsed['error_count'] > 0) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Unique
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */
	function unique($str, $field) {

		$this->CI =& get_instance();
        $this->CI->load->database();

		list($table, $column) = explode('.', $field, 2);
		$query = $this->CI->db->query("SELECT COUNT(*) AS recs FROM $table WHERE $column = '$str'");

		$row = $query->row();
		return ($row->recs > 0) ? FALSE : TRUE;
	}
	
}