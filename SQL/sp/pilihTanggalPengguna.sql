alter procedure pilihTanggalPengguna
	@date date
as

select
	* 
from agr_jumlah_pengguna_per_jam
where tanggal = @date

