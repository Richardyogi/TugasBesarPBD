alter function tabelJmlPengguna()
returns @returnTable table
(
start_time time,
end_time time,
jumlah_pengguna int
)
BEGIN

insert into @returnTable
	select
		start_time,
		end_time,
		jumlah_pengguna = avg(jumlah_pengguna)
	from
		dbo.agr_jumlah_pengguna_per_jam
	group by
		start_time,
		end_time
	return
end

select * from dbo.tabelJmlPengguna()