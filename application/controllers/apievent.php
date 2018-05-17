<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require  'apibase.php';

class Apievent extends Apibase
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('ticket_model');
        $this->load->model('org_model');
    }

    public function index()
    {
       $events = $this->event_model->getAllEvents();

       foreach ($events as $key => $event) 
       {
            $tickets = $this->ticket_model->getTickets($event["event_id"]);
            $org = $this->org_model->getOrg($event["event_org_id"]);
            $events[$key]['tickets'] = $tickets;
            $events[$key]['org'] = $org;
       }
       echo json_encode($events);
    }
}