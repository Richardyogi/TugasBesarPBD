USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
alter procedure [dbo].[daftarPenggunaPerjamTGL]
	@date date
as

	select * from agr_jumlah_pengguna_per_jam
	
	where 
	@date = tanggal

	--exec daftarPenggunaPerjamTGL '2018-05-11'
