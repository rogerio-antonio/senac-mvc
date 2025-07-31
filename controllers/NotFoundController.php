<?php
class NotFoundController extends Controller
{/* 404 */

    private $data;

    public function __construct()
    {
        parent::__construct();

        $this->data = [];
    }

    private function loadDefaultData($title = "", $menu_active = "")
    {

        $this->data['title'] = $title;
        $this->data['menu_active'] = $menu_active;
    }

    public function index()
    {

        $data = array();


        $this->loadView('404', $this->data);
    }
}
