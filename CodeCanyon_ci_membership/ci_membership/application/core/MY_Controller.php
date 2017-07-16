<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * process_partial: load the default view when no view exists in the current theme's views folder
     *
     * @param $name string the name of the partial
     * @param $path the path to the correct view file
     * @return -
     *
     */

    protected function _process_partial($name, $theme, $path) {
        //if (file_exists(APPPATH . 'views/themes/'. $theme .'/'. $path .'.php')) {
            $this->template->set_partial($name, 'themes/'. $theme .'/'. $path);
        /*}else{
            $this->template->set_partial($name, 'themes/bootstrap3/'. $path); // fallback
        }*/
    }

    /**
     *
     * process_template_build: build the default view when no view is available in the current theme's views folder
     *
     * @param $path the path to the correct view file
     * @param $data array of data passed to view
     * @return -
     *
     */

    protected function _process_template_build($theme, $path, $data = null) {
        //if (file_exists(APPPATH . 'views/themes/' . $theme .'/'. $path .'.php')) {
            $this->template->build('themes/'. $theme .'/'. $path, $data);
        /*}else{
            $this->template->build('themes/bootstrap3/'. $path, $data);
        }*/
    }

    /**
     *
     * quick_page_setup: a page preparation function for usage in controller index() to quickly configure page layout.
     *
     * @param $theme theme folder
     * @param $layout_folder_name layout name php file
     * @param $page_title page title
     * @param $path correct path to view file
     * @param $overriding_theme alternate folder location for views if you need some from other themes
     * @param $data array of data passed to view
     * @return -
     *
     */

    public function quick_page_setup($theme, $layout_folder_name, $page_title, $path, $header, $footer, $overriding_theme = "", $data = array()) {

        if (empty($overriding_theme)) {
            $overriding_theme = $theme;
        }

        $this->template->set_theme($theme);
        $this->template->set_layout($layout_folder_name);
        $this->template->title($page_title);
        $this->_process_partial('header', $theme, 'partials/'. $header);
        $this->_process_partial('footer', $theme, 'partials/'. $footer);

        if (!empty($data)) {
            $this->_process_template_build($overriding_theme, $path, $data);
        }else{
            $this->_process_template_build($overriding_theme, $path);
        }

    }

}
