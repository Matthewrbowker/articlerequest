<?php

class sources {
    private $values;
    private $buttonBuffer;
    private $divBuffer;

    public function __construct() {
        # TODO: Better URL handling
        if ($GLOBALS["role"] == "test") $url = "{$GLOBALS['url']}/index.php?title=Article_request/sources&action=raw";
        else if ($GLOBALS["role"] == "staging") $url="{$GLOBALS['url']}/User:Matthewrbot/Config/1/sources/dev?action=raw";
        else $url = "{$GLOBALS['url']}/User:Matthewrbot/Config/1/sources?action=raw";
        $this->values = parse_ini_string(file_get_contents($url), TRUE);

        $this->buttonBuffer = "";
        $this->divBuffer = "";


        foreach (array_keys($this->values) as $one) {
            $this->buttonBuffer .= "<input type=\"button\" name=\"sources_{$this->values[$one]['shorthand']}_add\" value=\"{$this->values[$one]['label']}\" class=\"btn btn-warning\" onClick=\"addSource('{$this->values[$one]['shorthand']}')\" />\r\n";
        }


        foreach(array_keys($this->values) as $one) {
            $fields = explode("|", $this->values[$one]["fields"]);
            $headings = explode("|", $this->values[$one]["field_labels"]);


            $this->divBuffer .= <<<END
            <div class="panel panel-info" id="template_{$this->values[$one]["shorthand"]}">
            <div class='panel-heading'>
            <span class='pull-right'>
            <input class="btn btn-danger" type="button" value="Remove this source" onClick="removeSource('%RANDOMINS%')" />
            </span>
            <label for='%RANDOMINS%'>{$this->values[$one]['id']}</label>
            </div>
            <div class='panel-body'>
            <a name='%RANDOMINS%'></a><div id="sources">
END;
            $size = count($fields);
            for ($l = 0; $l < $size; $l++) {
                $this->divBuffer .= <<<END
            <label>{$headings[$l]}:</label> <input type='text' class='form-control' name='{$fields[$l]}'><br />

END;
            }
            $this->divBuffer .= "</div></div></div>";
        }
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
