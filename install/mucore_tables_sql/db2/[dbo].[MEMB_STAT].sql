USE [MuOnline]
GO

/****** Object:  Table [dbo].[MEMB_STAT]    Script Date: 09/07/2015 05:22:22 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

IF  NOT EXISTS (SELECT * FROM sys.tables
WHERE name = N'MEMB_STAT' AND type = 'U')

BEGIN
CREATE TABLE [dbo].[MEMB_STAT](
	[memb___id] [varchar](10) NOT NULL,
	[ConnectStat] [tinyint] NULL,
	[ServerName] [varchar](50) NULL,
	[IP] [varchar](15) NULL,
	[ConnectTM] [smalldatetime] NULL,
	[DisConnectTM] [smalldatetime] NULL,
	[OnlineMinutes] [int] NULL
) ON [PRIMARY]

END
GO

IF COL_LENGTH('MEMB_STAT', 'OnlineMinutes') IS NULL
BEGIN

        ALTER TABLE MEMB_STAT
        ADD OnlineMinutes INT not null default 0
END
GO

SET ANSI_PADDING OFF
GO

