USE [master]
GO
/****** Object:  StoredProcedure [dbo].[insertAplikasi]    Script Date: 10/05/2018 18:03:41 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER procedure [dbo].[insertAplikasi]
	@namaAplikasi varchar(100)
as
	INSERT INTO Aplikasi VALUES(@namaAplikasi)