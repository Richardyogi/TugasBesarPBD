USE [master]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[laporanAktifitasUser]
	@parUser int,
	@parKomputer int,
	@parAplikasi int,
	@parDate date,
	@parTime time
as

DECLARE 
@query nvarchar(500)

set @query = 'select * from agr_aktivitas_user where'
if(@parUser is not null)
begin 
	set @query=concat(@query,'FK_User', )
end

	--exec laporanAktifitasUserUS '12'


