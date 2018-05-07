alter procedure agr_waktu_penggunaan
	@date date
as

declare @n int
set @n =0
declare @awal time
set @awal ='08:00:00'
declare @akhir time
set @akhir = '09:00:00'

declare @tempTable table
(
	tanggalTemp date,
	jamAwalTemp time,
	jamAkhirTemp time
)

insert into @tempTable
select
	tanggal, 
	waktuMulai, 
	waktuAkhir
FROM dbo.rekapRoundRobin(@date) 

declare @jumlahPengguna int
set @jumlahPengguna=0

while(@n < 11)
begin
	select 
		@jumlahPengguna = count(*) 
	from 
		@tempTable 
	where
		(jamAwalTemp<= @awal and jamAkhirTemp>@awal) or
		(jamAwalTemp>= @awal and jamAwalTemp<@akhir) 

	insert into agr_jumlah_pengguna_per_jam
	select
		@date,
		@awal,
		DATEADD(second,3599,@awal),
		@jumlahPengguna 

	set @awal= DATEADD(hour,1,@awal)
	set @akhir= DATEADD(hour,1,@akhir)
	set @n=@n+1
end

--declare @k date
--set @k= convert(date, CURRENT_TIMESTAMP)
----select * from dbo.rekapRoundRobin(@n)
--exec agr_aktivitas_userSP @k 

--select * from agr_jumlah_pengguna_per_jam
--select * from dbo.rekapRoundRobin(@k)

--delete agr_jumlah_pengguna_per_jam

select * from agr_aktivitas_user