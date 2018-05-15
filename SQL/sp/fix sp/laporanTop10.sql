create procedure laporanTop10
	@namaTabel varchar(60)
as

if(@namaTabel='komputer')
begin
		select TOP 10
			FK_Komputer,jumlah_penggunaan, durasi
		from 
			agr_penggunaan_komputer
		order by
			jumlah_penggunaan desc
end
else if(@namaTabel ='aplikasi')
begin
	select TOP 10
		FK_aplikasi,jumlah_pengguna
	from 
		agr_penggunaan_aplikasi
	order by
		jumlah_pengguna  desc
end

select * from agr_penggunaan_aplikasi