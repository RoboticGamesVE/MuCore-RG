-- ------------------------------------------------------------------------------
-- /****** Register MD5  *  Dao Van Trong - Trong.CF ******/

USE [master]
GO

SET QUOTED_IDENTIFIER OFF 
GO

SET ANSI_NULLS OFF 
GO

-- /****** DROP Object:  ExtendedStoredProcedure [dbo].[XP_MD5_EncodeKeyVal]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[XP_MD5_EncodeKeyVal]') AND OBJECTPROPERTY(id, N'IsExtendedProc') = 1)
 EXEC sp_dropextendedproc N'[dbo].[XP_MD5_EncodeKeyVal]'
GO

-- /****** DROP Object:  ExtendedStoredProcedure [dbo].[XP_MD5_EncodeString]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[XP_MD5_EncodeString]') AND OBJECTPROPERTY(id, N'IsExtendedProc') = 1)
 EXEC sp_dropextendedproc N'[dbo].[XP_MD5_EncodeString]'
GO

-- /****** DROP Object:  ExtendedStoredProcedure [dbo].[XP_MD5_CheckValue]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[XP_MD5_CheckValue]') AND OBJECTPROPERTY(id, N'IsExtendedProc') = 1)
 EXEC sp_dropextendedproc N'[dbo].[XP_MD5_CheckValue]'
GO

-- /****** ADD Object:  ExtendedStoredProcedure [dbo].[XP_MD5_EncodeString]  *  Dao Van Trong - Trong.CF ******/
EXEC sp_addextendedproc N'XP_MD5_EncodeString', N'WZ_MD5_MOD.dll'
GO

-- /****** ADD Object:  ExtendedStoredProcedure [dbo].[XP_MD5_CheckValue]  *  Dao Van Trong - Trong.CF ******/
EXEC sp_addextendedproc N'XP_MD5_CheckValue',   N'WZ_MD5_MOD.dll'
GO

-- /****** ADD Object:  ExtendedStoredProcedure [dbo].[XP_MD5_EncodeKeyVal]  *  Dao Van Trong - Trong.CF ******/
EXEC sp_addextendedproc N'XP_MD5_EncodeKeyVal', N'WZ_MD5_MOD.dll'
GO

-- USE [Me_MuOnline]
USE [MuOnline]
GO

-- /****** DROP Object:  UserDefinedFunction [dbo].[fn_md5]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[fn_md5]') AND type IN (N'FN', N'IF', N'TF', N'FS', N'FT'))
 DROP FUNCTION [dbo].[fn_md5]
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[fn_md5] *  Dao Van Trong - Trong.CF ******/
CREATE FUNCTION [dbo].[fn_md5] (@data varchar(10), @data2 varchar(10))
RETURNS binary(16)
AS
BEGIN
 DECLARE @hash binary(16)
 EXEC master.dbo.XP_MD5_EncodeKeyVal @data, @data2, @hash OUT
 RETURN @hash
END
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[UFN_MD5_CHECKVALUE]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT  *  FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[UFN_MD5_CHECKVALUE]') AND xtype IN (N'FN', N'IF', N'TF')) 
 DROP FUNCTION [dbo].[UFN_MD5_CHECKVALUE] 
GO 

CREATE FUNCTION UFN_MD5_CHECKVALUE (@btInStr VARCHAR(10), @btInStrIndex VARCHAR(10), @btInVal BINARY(16)) 
RETURNS TINYINT 
AS 
BEGIN 
 DECLARE @iOutResult TINYINT 
 EXEC master..XP_MD5_CheckValue @btInStr, @btInVal, @btInStrIndex, @iOutResult OUT 
 RETURN @iOutResult 
END 
GO 

