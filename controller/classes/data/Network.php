<?php
/**
 *  This class handles all the data you can get from a Network
 *
 *	@package TMDB-V3-PHP-API
 *  @author Frank Glaser</a>
 *  @version 0.1
 *  @date 07/08/2020
 *  @link https://github.com/Alvaroctal/TMDB-PHP-API
 *  @copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */

class Network {

    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------

    private $_data;

    /**
     *  Construct Class
     *
     *  @param array $data An array with the data of a Network
     */
    public function __construct($data) {
        $this->_data = $data;
    }

    //------------------------------------------------------------------------------
    // Get Variables
    //------------------------------------------------------------------------------

    /** 
     *  Get the Network's name
     *
     *  @return string
     */
    public function getName() {
        return $this->_data['name'];
    }

    /** 
     *  Get the Network's id
     *
     *  @return int
     */
    public function getID() {
        return $this->_data['id'];
    }

    /** 
     *  Get the Network's description
     *
     *  @return string
     */
    public function getDescription() {
        return $this->_data['description'];
    }

    /** 
     *  Get the Network's headquearters
     *
     *  @return string
     */
    public function getHeadquarters() {
        return $this->_data['headquarters'];
    }

    /** 
     *  Get the Network's homepage
     *
     *  @return string
     */
    public function getHomepage() {
        return $this->_data['homepage'];
    }

    /** 
     *  Get the Network's logo
     *
     *  @return string
     */
    public function getLogo() {
        return $this->_data['logo_path'];
    }

    /** 
     *  Get the Network's parent Network id
     *
     *  @return int
     */
    public function getParentNetworkID() {
        return $this->_data['parent_Network'];
    }

    /**
     *  Get the Network's Movies
     *
     *  @return Movie[]
     */
    public function getMovies() {
        $movies = array();

        foreach($this->_data['movies']['results'] as $data){
            $movies[] = new Movie($data);
        }

        return $movies;
    }

    /**
     *  Get Generic.<br>
     *  Get a item of the array, you should not get used to use this, better use specific get's.
     *
     *  @param string $item The item of the $data array you want
     *  @return array
     */
    public function get($item = '') {
        return (empty($item)) ? $this->_data : $this->_data[$item];
    }

    //------------------------------------------------------------------------------
    // Export
    //------------------------------------------------------------------------------

    /** 
     *  Get the JSON representation of the Movie
     *
     *  @return string
     */
    public function getJSON() {
        return json_encode($this->_data, JSON_PRETTY_PRINT);
    }
}
?>