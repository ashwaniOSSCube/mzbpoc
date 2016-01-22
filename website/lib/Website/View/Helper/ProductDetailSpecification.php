<?php

class Website_View_Helper_ProductDetailSpecification extends Zend_View_Helper_Abstract {


    public function productDetailSpecification($property, $product) {

        //p_r($property);


        if($property instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\Group) {
            $labeledValue = $property->getLabeledValue($product);
            if($labeledValue) {
                $result = "
                            <tr>
                                <th colspan='2'>" . $this->view->translate("attr." . $property->getLabel()) . "</th>
                            </tr>
                ";

                foreach($property->getChilds() as $child) {

                    $result .= $this->view->productDetailSpecification($child, $product);

                }

                return $result;
            }

        } else if($property instanceof Elements\OutputDataConfigToolkit\ConfigElement\Value\DefaultValue ||
            $property instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\Concatenator) {
            $labeledValue = $property->getLabeledValue($product);
            if($labeledValue->def instanceof Object_Class_Data_Select) {
                $value = $this->getSelectValue($labeledValue->def, $labeledValue->value);
            } else if($labeledValue->def instanceof Object_Class_Data_Multiselect) {

                $values = $labeledValue->value;
                $translatedValues = array();
                if(is_array($values)) {
                    foreach($values as $value) {
                        $translatedValues[] = $this->getSelectValue($labeledValue->def, $value);
                    }

                    $value = "<div class='optionvalue'>" . implode("</div><div class='optionvalue'>", $translatedValues) . "</div>";
                } else {
                    $value = '';
                }


            } else if($labeledValue->def instanceof Object_Class_Data_Objects) {

                $names = array();
                if(is_array($labeledValue->value)) {
                    foreach($labeledValue->value as $entry) {
                        if($entry instanceof Object_Abstract && method_exists($entry, "getName")) {
                            $names[] = $entry->getName();
                        }
                    }
                }

                $value = implode(", ", $names);

            } else if($labeledValue->value instanceof Object_Abstract && method_exists($labeledValue->value, "getName")) {
                    $value = $labeledValue->value->getName();
            } else if($labeledValue->def instanceof Object_Class_Data_Checkbox) {
                $value = $this->view->translate("optionvalue." . ($labeledValue->value ? "true" : "false"));
            } else if($labeledValue->def instanceof Object_Class_Data_Image) {
                $value = '<img src="' . $labeledValue->value . '" />';
            } else {
                $value = $labeledValue->value;
                if(is_object($value)) {
                    p_r($labeledValue);
                    p_r($property);
                    die();
                }
            }


            if(is_numeric($value)) {
                $value = Zend_Locale_Format::toNumber($value, array('locale'=>Zend_Registry::get('Zend_Locale')));
            }

            if($labeledValue->value) {
                $result = "
                            <tr>
                                <td class=\"firstcol\">" . $this->view->translate("attr." . $labeledValue->label) . "</td>
                                <td class=\"secondcol\">" . $value . "</td>
                            </tr>
                ";
                return $result;
            }

        } else {
            p_r($property);
        }

    }


    private function getSelectValue($def, $value) {
        return $this->view->translate("optionvalue." . $value);
        foreach($def->getOptions() as $option) {
            if($option['value'] == $value) {
                return $this->view->translateAdmin($option['key']);
            }
        }
    }
}
