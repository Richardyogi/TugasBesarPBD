alter procedure jumlahPenggunaanKomputer
	@date date
as

	declare @idKomputer int
	declare @jumlahKomputer int
	declare @jumlahWaktu int
	declare @tabelKomputer table(
		idKomputer int,
		jumlahKomputer int,
		jumlahWaktu int
	)
	
	insert into @tabelKomputer
	select 
		idKomputer,
		COUNT(idKomputer),
		DATEDIFF(second, waktuMulai,waktuAkhir)
	from
		dbo.rekapRoundRobin(@date) 
	group by
		idKomputer

	declare cariKomputer cursor
	for
		select
			idKomputer,
			jumlahKomputer,
			jumlahWaktu
		from
			@tabelKomputer
	
	open cariKomputer

	fetch next from
		cariKomputer
	into
		@idKomputer,
		@jumlahKomputer,
		@jumlahWaktu

	while(@@FETCH_STATUS=0 )
	begin
		
		update agr_penggunaan_komputer
		set jumlah_pengguna = jumlah_pengguna + @jumlahKomputer,
			durasi = durasi+@jumlahWaktu
		where FK_Komputer =@idKomputer

		fetch next from
			cariKomputer
		into
			@idKomputer,
			@jumlahKomputer,
			@jumlahWaktu
	end
	close cariKomputer
	deallocate cariKomputer

--select * from agr_penggunaan_aplikasi
--select *
--from
--		RoundRobin where fk_user is not null

--exec jumlahPenggunaAplikasi

	

	
