<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wwondra
 * Date: 17.10.12
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */



class Demo_OnlineShop_IndexService_Getter_GenderGetter implements OnlineShop_Framework_IndexService_Getter {

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