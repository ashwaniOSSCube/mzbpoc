<?php

class OnlineShop_Demo_IndexService_Getter_GenderGetter implements OnlineShop_Framework_IndexService_Getter {

    public static function get( $object, $config = null) {


        if ( $object->isFemaleProduct() ) {
            return array('w');
        }

        $genders = $object->getGender();
        if ( $genders ){
            $men = in_array('m', $genders);
            $women =  in_array('w', $genders);
            if ( $men && $women){
                $genders[ array_search('w', $genders)] = 'm';

            }
            $genders = array_unique($genders);
            return $genders;
        }

    }

}