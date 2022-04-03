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
	function insertTask($task_nama, $task_deadline, $task_detail, $task_subjek, $task_prioritas)
	{
		// Memasukan query
		$queryInsert = "INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td) values ('$task_nama', '$task_detail', '$task_subjek', '$task_prioritas', 
		'$task_deadline', 'Belum')";
		return $this->execute($queryInsert);
	}

	// Fungsi untuk delete data ke database
	function delTask($id)
	{
		// Delete record berdasarkan ID hapus pada index (id Hapus = ID_Data)
		$queryDelete = "DELETE FROM tb_to_do where id = $id";
		return $this->execute($queryDelete);
	}

	// Fungsi untuk update data var status ke database
	function updateTask($id)
	{
		// Mengubah status bedasarkan 
		$queryUpdate = "UPDATE tb_to_do set status_TD = 'Sudah' where id=$id";
		return $this->execute($queryUpdate);
	}
}
