USE [master]
GO
/****** Object:  StoredProcedure [dbo].[insertUser]    Script Date: 10/05/2018 18:03:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER procedure [dbo].[insertUser]
	@namaUser varchar(100)
as
	INSERT INTO Pengguna VALUES (@namaUser)