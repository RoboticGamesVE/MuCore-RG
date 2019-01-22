@ECHO OFF
echo Updating the SQL Server Extended Stored Procedure cache directory ...

attrib "C:\Program Files\Microsoft SQL Server\MSSQL\Binn\xp_md5.dll" -r
Copy xp_md5.dll "C:\Program Files\Microsoft SQL Server\MSSQL\Binn"
attrib "C:\Program Files\Microsoft SQL Server\MSSQL\Binn\xp_md5.dll" +r

ECHO Updating the xp_md5 libraries ... 
ECHO DONE!
