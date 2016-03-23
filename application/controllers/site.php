<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Site extends CI_Controller {
     
    /**
     * The __construct function is called so that I don't have to load the model each and every time.
     * And any change while refactoring or something else would mean change in only one place.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('state_city_model');
    }
     
    /**
     * This is the first method which get's executed when someone will go to the site section.
     */
    function index() {
        //Calling the get_unique_states() function to get the arr of state. Model already loaded.
        $arrStates = $this->state_city_model->get_unique_states();
         
        //Getting the final array in the form which I will be using for the form helper to create a dropdown.
        foreach ($arrStates as $states) {
            $arrFinal[$states->state] = $states->state;
        }
         
        $data['states'] = $arrFinal;
         
        //Passing $data to the view, so that we can get the states as an array inside the view.
        $this->load->view('site_index',$data);
    }
     
    function ajax_call() {
        //Checking so that people cannot go to the page directly.
        if (isset($_POST) && isset($_POST['state'])) {
            $state = $_POST['state'];
            $arrCities = $this->state_city_model->get_cities_from_state($state);
             
            foreach ($arrCities as $cities) {
                $arrFinal[$cities->city] = $cities->city;
            }
             
            //Using the form_dropdown helper function to get the new dropdown.
            print form_dropdown('cities',$arrFinal);
        } else {
            redirect('site'); //Else redire to the site home page.
        }
    }
}