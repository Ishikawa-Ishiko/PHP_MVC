<?php
require_once('../Models/dbc.php');
class ContactController
{
    private $request;
    private $Contact;

    public function __construct()
    {
        $this->request['get'] = $_GET;
        $this->request['post'] = $_POST;
        $this->Dbc = new Dbc();
    }

    public function index()
    {
        $contacts = $this->Dbc->findAll();
        return $contacts;
    }

    public function create()
    {
        $this->Dbc->create();
    }

    public function update()
    {
        $this->Dbc->update();
    }

    public function delete()
    {
        $this->Dbc->delete();
    }
}