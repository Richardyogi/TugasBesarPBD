create function lihatPenggunaanPadaTanggalTertentu(
	@date date
)
returns @resultTable table
(
	tanggal date,
	start_time time,
	end_time time,
	jumlah_pengguna int
)
begin
	insert into @resultTable
	SELECT * from agr_jumlah_pengguna_per_jam
	where tanggal = @date

	return 
end

