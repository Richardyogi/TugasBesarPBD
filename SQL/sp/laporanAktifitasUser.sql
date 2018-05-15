USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
alter procedure [dbo].[laporanAktifitasUser]
	@parUser int,
	@parKomputer int,
	@parAplikasi int,
	@parDate date,
	@parTime time
as

DECLARE 
@query nvarchar(500)

set @query = 'select * from agr_aktivitas_user where '
if(@parUser is not null)
begin 
	set @query=concat(@query,'FK_User=', convert(nvarchar,@parUser),' and ')
end
if(@parAplikasi is not null)
begin 
	set @query=concat(@query,'FK_Aplikasi=', convert(nvarchar,@parAplikasi),' and ')
end
if(@parKomputer is not null)
begin 
	set @query=concat(@query,'FK_Komputer=', convert(nvarchar,@parKomputer),' and ' )
end
if(@parDate is not null)
begin 
	set @query=concat(@query,'tanggal=''', convert(nvarchar,@parDate),''' and ')
end
if(@parTime is not null)
begin 
	set @query=concat(@query,'waktu_mulai<=''', convert(nvarchar,@parTime),'''and waktu_akhir>=''', convert(nvarchar,@parTime),''' and ')
end

set @query=SUBSTRING(@query,1,len(@query)-3)

EXEC sp_executesql @query

--exec laporanAktifitasUser null,null,null,null,'09:00'
--exec laporanAktifitasUser 9,null,null,null,null

--exec selectAll 'dbo.tabelJmlPengguna()'


--select * from dbo.tabelJmlPengguna()


