alter procedure laporanPenggunaApplikasi
	@parName varchar(20)
as

select
	Aplikasi.id_aplikasi as 'IdAplikasi',
	Aplikasi.NamaAplikasi as 'NamaAplikasi',
	agr_penggunaan_aplikasi.jumlah_pengguna as 'JumlahPengguna'
from
	agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi
where
	NamaAplikasi like '%'+@parName+'%'

--exec laporanPenggunaApplikasi 'Microsoft Pdf Reader'

exec laporanPenggunaApplikasi 'pdf'