USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[daftarPenggunaPerjam]
	@date varchar(10),
	@time time
as
	declare @query varchar(200)
	set @query ='select * from agr_jumlah_pengguna_per_jam where '
	if(@date is not null)
	begin
		declare @n date 
		set @n= CONVERT(datetime, @date, 120) 
		set @query= @query+concat('tanggal= ',convert(nvarchar,@n),',')
	end
	if(@time is not null)
	begin
		set @query= @query+concat('start_time<=''',convert(nvarchar,@time),''' and end_time>=',convert(nvarchar,@time),',')
	end
	
	set @query=SUBSTRING(@query, 1, len(@query)-1)

	select @query
	EXEC sp_executesql @query

	--exec daftarPenggunaPerjamTGL '2018-05-07',null
