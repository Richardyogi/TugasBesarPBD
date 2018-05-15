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
		set @query= concat(@query,'tanggal=''',convert(nvarchar,@date),''',')
	end
	if(@time is not null)
	begin
		set @query=concat( @query,'start_time<=''',convert(nvarchar,@time),''' and end_time>=''',convert(nvarchar,@time),''',')
	end
	select @query
	set @query=SUBSTRING(@query, 1, len(@query)-1)
	EXEC sp_executesql @query

	--exec daftarPenggunaPerjam '2018-05-07',null

	exec daftarPenggunaPerjam null,'09:00'