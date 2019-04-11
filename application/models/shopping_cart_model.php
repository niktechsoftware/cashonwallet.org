<?php
class Shopping_cart_model extends CI_Model
{
    
    function __construct() {
        $this->proTable = 'products';
		$this->custTable = 'customers_product';
		$this->ordTable = 'order_product';
		$this->ordItemsTable = 'order_items';
    }
    

    public function get_all(){
        $query=$this->db->query("SELECT p.* FROM products p ORDER BY p.id ASC");
        return $query->result_array();

    }
    
        public function getRows($id = ''){

		if($id){

             return $this->db->get_where('products', array('id' =>$id))->row_array();

		}else{
			$this->db->order_by('name', 'asc');
			$result = $this->db->get(products)->result_array();
		}

		// Return fetched data
		return !empty($result)?$result:false;
	}

    // Insert customer details in "customer" table in database.
    public function insert_customer($data)
    {
        $this->db->insert('customers', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
     

    }

    // Insert order date with customer id in "orders" table in database.
    public function insert_order($data)
    {
        $this->db->insert('orders', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    // Insert ordered product detail in "order_detail" table in database.
    public function insert_order_detail($data)
    {
        $this->db->insert('order_detail', $data);
    }

     public function  get_order_detail()
   
   {
      
      $query=$this->db->get('customers');

      return  $query->result();

   }
   	public function getOrder($id){

		$this->db->join('customers_product', 'customers_product.id = order_product.customer_id', 'left');$result=$this->db->get_where('order_product', array('order_product.id' =>$id))->row_array();


		$this->db->join('products', 'products.id = order_items.product_id', 'left');
        $result2=$this->db->get_where('order_items', array('order_items.id' =>$id));


		$result['items'] = ($result2->num_rows() > 0)?$result2->result_array():array();

		return !empty($result)?$result:false;
	}

	public function insertCustomer($data){

        return $this->db->insert('customers_product', $data)?$this->db->insert_id():false;

	}

	public function insertOrder($data){
		// Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        // Insert order data
        $insert = $this->db->insert('order_product', $data);

        // Return the status
		return $insert?$this->db->insert_id():false;
	}

    public function insertOrderItems($data = array()) {

        // Insert order items
        $insert = $this->db->insert_batch('order_items', $data);

        // Return the status
		return $insert?true:false;
    }
    



}
?>