<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
parent::__construct();

// $this->load->library('Shopping_cart_model');

// $this->load->model('product');

    }


    public function index()
	{
    $this->load->library('cart');
    $this->load->model('Shopping_cart_model');
    $data['products'] = $this->Shopping_cart_model->get_all();
    $data['title'] = 'Cash on Wallet';
    $this->load->view("cashonHome", $data);
    
    }

    public function shop()
    {
    $data['title'] = 'Shopping';
    $this->load->view("shop", $data);

    }

    public function product()
    {
    $data['title'] = 'Product';
    $this->load->view("product", $data);

    }

    public function blog()
    {
    $data['title'] = 'Plan & Details';
    $this->load->view("blog", $data);

    }

    public function blog_simple()
    {
    $data['title'] = 'blog Post';
    $this->load->view("blog_simple", $data);

    }

    public function regular()
    {
    $data['title'] = 'regular';
    $this->load->view("regular", $data);

    }

    // public function cart()
    // {
    // $data['title'] = 'Cart';
    // $this->load->view("cart", $data);

    // }

	public function contact()
	{
    $data['title'] = 'Contact Us';
    $this->load->view("contact", $data);

    }
    
    public function add()
    {
    $insert_data = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'image' => $this->input->post('image'),
        'qty' => 1
    );
    // $this->load->model('shopping_cart_model')
    $this->cart->insert($insert_data);
    echo $fefe = count($this->cart->contents());
}


// public function checkcart(){
    
    
//     if($this->session->userdata('customer_username')){
// 			redirect('welcome/opencart', 'refresh');
//         }else{
//             // $this->load->view('admin/login');
//             redirect('welcome/registration', 'refresh')	;
//         }
    
// }


public function checkcart($proid){

    $this->load->library('cart');
    $this->load->model('Shopping_cart_model');

    // if($this->session->userdata('customer_username')){
        $products = $this->Shopping_cart_model->getRows($proid);

		// Add product to the cart
		$data = array(
			'id'	=> $products['id'],
            'name'	=> $products['product_name'],
            'price'	=> $products['product_price'],
            'type' => $products['product_type'],
            'data_quantity' => $products['product_quantity'],
            'image' => $products['product_image'],
            'description'=>$products['product_description'],
			'qty'	=> 1,
        );
        	$this->cart->insert($data);
			redirect('opencart', 'refresh');
        // }else{
        //     // $this->load->view('admin/login');
        //     redirect('welcome/registration', 'refresh')	;
        // }
}



public function checkproduct($proid){

    $this->load->library('cart');
    $this->load->model('Shopping_cart_model');

    // if($this->session->userdata('customer_username')){
        $products = $this->Shopping_cart_model->getRows($proid);

		// Add product to the cart
		$data = array(
			'id'	=> $products['id'],
            'name'	=> $products['product_name'],
            'price'	=> $products['product_price'],
            'type' => $products['product_type'],
            'data_quantity' => $products['product_quantity'],
            'image' => $products['product_image'],
            'description'=>$products['product_description'],
			'qty'	=> 1,
        );
        	$this->cart->insert($data);
			redirect('openproduct', 'refresh');
    }
        // }else{
        //     // $this->load->view('admin/login');
        //     redirect('welcome/registration', 'refresh')	;
        // }
// }


    public function opencart()
    {

        $data['title'] = 'Cart';
        $data['cart']  = $this->cart->contents();
        $this->load->view("cart", $data);
    }

    public function registration(){

    $data['title'] = 'Registration';
    $this->load->view("registration", $data);

    }

    public function cashonlogin(){

    $data['title'] = 'Login With Cashonc ID';
    $this->load->view("cashonlogin", $data);

    }

        public function shoponlogin(){

    $data['title'] = 'Login With shop ID';
    $this->load->view("shoponlogin", $data);

    }

    public function cashloginauth(){

        $username = $this->input->post('username');

        $password = $this->input->post('password');

        $this->load->model('logintable');

        $loginData = $this->logintable->getLoginData($username, $password);

        if ($loginData['is_login']) {
            $this->session->set_userdata($loginData);
           
            redirect('welcome/opencart', 'refresh');
 
        } else {
        
            echo "<script>alert('Error , Your username or password incorrect !');</script>";
            redirect('/welcome/cashonlogin', 'refresh');

        }
    }

    public function userDetail()
    {
        $data=array(

        'customer_name'=>$this->input->post('customername'),
		'password'=>$this->input->post('password'),
		'email'=>$this->input->post('email'),
        'mobilenumber'=>$this->input->post('mobilenumber'),
        'password'=>$this->input->post('password'),
        'current_address'=>$this->input->post('pin')
       );

       if($this->UserDetail->userReg($data)){

        // $id = $this->db->query("SELECT * FROM customer_info ORDER BY id DESC LIMIT 1")->row()->id;
		// $this->UserDetail->userReg($id);
         echo "<script>alert('Dear SIR, Your Registration is successful');</script>";
         redirect('welcome/opencart', 'refresh');
		 
	   }else{
		echo "Data not found";
	   }
            
            // $this->db->select_max('id');
            // $this->db->from('customer_info');
            // $maxid=$this->db->get()->row()->id;
            // $maxid=$maxid+1;
            // $username = $maxid+100;
            // echo $username;
    }
  
}