<?php 
class MpinDetailController extends CI_Controller
{
    function index()
    {
        $data['title'] = "Mpin Detail";
        $data['smallTitle'] = "Mpin Detail";
        $data['bigTitle'] = "Mpin Detail";
        $data['body'] = "mpindetail";
        $data['headerCss'] = "admin/headerCss/dailyExpenseCss";
        $data['footerJs'] = "admin/footerJs/dailyExpenseJs";
        $this->load->view("include/admin/mainContent",$data);
    }
    
    function totalmpindetail()
    {
        $data['title'] = "Total Mpin Detail";
        $data['smallTitle'] = "Total Mpin Detail";
        $data['bigTitle'] = "Total Mpin Detail";
        $data['body'] = "totalmpindetail";
        $data['headerCss'] = "admin/headerCss/dailyExpenseCss";
        $data['footerJs'] = "admin/footerJs/dailyExpenseJs";
        $this->load->view("include/admin/mainContent",$data);
    }
    
    function mpinused()
    {
        $data['title'] = "Used Mpin";
        $data['smallTitle'] = "Used Mpin";
        $data['bigTitle'] = "Used Mpin";
        $data['body'] = "mpinused";
        $data['headerCss'] = "admin/headerCss/dailyExpenseCss";
        $data['footerJs'] = "admin/footerJs/dailyExpenseJs";
        $this->load->view("include/admin/mainContent",$data);
    }
}

?>