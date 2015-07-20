<?php

class category {
	private $values;
    private $catBuffer;
    private $subCatBuffer;
    private $subSubCatBuffer;

    private function parseCatName($string) {
        $string = str_replace(" ", "_", $string);
        $string = str_replace("&", "&amp;", $string);
        return $string;
    }

	public function __construct(translate $k = NULL) {
        if ($k == NULL) die("<HTML><BODY>KEY FILE BROKEN!</BODY></HTML>");

        // TODO: Better handling of urls
		if ($GLOBALS["role"] == "test") $url = "{$GLOBALS['url']}/index.php?title=Article_request/category&action=raw";
		else if ($GLOBALS["role"] == "staging") $url="{$GLOBALS['url']}/User:Matthewrbot/Config/1/category/dev?action=raw";
		else $url = "{$GLOBALS['url']}/User:Matthewrbot/Config/1/category?action=raw";

		$this->values = parse_ini_string(file_get_contents($url), TRUE);

        $this->catBuffer = "<div class='well' id='well_cat'>\r\n";
        $this->catBuffer .= "<h3>";
        $this->catBuffer .= $k->_r("cat");
        $this->catBuffer .= "</h3>\r\n";

        $this->subCatBuffer = "";
        $this->subSubCatBuffer = "";

        foreach(array_keys($this->values) as $key1) {
            $key1 = trim($key1);
            $key1_u = $this->parseCatName($key1);
            $this->catBuffer .= "<input type='button' name='btn_category_{$key1_u}' value='{$key1}' class='btn btn-info'  onClick=\"onClickCategory('cat','{$key1}','');\" /><br />\r\n"; //onClick='set(\"cat\", \"{$key1_u}\")'

            // Sub Category Stuff now
            $this->subCatBuffer .= "<div class='well hide' id='well_sub_{$key1_u}'>\r\n";
            $this->subCatBuffer .= "<h3>";
            $this->subCatBuffer .= $k->_r("subcat");
            $this->subCatBuffer .= "</h3>\r\n";

            foreach(array_keys($this->values[$key1]) as $key2) {
                $key2 = trim($key2);
                $key2_u = $this->parseCatName($key2);
                $this->subCatBuffer .= "<input type='button' name='btn_sub_{$key2_u}' value='{$key2}' class='btn btn-info' onClick='onClickCategory(\"scat\", \"{$key2_u}\", \"{$key1_u}\")' /><br />\r\n";

                $this->subSubCatBuffer .= "<div class='well hide' id='well_subsub_{$key2_u}'>\r";
                $this->subSubCatBuffer .= "<h3>";
                $this->subSubCatBuffer .= $k->_r("subsubcat");
                $this->subSubCatBuffer .= "</h3>\r\n";
                foreach(explode(";", $this->values[$key1][$key2]) as $key3) {
                    $key3 = trim($key3);
                    if ($key3 == "") {$key3 = "other"; }
                    $key3_u = $this->parseCatName($key3);
                    $this->subSubCatBuffer .= "<input type='button' name='btn_sub_sub_{$key3_u}' value='{$key3}' class='btn btn-info' onClick='onClickCategory(\"sscat\", \"{$key3_u}\" , \"{$key2_u}\")' /><br />\r\n";
                }
                $this->subSubCatBuffer .= "</div>\r\n\r\n";
            }
            $this->subCatBuffer .= "</div>\r\n\r\n";
        }
        $this->catBuffer .= "</div>";
	}

	public function __destruct() {
		unset($this->values);
		unset($this->catBuffer);
		unset($this->subCatBuffer);
		unset($this->subSubCatBuffer);

	}

	public function getCat() {
        return $this->catBuffer;
	}

	public function echoCat() {
		print $this->getCat();
	}

    public function getSubCat() {
        return $this->subCatBuffer;
    }

    public function echoSubCat() {
        print $this->getSubCat();
    }

    public function getSubSubCat() {
        return $this->subSubCatBuffer;
    }

    public function echoSubSubCat() {
        print $this->getSubSubCat();
    }

	public function echoValues() {
        print $this->values;
	}
}