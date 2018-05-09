alter procedure laporanPenggunaanTiapUserWaktu
	@parTime time
as
select
	NamaUser,
	id_user
from
	Pengguna INNER JOIN agr_aktivitas_user
		ON Pengguna.id_user = agr_aktivitas_user.FK_User
where
	@parTime > agr_aktivitas_user.waktu_mulai and
	@parTime < agr_aktivitas_user.waktu_akhir


	--select * from agr_aktivitas_user
