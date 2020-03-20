<?php
    class Template {
        # Path to template
        protected $template_path;
        # Vars passed in
        protected $vars = array();

        /**
         * Constructor
         * @param [type] $template_path
         */
        public function __construct($template_path) {
            $this->template_path = $template_path;
        }

        # Getters
        /**
         * get
         *
         * @param [type] $key
         * @return void
         */
        public function __get($key) {
            return $this->vars[$key];
        }

        # Setters
        /**
         * set
         *
         * @param [type] $key
         * @param [type] $value
         */
        public function __set($key, $value) {
            $this->vars[$key] = $value;
        }

        /**
         * toString
         * @return string
         */
        public function __toString() {
            extract($this->vars);
            chdir(dirname($this->template_path));
            ob_start();

            include basename($this->template_path);
            return ob_get_clean();
        }
    }
?>