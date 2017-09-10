<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/Ebay/Client.php');


Class Site extends Private_Controller
{

    /** Synchronization period for site (7 days) */
    const SYNCHRONIZATION_PERIOD = 604800;

    /** Synchronization period for site details (1 day) */
    const SYNCHRONIZATION_DETAIL_PERIOD = 86400;

    protected $CI;

    public function __construct()
    {
        parent::__construct();

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->model('membership/ebay_model');

    }

    /**
     * Check needle synchronization sites from ebay
     */
    public function isNeedSynchronization()
    {

        $last_sync = $this->ebay_model->get_storage_data('ebay_site_synchronization_time');

        //https://stackoverflow.com/questions/2845105/php-check-if-it-has-been-one-week-since-timestamp
        $time = strtotime($last_sync->last_update);
        $one_week_ago = strtotime('-1 week');

        if ($time > $one_week_ago) {
            /*// it's sooner than one week ago
            $time_left = $time - $one_week_ago;
            $days_left = floor($time_left / 86400); // 86400 = seconds per day
            $hours_left = floor(($time_left - $days_left * 86400) / 3600); // 3600 = seconds per hour
            echo "Still $days_left day(s), $hours_left hour(s) to go.";*/
            return true;
        } else return false;
    }

    public function synchronization($site_id)
    {
        $site_id = $site_id == null ? 0 : $site_id;
        $params = array('service' => 'trading', 'id' => $site_id);
        /*$this->CI->load->library('Ebay/client', $params, 'Client');

        $result = $this->Client->get_ebay_details('SiteDetails');
        $sites = $result->getSiteDetails();*/

        $client = new Client($params);
        $result = $client->get_ebay_details('SiteDetails');
        $sites = $result->getSiteDetails();

        //Setting values for table columns
        if (!empty($sites)) {
            foreach ($sites as $value) {
                $data = array(
                    'site_id' => $value->site_id,
                    'site' => $value->site,
                );
                //Transferring data to Model
                $this->ebay_model->set_site($data);
            }
        }
        $this->setLastSynchronizationTime(date('Y-m-d H:i:s'));

        unset($client);

    }

    /**
     * set last synchronization time
     * @param int $time
     */
    public function setLastSynchronizationTime($time)
    {
        $this->ebay_model->set_storage_data('ebay_site_synchronization_time', $time);

    }
}