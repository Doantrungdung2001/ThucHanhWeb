<?php 
namespace App\Components;

class Recusive {
    private $data;
    private $htmlSelect;

    public function __construct($data) {
        $this->data = $data;
    }

    public function categoryRecusive($parentID, $id = 0, $text = '') {
        foreach ($this->data as $value) {
            if($value['parentID'] == $id) {
                if( (!empty($parentID)) && ($value['id'] == $parentID)) {
                    $this->htmlSelect .= "<option selected value=\"" .$value['id']. "\" >" . $text . $value['name'] . "</option>";
                }
                else {
                    $this->htmlSelect .= "<option value=\"" .$value['id']. "\" >" . $text . $value['name'] . "</option>";

                }
                $this->categoryRecusive($parentID, $value['id'], $text .'---');
            }
        }

        return $this->htmlSelect;
    }
}
