create procedure laporanPenggunaanKomputer
	@idKomputer int
as
	declare @tableJumlahPenggunaanKomputer table(
		IdKomputer int,
		Jumlah_Penggunaan int
	)

	insert into @tableJumlahPenggunaanKomputer
	select 
		FK_Komputer,
		jumlah_penggunaan
	from
		agr_penggunaan_komputer
	where
		FK_Komputer = @idKomputer

	select * from @tableJumlahPenggunaanKomputer

	exec laporanPenggunaanKomputer 4