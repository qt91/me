<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QT_Controller extends MX_Controller
{

    var $form_fields;
    var $data;
    var $RedirectLink;
    var $User;
    public function __construct()
    {
        parent::__construct();

        $this->data = array();
        $user = $this->session->userdata('datauser');
        $this->data['Sess'] = null;
        if($user)
            $this->data['Sess'] = $user;

        $this->load->model('m_setting');
        $arr = $this->m_setting->select_all();
        $aTemp = array();
        foreach($arr as $key=>$val){
            $aTemp[$val->se_key] = $val->se_value;
        }

        $this->data['Setting'] = $aTemp;
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('datauser');
        if($user)
            return true;
        else
            return false;
    }
    /**
     * Show Error with ison format
     */
    public function qt_error($msg,$data = 0){
        $jsonOut = array('result'=>false,
                         'msg'=>$msg,
                         'dat'=>$data);
        header('Content-Type: application/json');
        echo json_encode($jsonOut);
        exit();
    }

    /**
     * Show Error with ison format
     */
    public function qt_success($msg,$data = 0){
        $jsonOut = array('result'=>true,
                         'msg'=>$msg,
                         'dat'=>$data);
        header('Content-Type: application/json');
        echo json_encode($jsonOut);
        exit();
    }




}

?>