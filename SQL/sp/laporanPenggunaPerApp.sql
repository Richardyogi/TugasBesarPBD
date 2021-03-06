alter procedure laporanPenggunaAplikasi
	@parName varchar(20),
	@parId int
as
if(@parName is not null)
begin
	select
		Aplikasi.id_aplikasi as 'IdAplikasi',
		Aplikasi.NamaAplikasi as 'NamaAplikasi',
		agr_penggunaan_aplikasi.jumlah_pengguna as 'JumlahPengguna'
	from
		agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi
	where
		NamaAplikasi like '%'+@parName+'%'
end
else if(@parId is not null)
begin
	select
		Aplikasi.id_aplikasi as 'IdAplikasi',
		Aplikasi.NamaAplikasi as 'NamaAplikasi',
		agr_penggunaan_aplikasi.jumlah_pengguna as 'JumlahPengguna'
	from
		agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi
	where
		id_aplikasi = @parId
end
else 
begin
	
	select
		Aplikasi.id_aplikasi as 'IdAplikasi',
		Aplikasi.NamaAplikasi as 'NamaAplikasi',
		agr_penggunaan_aplikasi.jumlah_pengguna as 'JumlahPengguna'
	from
		agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi
end
--exec laporanPenggunaApplikasi 'Microsoft Pdf Reader'

--exec laporanPenggunaAplikasi null,null