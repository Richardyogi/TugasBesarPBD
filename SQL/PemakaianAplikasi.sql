alter procedure jumlahPenggunaAplikasi
as
	declare @idAplikasi int
	declare @status int
	declare @tabelAplikasi table(
		idAplikasi int,
		statusAplikasi int
	)

	insert into @tabelAplikasi
	select 
		idAplikasi,
		status
	from
		testTBLRoundRobin(CONVERT(date,CURRENT_TIMESTAMP))

	declare cariAplikasi cursor
	for
		select
			idAplikasi,
			statusAplikasi
		from
			@tabelAplikasi
	
	open cariAplikasi

	fetch next from
		cariAplikasi
	into
		@idAplikasi,
		@status

	while(@@FETCH_STATUS=0 and @status = 1)
	begin
		
		update agr_penggunaan_aplikasi
		set jumlah_pengguna = jumlah_pengguna +1
		where FK_Aplikasi =@idAplikasi

		fetch next from
			cariAplikasi
		into
			@idAplikasi,
			@status
	end
	close cariAplikasi
	deallocate cariAplikasi

	select
		*
	from
		agr_penggunaan_aplikasi

	exec jumlahPenggunaAplikasi

	
	update agr_penggunaan_aplikasi
	set jumlah_pengguna=0

	select
		*
	from testTBLRoundRobin(CONVERT(date,CURRENT_TIMESTAMP))
	exec jumlahPenggunaAplikasi

