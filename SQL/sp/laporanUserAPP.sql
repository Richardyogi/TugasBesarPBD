USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[laporanAktifitasUserAPP]
	@app int
as

	select * from agr_aktivitas_user
	
	where 
	@app = FK_Aplikasi

	exec laporanAktifitasUserAPP '90'


