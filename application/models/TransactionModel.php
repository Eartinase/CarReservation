<?php
defined('BASEPATH') || exit('No direct script access allowed');

class TransactionModel extends CI_Model {

	public function getTransactionType(){
		$query = $this->db->get('transactiontype');
		return $query->result_array();
	}

	public function insert_Trans( $rID,$TransID , $note){
		$data = array(
			'ReserveID' => $rID ,
		   'TransactionTypeId' => $TransID ,
		   'Note' => $note 
		);

		$this->db->insert('transaction', $data); 
	}


}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */