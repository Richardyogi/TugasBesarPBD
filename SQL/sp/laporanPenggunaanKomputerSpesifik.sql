USE [master]
GO
/****** Object:  StoredProcedure [dbo].[laporanPenggunaanKomputerSpesifik]    Script Date: 10/05/2018 18:37:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER procedure [dbo].[laporanPenggunaanKomputerSpesifik]
	@idKomputer int
as

	select * from agr_penggunaan_komputer where FK_Komputer = @idKomputer

	exec laporanPenggunaanKomputerSpesifik 5