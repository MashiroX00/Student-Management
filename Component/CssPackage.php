<?php
    class CssPackage {
        private $url;
        private $base;

        public function __construct($path,$baseurl)
        {
            $this->url = $path;
            $this->base = $baseurl;
        }

        public function loadheader() {
            try {
                if (require $this->url . "/Import/pack1.php") {
                    return "Success";
                }else {
                    throw new Exception("Cannot import");
                }
            }catch (Exception $e) {
                return "Failed: " . $e->getMessage();
            }

        }
        public function getpath() {
            $path1 = ["URL"=>"$this->url","BASE"=>"$this->base"];
            return var_dump($path1);
        }
    }
?>