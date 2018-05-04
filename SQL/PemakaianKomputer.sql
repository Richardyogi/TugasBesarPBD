alter procedure jumlahPenggunaanKomputer
as
	declare @tabelKomputer table(
		idPengguna int,
		idUser int,
		idKomputer int,
		idAplikasi int,
		tanggal date,
		jam time,
		status int
	)
	declare @idPengguna int
	declare @idUser int
	declare @idKomputer int
	declare @idAplikasi int
	declare @tanggal date
	declare @jam time
	declare @status int
	declare @idKomputerTemp int
	declare @statusTemp1 int
	declare @statusTemp0 int
	declare @waktuTemp time
	declare @setJam0 time
	declare @setJam1 time
	
	declare cariKomputer cursor
	for
		select 
			*
		from
			testTBLRoundRobin(CONVERT(date,CURRENT_TIMESTAMP))
		order by
			idUser,idPengguna asc

	open cariKomputer
	fetch next from
		cariKomputer
	into
		@idPengguna,
		@idUser,
		@idKomputer,
		@idAplikasi,
		@tanggal,
		@jam,
		@status
		
	while(@@FETCH_STATUS=0)
	begin
		insert into @tabelKomputer
		select
			@idPengguna,
			@idUser,
			@idKomputer,
			@idAplikasi,
			@tanggal,
			@jam,
			@status
		fetch next from cariKomputer
		into
			@idPengguna,
			@idUser,
			@idKomputer,
			@idAplikasi,
			@tanggal,
			@jam,
			@status
	end
	close cariKomputer
	deallocate cariKomputer

	declare hitungKomputer1 cursor
	for 
		select 
			idKomputer,
			jam,
			status
		from
			@tabelKomputer
			where status=1

		open hitungKomputer1
		fetch next from
			hitungKomputer1
		into
			@idKomputerTemp,
			@setJam1,
			@statusTemp1
			
		declare hitungKomputer2 cursor
		for 
			select 
				idKomputer,
				jam,
				status
			from
				@tabelKomputer
				where status=0

		open hitungKomputer2
		fetch next from
			hitungKomputer2
		into
			@idKomputerTemp,
			@setJam0,
			@statusTemp0
		while(@@FETCH_STATUS=0)
		begin
			update agr_penggunaan_komputer
			set durasi = DATEDIFF(HOUR,@setJam1,@setJam0),
				jumlah_penggunaan = jumlah_penggunaan + 1
			where FK_Komputer = @idKomputerTemp
			
			fetch next from
				hitungKomputer1
			into
			@idKomputerTemp,
			@setJam1,
			@statusTemp1

			fetch next from
				hitungKomputer2
			into
				@idKomputerTemp,
				@setJam0,
				@statusTemp0

		end

		close hitungKomputer1
		deallocate hitungKomputer1
		close hitungKomputer2
		deallocate hitungKomputer2


	
		
	
		
		 