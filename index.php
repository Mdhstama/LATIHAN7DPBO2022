<?php

include("conf.php");
include("DB.php");
include("Task.php");
include("Template.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// Memanggil method getTask di kelas Task
$otask->getTask();

// Proses pengecekan nilai submit
if (isset($_POST['add'])) {

	// Value dari HTML akan ditampung 
	$task_nama = $_POST['tname'];
	$task_deadline = $_POST['tdeadline'];
	$task_detail = $_POST['tdetails'];
	$task_subjek = $_POST['tsubject'];
	$task_prioritas = $_POST['tpriority'];

	// Memanggil fungsi INSERT
	$otask->insertTask($task_nama, $task_deadline, $task_detail, $task_subjek, $task_prioritas);

	// Mengembalikan tampilan ke index
	header("location:index.php");
}

// Proses pengecekan nilai get id_hapus
if (isset($_GET['id_hapus'])) {

	// Memanggil fungsi DELETE
	$otask->delTask($_GET['id_hapus']);

	// Mengembalikan tampilan ke index
	header("location:index.php");
}

// Proses pengecekan nilai get id_status
if (isset($_GET['id_status'])) {

	// Memanggil fungsi UPDATE
	$otask->updateTask($_GET['id_status']);

	// Mengembalikan tampilan ke index
	header("location:index.php");
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $task_nama, $task_detail, $task_subjek, $task_prioritas, $task_deadline, $task_status) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if ($task_status == "Sudah") {
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $task_nama . "</td>
		<td>" . $task_detail . "</td>
		<td>" . $task_subjek . "</td>
		<td>" . $task_prioritas . "</td>
		<td>" . $task_deadline . "</td>
		<td>" . $task_status . "</td>
		<td>
		<button class='btn btn-danger' name='hapus' ><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status task nya belum dikerjakan
	else {
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $task_nama . "</td>
		<td>" . $task_detail . "</td>
		<td>" . $task_subjek . "</td>
		<td>" . $task_prioritas . "</td>
		<td>" . $task_deadline . "</td>
		<td>" . $task_status . "</td>
		<td>
		<button class='btn btn-danger' name='hapus' ><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}

// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();
