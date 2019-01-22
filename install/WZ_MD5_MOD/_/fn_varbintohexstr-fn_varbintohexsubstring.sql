-- ------------------------------------------------------------------------------
-- /****** Get Source SQL  *  Dao Van Trong - Trong.CF ******/

-- 
-- USE master;
-- GO
-- EXEC sp_helptext 'fn_varbintohexstr';
-- GO
-- 
create function sys.fn_varbintohexstr (@pbinin varbinary(max))  
returns nvarchar(max)  
as  
begin  
    return sys.fn_varbintohexsubstring(1,@pbinin,1,0)  
end  

-- 
-- USE master;
-- GO
-- EXEC sp_helptext 'fn_varbintohexsubstring';
-- GO
-- 
create function sys.fn_varbintohexsubstring (  
 @fsetprefix bit = 1  -- append '0x' to the output  
 ,@pbinin varbinary(max) -- input binary stream  
 ,@startoffset int = 1  -- starting offset   
 ,@cbytesin int = 0   -- length of input to consider, 0 means total length  
)  
returns nvarchar(max)  
as  
begin  
 declare @pstrout nvarchar(max)  
  ,@i int  
  ,@firstnibble int  
  ,@secondnibble int  
  ,@tempint int  
  ,@hexstring char(16)  
         
 --  
 -- initialize and validate  
 --  
 if (@pbinin IS NOT NULL)  
 begin   
  select @i = 0  
    ,@cbytesin = case when (@cbytesin > 0 and @cbytesin <= DATALENGTH(@pbinin) ) then @cbytesin else DATALENGTH(@pbinin) end  
    ,@pstrout =  case when (@fsetprefix = 1) then N'0x' else N'' end  
    ,@hexstring = '0123456789abcdef'  
  
              --the output limit for nvarchar(max) is 2147483648 (2^31) bytes, that is 1073741824 (2^30) unicode characters  
  if ( ((@cbytesin * 2) + 2 > 1073741824) or ((@cbytesin * 2) + 2 < 1) or ( @cbytesin is null ))  
   return NULL  
  
  if ( ( @startoffset > DATALENGTH(@pbinin) ) or ( @startoffset < 1 ) or ( @startoffset is null ))  
   return NULL  
  
  --  
  -- adjust the length to process based on start offset and  
  -- total length  
  --  
  if ((DATALENGTH(@pbinin) - @startoffset + 1) < @cbytesin)  
   select @cbytesin = DATALENGTH(@pbinin) - @startoffset + 1  
    
  --  
  -- do for each byte  
  --  
  while (@i < @cbytesin)  
  begin  
   --  
   -- Each byte has two nibbles  
   -- which we convert to character  
   --  
   select @tempint = cast(substring(@pbinin, @i + @startoffset, 1) as int)  
   select @firstnibble = @tempint / 16  
   select @secondnibble = @tempint % 16  
  
   --  
   -- we need to do an explicit cast with substring   
   -- for proper string conversion.   
   --  
   select @pstrout = @pstrout +  
    cast(substring(@hexstring, (@firstnibble+1), 1) as nvarchar) +  
    cast(substring(@hexstring, (@secondnibble+1), 1) as nvarchar)  
  
   select @i = @i + 1  
  end  
 end  
   
 -- All done  
 return @pstrout  
end  

