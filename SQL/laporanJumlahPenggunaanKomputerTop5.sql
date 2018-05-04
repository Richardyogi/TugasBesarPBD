create procedure laporanJumlahPenggunaanKomputerTop5
as
	select TOP 5
	FK_Komputer,jumlah_penggunaan
	from agr_penggunaan_komputer
