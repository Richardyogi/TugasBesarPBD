USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[daftarPenggunaPerjamJAM]
	@jam time(7)
as

	select * from agr_jumlah_pengguna_per_jam
	
	where 
	@jam<end_time and 
	@jam>start_time

	--exec daftarPenggunaPerjamJAM '08:20:00'
