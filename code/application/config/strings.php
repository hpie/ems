<?php
/*
 * 1) SET language constant in constant.php file : define('LANG_FR', "fr");
 * 2) SET add if condition in string file for constant : language if($lang==DEFAULT_LANG) and create method for that language : private function strings_en()
 * 3) set langugae function call where you have to change language. in your controller or model : setLanguage(LANG_FR);
 * 4) USE language variable like : $APP->string['demo'];
 */
class Strings {

    public $string = array();
    public function __construct() {
        $lang = getLanguage();
        if($lang==DEFAULT_LANG)
        {
            $this->string = $this->strings_en();
        }
        else if($lang == LANG_FR){
            $this->string = $this->strings_fr();
        }
    }


    private function strings_en() {
        
        $SYSTEM_STRING = array();
        $SYSTEM_STRING['demo'] = 'Demo';
        return $SYSTEM_STRING;
    }
    private function strings_fr() {
        
        $SYSTEM_STRING = array();
        $SYSTEM_STRING['demo'] = 'omeD';
        return $SYSTEM_STRING;
    }

}

?>