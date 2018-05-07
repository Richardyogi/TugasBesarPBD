alter procedure jumlahPenggunaAplikasi
as

	declare @idAplikasi int
	declare @jumlahAplikasi int
	declare @tabelAplikasi table(
		idAplikasi int,
		jumlahAplikasi int
	)
	
	insert into @tabelAplikasi
	select 
		idAplikasi,
		COUNT(idAplikasi)
	from
		dbo.rekapRoundRobin(convert(date,CURRENT_TIMESTAMP)) 
	group by
		idAplikasi

	

	declare cariAplikasi cursor
	for
		select
			idAplikasi,
			jumlahAplikasi
		from
			@tabelAplikasi
	
	open cariAplikasi

	fetch next from
		cariAplikasi
	into
		@idAplikasi,
		@jumlahAplikasi

	while(@@FETCH_STATUS=0 )
	begin
		
		update agr_penggunaan_aplikasi
		set jumlah_pengguna = jumlah_pengguna + @jumlahAplikasi
		where FK_Aplikasi =@idAplikasi

		fetch next from
			cariAplikasi
		into
			@idAplikasi,
			@jumlahAplikasi
	end
	close cariAplikasi
	deallocate cariAplikasi







	

	
