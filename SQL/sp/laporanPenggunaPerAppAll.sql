create procedure LaporanPenggunaAplikasiAll
as

SELECT 
	* 
from 
	agr_penggunaan_aplikasi join aplikasi 
	on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi