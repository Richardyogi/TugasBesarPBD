USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[laporanAktifitasUserKOM]
	@komputer int
as

	select * from agr_aktivitas_user
	
	where 
	@komputer = FK_Komputer

	exec laporanAktifitasUserKOM '77'


