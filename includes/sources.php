<?php

class sources {
    private $values;
    private $buttonBuffer;
    private $divBuffer;

    public function __construct() {
        $url = "{$GLOBALS['url']}/index.php?title={$GLOBALS["basePage"]}/sources/dev&action=raw";
        $this->values = parse_ini_string(file_get_contents($url), TRUE) or $this->errorCatchString("Sources file broken");

        $this->buttonBuffer = "";
        $this->divBuffer = "";


        foreach (array_keys($this->values) as $one) {
            $this->buttonBuffer .= "<input type=\"button\" name=\"sources_{$this->values[$one]['shorthand']}_add\" value=\"{$this->values[$one]['id']}\" class=\"btn btn-warning\" onClick=\"toggleType('{$this->values[$one]['shorthand']}')\" />\r\n";
        }

        //$this->divBuffer = "<span class=\"sources_container\">";

        foreach (array_keys($this->values) as $one) {
            $fields = explode("|", $this->values[$one]["fields"]);
            $headings = explode("|", $this->values[$one]["field_labels"]);


            $this->divBuffer .= <<<END
            <div class="panel panel-info" id="{$this->values[$one]["shorthand"]}" style="display: none;">
            <div class='panel-heading'>
            <span class='pull-right'>
            </span>
            <label for='template_{$this->values[$one]["shorthand"]}'>{$this->values[$one]['id']}</label>
            </div>
            <div class='panel-body'>
            <div id="sources_container_{$this->values[$one]["shorthand"]}">
END;
            $size = count($fields);
            for ($l = 0; $l < $size; $l++) {
                $this->divBuffer .= <<<END
            <label>{$headings[$l]}:</label> <input type='text' class='form-control' name='{$fields[$l]}'><br />

END;
            }
            $this->divBuffer .= "</div></div></div>";
        }
        //$this->divBuffer .="</span>";
    }

    private function errorCatchString($error) {
        throw new arException($error);
    }

    public function __destruct() {
        unset($this->values);
        unset($this->buttonBuffer);
    }

    public function getButtonBuffer() {
        return $this->buttonBuffer;
    }

    public function echoButtonBuffer() {
        echo $this->getButtonBuffer();
    }

    public function getDivBuffer() {
        return $this->divBuffer;
    }

    public function echoDivBuffer() {
        echo $this->getDivBuffer();
    }

}
