alter procedure laporanPenggunaApplikasi
	@parName varchar(20)
as

select
	jumlah_pengguna
from
	Aplikasi INNER JOIN agr_penggunaan_aplikasi
		ON Aplikasi.id_aplikasi = agr_penggunaan_aplikasi.FK_Aplikasi
where
	@parName = Aplikasi.NamaAplikasi

	--exec  laporanPenggunaApplikasi 'Android Pdf Reader'