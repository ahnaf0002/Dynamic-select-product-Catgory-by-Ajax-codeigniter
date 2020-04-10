<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/product_model');
		$this->load->helper('form');
		$data = array();
		$this->load->library('form_validation');
	}



	public function addproduct()
	{

		$data = array();
		$data['title'] = 'Supplier List';
		$data['header'] = $this->load->view('inc/header', $data, true);
		$data['footer'] = $this->load->view('inc/footer', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$data['tbl_product_categories'] = $this->product_model->getAllCategory();
		 
		 
 		$data['content'] = $this->load->view('inc/product/addproduct', $data, true);
		$this->load->view('home', $data);
	}

	public function getAllSubCategory()
	{

		$data = array();
		  
		$product_category_id = $this->input->post('product_category_id');
		$tbl_product_subcategory = $this->product_model->getAllSubCategory($product_category_id);

		if(count($tbl_product_subcategory)>0){

			$pro_select_box ='';
			$pro_select_box .= '<option value ""> choose...</option>';

			foreach ($tbl_product_subcategory as $product_subcategory){

				$pro_select_box .= '<option value="'.$product_subcategory->product_subcategory_id.'">'.$product_subcategory->product_subcategory.'</option>';

			}
			echo json_encode($pro_select_box);

		}

	}
}