-- /****** CREATE Object:  UserDefinedFunction [dbo].[UFN_MD5_ENCODEVALUE]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT  *  FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[UFN_MD5_ENCODEVALUE]') AND xtype IN (N'FN', N'IF', N'TF')) 
 DROP FUNCTION [dbo].[UFN_MD5_ENCODEVALUE] 
GO 

CREATE FUNCTION UFN_MD5_ENCODEVALUE (@btInStr VARCHAR(10), @btInStrIndex VARCHAR(10)) 
RETURNS BINARY(16) 
AS 
BEGIN 
   DECLARE @btOutVal BINARY(16) 
   EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT 
   RETURN @btOutVal 
END 
GO 

-- /****** CREATE Object:  UserDefinedFunction [dbo].[SP_MD5_ENCODE_VALUE]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[SP_MD5_ENCODE_VALUE]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
 DROP PROCEDURE [dbo].[SP_MD5_ENCODE_VALUE]
GO

CREATE PROCEDURE SP_MD5_ENCODE_VALUE 
@btInStr VARCHAR(10),
@btInStrIndex VARCHAR(10)
AS  
BEGIN 
 DECLARE @btOutVal BINARY(16)
 EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT
 UPDATE MEMB_INFO SET memb__pwd = @btOutVal WHERE memb___id = @btInStrIndex
 RETURN @btOutVal
END
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[Encript]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Encript]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
 DROP PROCEDURE [dbo].[Encript]
GO

CREATE PROCEDURE Encript
@btInStr VARCHAR(10),
@btInStrIndex VARCHAR(10)
AS
BEGIN
 DECLARE @btOutVal BINARY(16)
 EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT
 UPDATE MEMB_INFO SET memb__pwd = @btOutVal WHERE memb___id = @btInStrIndex
END
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[Encripta]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Encripta]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
 DROP PROCEDURE [dbo].[Encripta]
GO

CREATE PROCEDURE Encripta
@btInStr VARCHAR(10),
@btInStrIndex VARCHAR(10)
AS
BEGIN
 DECLARE @btOutVal BINARY(16)
 EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT
 UPDATE MEMB_INFO SET memb__pwd = @btOutVal WHERE memb___id = @btInStrIndex
END
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[DencriptPW]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[DencriptPW]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
 DROP PROCEDURE [dbo].[DencriptPW]
GO

CREATE PROCEDURE DencriptPW
@btInStr VARCHAR(10),
@btInStrIndex VARCHAR(10)
AS
BEGIN
 DECLARE @btOutVal BINARY(16)
 EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT
 SELECT memb__pwd  FROM MEMB_INFO WHERE memb__pwd  = @btOutVal AND memb___id = @btInStrIndex
END
GO

-- /****** CREATE Object:  UserDefinedFunction [dbo].[Cassandra_MD5]  *  Dao Van Trong - Trong.CF ******/
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = OBJECT_ID(N'[dbo].[Cassandra_MD5]') AND OBJECTPROPERTY(id, N'IsProcedure') = 1)
 DROP PROCEDURE [dbo].[Cassandra_MD5]
GO

CREATE PROCEDURE Cassandra_MD5
@btInStr VARCHAR(10),
@btInStrIndex VARCHAR(10)
AS
BEGIN
 DECLARE @btOutVal BINARY(16)
 EXEC master..XP_MD5_EncodeKeyVal @btInStr, @btInStrIndex, @btOutVal OUT
 SELECT @btOutVal
END
GO

-- ------------------------------------------------------------------------------
-- /****** Use MD5  *  Dao Van Trong - Trong.CF ******/
ALTER TABLE [dbo].[MEMB_INFO]
ADD memb__pwd2 varbinary(16)
GO

-- UPDATE [dbo].[MEMB_INFO] SET memb__pwd2 = CAST(memb__pwd as VARBINARY)
UPDATE [dbo].[MEMB_INFO] SET memb__pwd2 = CONVERT(varbinary(16),memb__pwd)
GO


ALTER TABLE [dbo].[MEMB_INFO]
DROP COLUMN memb__pwd
GO

EXEC sp_RENAME 'MEMB_INFO.[memb__pwd2]' , 'memb__pwd', 'COLUMN'
GO
-- ---------------------------------------------------------------------------------------
/* -- >=SQL2005 No DLL - Remove xp_md5 extended procedure first
USE [master]
GO

CREATE FUNCTION [dbo].[fn_md5] (@data varchar(255)) 
RETURNS CHAR(32)  AS 
BEGIN
 RETURN SUBSTRING(master.dbo.fn_varbintohexstr(HashBytes('MD5', @data)), 3, 32)
END
GO

GRANT EXECUTE ON [dbo].[fn_md5] TO [public]
GO
*/
-- ---------------------------------------------------------------------------------------

-- ------------------------------------------------------------------------------
-- /****** Not Use MD5  *  Dao Van Trong - Trong.CF ******/
/*
ALTER TABLE [dbo].[MEMB_INFO]
ALTER COLUMN memb__pwd varchar(16) NOT NULL
GO
*/
-- ------------------------------------------------------------------------------

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_NULLS ON
GO

--  Get Source SQL
-- 
-- USE master;
-- GO
-- EXEC sp_helptext 'fn_varbintohexstr';
-- GO
-- 