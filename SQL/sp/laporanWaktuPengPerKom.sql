alter procedure laporanWaktuPengPerkom
	@parTime time
as

select 
	jumlah_penggunaan,
	durasi
 from 
	agr_penggunaan_komputer INNER JOIN agr_aktivitas_user
		ON agr_penggunaan_komputer.FK_Komputer = agr_aktivitas_user.FK_Komputer
where
	@parTime > agr_aktivitas_user.waktu_mulai and
	@parTime < agr_aktivitas_user.waktu_akhir

	--exec laporanWaktuPengPerkom '12:00:00'