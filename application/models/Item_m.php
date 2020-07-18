<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model {

    // start datatables
    var $column_order = array(null, 'barcode', 'tb_p_item.name', 'category_name', 'unit_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'tb_p_item.name', 'price', 'tb_p_category.name', 'tb_p_unit.name'); //set column field database for datatable searchable
    var $order = array('barcode' => 'asc'); // default order 
    
    private function _get_datatables_query() {
        $this->db->select('tb_p_item.*, tb_p_category.name as category_name, tb_p_unit.name as unit_name');
        $this->db->from('tb_p_item');
        $this->db->join('tb_p_category', 'tb_p_item.category_id = tb_p_category.category_id');
        $this->db->join('tb_p_unit', 'tb_p_item.unit_id = tb_p_unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
            
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $this->db->from('tb_p_item');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get($id = null)
    {
        $this->db->select('tb_p_item.*, tb_p_category.name as category_name, tb_p_unit.name as unit_name');
        $this->db->from('tb_p_item');
        $this->db->join('tb_p_category', 'tb_p_category.category_id = tb_p_item.category_id');
        $this->db->join('tb_p_unit', 'tb_p_unit.unit_id = tb_p_item.unit_id');
        if($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['item_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
        ];
        $this->db->insert('tb_p_item', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['item_name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('tb_p_item', $params);
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('tb_p_item');
        $this->db->where('barcode', $code);
        if($id != null)
        {
            $this->db->where('item_id !=',  $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('tb_p_item');
    }

    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE tb_p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE tb_p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}