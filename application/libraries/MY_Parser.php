<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package             CodeIgniter
 * @author              ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008, EllisLab, Inc.
 * @license             http://codeigniter.com/user_guide/license.html
 * @link                http://codeigniter.com
 * @since               Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * MY Parser Class
 *
 * @package             CodeIgniter
 * @subpackage  Libraries
 * @category    Parser
 * @author              Haloweb Ltd
 */

class MY_Parser extends CI_Parser {

        /**
         *  Parse a template
         *
         * Parses pseudo-variables contained in the specified template,
         * replacing them with the data in the second param
         *
         * @access      public
         * @param       string
         * @param       array
         * @param       bool
         * @return      string
        */

        function parse($template, $data, $return = FALSE, $include = FALSE)
        {
                $CI =& get_instance();

                if ($template == '')
                {
                        return FALSE;
                }

                if ($include === FALSE)
                {
                        $template = $CI->load->view($template, $data, TRUE);
                }

                if (isset($data) && $data != '')
                {
                        foreach ($data as $key => $val)
                        {
                                if (is_array($val))
                                {
                                        $template = $this->_parse_pair($key, $val, $template);
                                }
                                else
                                {
                                        $template = $this->_parse_single($key, (string)$val, $template);
                                }
                        }
                }

                // Check for conditional statments
                $template = $this->conditionals($template, $data);

                // populate form tags
                preg_match_all('/{form:(.+)}/i', $template, $posts);
                if ($posts)
                {
                        foreach ($posts[1] as $post => $value)
                        {
                                if ($postValue = $CI->input->post($value))
                                {
                                        $template = str_replace('{form:'.$value.'}', $postValue, $template);
                                }
                                else
                                {
                                        $template = str_replace('{form:'.$value.'}', '', $template);
                                }
                        }
                }

                //$template = preg_replace('/{(.+)}/i', '', $template);

                if ($return == FALSE)
                {
                        $CI->output->append_output($template);
                }

                return $template;
        }

        // --------------------------------------------------------------------

        /**
         *  Parse conditional statments
         *
         * @access    public
         * @param    string
         * @param    bool
         * @return    string
        */

        function conditionals($template, $data) {

        if (preg_match_all('#'.$this->l_delim.'if (.+)'.$this->r_delim.'(.+)'.$this->l_delim.'/if'.$this->r_delim.'#sU', $template, $conditionals, PREG_SET_ORDER)) {

            if(count($conditionals) > 0) {

                foreach($conditionals AS $condition) {

                    $raw_code = (isset($condition[0])) ? $condition[0] : FALSE;
                    $cond_str = (isset($condition[1])) ? $condition[1] : FALSE;
                    $insert = (isset($condition[2])) ? $condition[2] : '';

                    if(!preg_match('/('.$this->l_delim.'|'.$this->r_delim.')/', $cond_str, $problem_cond))
                    {
                        // If the the conditional statment is formated right, lets procoess it!
                        if(!empty($raw_code) OR $cond_str != FALSE OR !empty($insert)) {
                            // Get the two values
                            $cond = preg_split("/(\!=|==|<=|>=|<>|<|>|AND|XOR|OR|&&)/", $cond_str);

                            // Do we have a valid if statment?
                            if(count($cond) == 2) {

                                // Get condition
                                preg_match("/(\!=|==|<=|>=|<>|<|>|AND|XOR|OR|&&)/", $cond_str, $cond_m);
                                array_push($cond, $cond_m[0]);

                                // Remove quotes - they cause to many problems!
                                $cond[0] = preg_replace("/[^a-zA-Z0-9s]/", "", $cond[0]);
                                $cond[1] = preg_replace("/[^a-zA-Z0-9s]/", "", $cond[1]);

                                // Test condition
                                eval("\$result = (\"".$cond[0]."\" ".$cond[2]." \"".$cond[1]."\") ? TRUE : FALSE;");

                            } else {

                                // Looks like a if 'variable' conditional, let's make sure the variable is set

                                if (isset($data->$cond_str)) {
                                        // Check the variable isn't empty...
                                        if (!empty($data->$cond_str)) {
                                                // This adds support for using {if var}then this{/if}
                                                $result = TRUE;
                                        } else {
                                                $result = FALSE;
                                        }
                                } else {
                                        $result = FALSE;
                                }

                                //$result = (isset($data->$cond_str)) ? TRUE : FALSE;

                            }
                        }

                        // If the condition is TRUE then show the text block
                        $insert = preg_split('#'.$this->l_delim.'else'.$this->r_delim.'#sU', $insert);
                        if($result == TRUE)
                        {
                            $template = str_replace($raw_code, $insert[0], $template);
                        } else {
                            // Do we have an else statment?
                            if(is_array($insert))
                            {
                                $insert = (isset($insert[1])) ? $insert[1] : '';
                                $template = str_replace($raw_code, $insert, $template);
                            } else {
                                $template = str_replace($raw_code, '', $template);
                            }
                        }
                    }

                }

            }
        }
        return $template;
    }

        // --------------------------------------------------------------------

        /**
         *  Matches a variable pair
         *
         * @access      private
         * @param       string
         * @param       string
         * @return      mixed
         */

        function _match_pair($string, $variable)
        {
                $variable = str_replace('(', '\(', $variable);
                $variable = str_replace(')', '\)', $variable);

                if ( ! preg_match("|".$this->l_delim . $variable . $this->r_delim."(.+?)".$this->l_delim . '/' . $variable . $this->r_delim."|s", $string, $match))
                {
                        return FALSE;
                }

                return $match;
        }

}
// END Parser Class

/* End of file */
