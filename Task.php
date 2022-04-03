<?php

class Task extends DB
{
	// Mengambil data
	function getTask()
	{
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}

	// Fungsi untuk insert data ke database
	function insertTask($tname, $tdeadline, $tdetails, $tsubject, $tpriority)
	{
		// Memasukan query
		$query = "INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td) values ('$tname', '$tdetails', '$tsubject', '$tpriority', 
		'$tdeadline', 'Belum')";
		return $this->execute($query);
	}

	// Fungsi untuk delete data ke database
	function delTask($id)
	{
		// Delete record berdasarkan ID hapus pada index (id Hapus = ID_Data)
		$query = "DELETE FROM tb_to_do where id = $id";
		return $this->execute($query);
	}

	// Fungsi untuk update data var status ke database
	function updateTask($id)
	{
		// Mengubah status bedasarkan 
		$query = "UPDATE tb_to_do set status_TD = 'Sudah' where id=$id";
		return $this->execute($query);
	}
}
