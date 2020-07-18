<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'unit_m', 'category_m']);  
	}
    
	function get_ajax() 
	{
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no."";
            $row[] = $item->barcode;//.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = indo_currency($item->price);
            $row[] = $item->stock;
            //$row[] = $item->image != null ? '<img src="'.base_url('uploads/product/'.$item->image).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                      <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin mau menghapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
	
	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
		$item->price = null;
		$item->category_id = null;

		$query_category = $this->category_m->get();

		$query_unit = $this->unit_m->get();
		$unit[null] = "";
		foreach($query_unit->result() as $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = array(
			'page' => 'add',
			'row' => $item,
			'category' => $query_category,
			'unit' => $unit, 'selectedunit' => null
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			$query_category = $this->category_m->get();

			$query_unit = $this->unit_m->get();
			$unit[null] = "";
			foreach($query_unit->result() as $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit, 'selectedunit' => $item->unit_id,
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}
		else {
			echo "<script> alert('Data tidak ditemukan');";
			echo "window.location='".site_url('item')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0)
			{
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai");
				redirect('item/add');
			}
			else
			{				
				$this->item_m->add($post);
			}
		} 
		elseif(isset($_POST['edit']))
		{
			if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0)
			{
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai");
				redirect('item/edit/'.$post['id']);
			}
			else
			{
				$this->item_m->edit($post);
			}
		}
		
		if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('item');
	}

	public function del($id)
	{
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('item');
	}
}
