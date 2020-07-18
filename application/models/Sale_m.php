<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_m extends CI_Model {

    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM tb_t_sale 
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            $n = ((int) $row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "AC".date('ymd').$no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, tb_p_item.name as item_name, tb_t_cart.price as cart_price');
        $this->db->from('tb_t_cart');
        $this->db->join('tb_p_item', 'tb_t_cart.item_id = tb_p_item.item_id');
        if($params != null)
        {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM tb_t_cart");
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            $car_no = ((int) $row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        
        $params = array(
            'cart_id' => $car_no,
            'item_id' => $post['item_id'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'total' => ($post['price'] * $post['qty']),
            'user_id' => $this->session->userdata('userid'),
        );
        $this->db->insert('tb_t_cart', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE tb_t_cart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                total = '$post[price]' * qty
                WHERE item_id = '$post[item_id]'";

        $this->db->query($sql);
    }

    public function del_cart($params = null) 
    {
        if($params != null)
        {
            $this->db->where($params);
        }
        $this->db->delete('tb_t_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price' => $post['price'],
            'qty' => $post['qty'],
            'discount_item' => $post['discount'],
            'total' => $post['total']
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('tb_t_cart', $params);
    }
    
    public function add_sale($post)
    {
        $params = array(
            'invoice' => $this->invoice_no(),
            'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
            'total_price' => $post['subtotal'],
            'discount' => $post['discount'],
            'final_price' => $post['grandtotal'],
            'cash' => $post['cash'],
            'remaining' => $post['change'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')
        );

        $this->db->insert('tb_t_sale', $params);
        return $this->db->insert_id();
    }

    public function add_resep($post)
    {
            $params_resep = [
            'no_sip' => $post['resep_id'] == "" ? null : $post['resep_id'],
            'name' => $post['resep_name'] == "" ? null : $post['resep_name'],
            'date' => $post['date']
        ];
        
        $this->db->insert('tb_resep', $params_resep);
        return $this->db->insert_id();
    }

    function add_sale_detail($params)
    {
        $this->db->insert_batch('tb_t_sale_detail', $params);
    }

    public function get_sale($id = null)
    {
        $this->db->select('*, tb_customer.name as customer_name, tb_user.username as user_name, 
                        tb_t_sale.created as sale_created');
        $this->db->from('tb_t_sale');
        $this->db->join('tb_customer', 'tb_t_sale.customer_id = tb_customer.customer_id', 'left');
        $this->db->join('tb_user', 'tb_t_sale.user_id = tb_user.user_id');
        if($id != null)
        {
            $this->db->where('sale_id', $id);
        }
        $this->db->order_by('invoice', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_sale_detail($sale_id = null)
    {
        $this->db->from('tb_t_sale_detail');
        $this->db->join('tb_p_item', 'tb_t_sale_detail.item_id = tb_p_item.item_id');
        if($sale_id != null)
        {
            $this->db->where('tb_t_sale_detail.sale_id', $sale_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del_sale($id)
    {
        $this->db->where('sale_id', $id);
        $this->db->delete('tb_t_sale');
    }
}