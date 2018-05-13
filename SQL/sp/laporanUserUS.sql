USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
alter procedure [dbo].[laporanAktifitasUserUS]
	@user int
as

	select * from agr_aktivitas_user
	
	where 
	@user = FK_User

	exec laporanAktifitasUserUS '12'


