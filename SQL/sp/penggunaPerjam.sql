alter procedure jumlahPenggunaPerjam
	@parTime time
as

select
	 jumlah_pengguna
 from 
	agr_jumlah_pengguna_per_jam
where

	@parTime<end_time and 
	@parTime <start_time

--exec jumlahPenggunaPerjam '12:00:00'

	--select * from agr_jumlah_pengguna_per_jam