USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
alter procedure [dbo].[daftarPenggunaPerjam]
	@date date,
	@time time
as
	declare @query nvarchar(500)
	set @query ='select * from agr_jumlah_pengguna_per_jam where '

	if(@date is not null)
	begin
		set @query= concat(@query,'tanggal=''',convert(nvarchar,@date),''' and ')
	end
	if(@time is not null)
	begin
		set @query=concat( @query,'start_time<=''',convert(nvarchar,@time),''' and end_time>=''',convert(nvarchar,@time),''' and ')
	end
	
	set @query=SUBSTRING(@query, 1, len(@query)-3)
	EXEC sp_executesql @query

	--exec daftarPenggunaPerjam '2018-05-07',null

	--exec daftarPenggunaPerjam null,'09:00'

	--exec daftarPenggunaPerjam '2018-05-07','08:00'