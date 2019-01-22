-- ------------------------------------------------------------------------------
-- /****** Register XP_MD5  *  Dao Van Trong - Trong.CF ******/

USE [master]
GO

SET QUOTED_IDENTIFIER OFF 
GO

SET ANSI_NULLS OFF 
GO

-- /****** DROP Object:  ExtendedStoredProcedure [dbo].[xp_md5]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[xp_md5]') AND OBJECTPROPERTY(id, N'IsExtendedProc') = 1)
 EXEC sp_dropextendedproc N'[dbo].[xp_md5]'
GO

-- /****** DROP Object:  ExtendedStoredProcedure [dbo].[xp_md5W]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[xp_md5W]') AND OBJECTPROPERTY(id, N'IsExtendedProc') = 1)
 EXEC sp_dropextendedproc N'[dbo].[xp_md5W]'
GO


EXEC sp_addextendedproc N'xp_md5', N'xp_md5.dll'
GO
/* 
EXEC sp_addextendedproc N'xp_md5W', N'xp_md5.dll'
GO
*/
-- /****** CREATE Object:  UserDefinedFunction [dbo].[fn_md5]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[fn_md5]') AND type IN (N'FN', N'IF', N'TF', N'FS', N'FT'))
 DROP FUNCTION [dbo].[fn_md5]
GO
CREATE FUNCTION [dbo].[fn_md5] (@data TEXT) 
RETURNS CHAR(32) AS
BEGIN
  DECLARE @hash CHAR(32)
  EXEC master.dbo.xp_md5 @data, -1, @hash OUTPUT
  RETURN @hash
END
/*
CREATE FUNCTION [dbo].[fn_md5x] (@data IMAGE, @len INT = -1) 
RETURNS CHAR(32) AS
BEGIN
  DECLARE @hash CHAR(32)
  EXEC master.dbo.xp_md5 @data, @len, @hash OUTPUT
  RETURN @hash
END

CREATE FUNCTION [dbo].[ww_md5] (@data TEXT) 
RETURNS CHAR(32) AS
BEGIN
  DECLARE @hash CHAR(32)
  EXEC master.dbo.xp_md5 @data, -1, @hash OUTPUT
  RETURN @hash
END
GO

CREATE FUNCTION [dbo].[ww_md5W] (@data NTEXT) 
RETURNS NCHAR(32) AS
BEGIN
  DECLARE @hash NCHAR(32)
  EXEC master.dbo.xp_md5W @data, -1, @hash OUTPUT
  RETURN @hash
END
GO
*/

SET QUOTED_IDENTIFIER ON 
GO

SET ANSI_NULLS ON 
GO

