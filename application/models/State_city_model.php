<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class State_city_model extends CI_Model {
     
    /**
     * This funtion will return me the result of all the states.
     * This has to be unique because the states will be repeating.
     */
    function get_unique_states() {
        $query = $this->db->query("SELECT DISTINCT state FROM state_city");
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }
     
    /**
     * This function will take the state as argument
     * and then return the cities which fall under that particular state.
     */
    function get_cities_from_state($state) {
        $query = $this->db->query("SELECT city FROM state_city WHERE state = '{$state}'");
         
        if ($query->num_rows > 0) {
            return $query->result();
        }
    }
}
