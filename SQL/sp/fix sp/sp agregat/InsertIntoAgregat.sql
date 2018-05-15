alter procedure InsertIntoAgregat
as

	SET NOCOUNT ON
	exec Agr_waktu_penggunaan 
	exec jumlahPenggunaAplikasi
	exec jumlahPenggunaanKomputer 
	exec agr_aktivitas_userSP

	exec InsertIntoAgregat