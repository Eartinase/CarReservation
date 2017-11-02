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


	public function getTransactionFromRID($rID){
		$sql = 'SELECT * FROM transaction t join transactiontype tt on t.TransactionTypeId = tt.TransactionTypeId  WHERE ReserveID = '.$rID;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */