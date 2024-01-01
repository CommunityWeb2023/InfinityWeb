<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::connection('account')->unprepared("DROP PROCEDURE IF EXISTS [dbo].[usp_CreateNewAccountInfinityWeb]");
        $sql = "
            CREATE PROCEDURE [dbo].[usp_CreateNewAccountInfinityWeb]
            @account varchar(32),
            @pw varchar(32),
            @cash int = 0,
            @email varchar(100) = '',
            @webid int = 0
            AS
            BEGIN
                SET NOCOUNT ON;
                SET XACT_ABORT ON;

                IF NOT EXISTS (SELECT * FROM ACCOUNT_TBL WHERE account = @account)
                BEGIN
                    BEGIN TRAN;
                    INSERT ACCOUNT_TBL(account,password,isuse,member,id_no1,id_no2,realname, cash, webid)
                    VALUES(@account, @pw, 'T', 'A', '', '', '', @cash, @webid)
                    INSERT ACCOUNT_TBL_DETAIL(account,gamecode,tester,m_chLoginAuthority,regdate,BlockTime,EndTime,WebTime,isuse,secession, email)
                    VALUES(@account,'A000','2','F',GETDATE(),CONVERT(CHAR(8),GETDATE()-1,112),CONVERT(CHAR(8),DATEADD(year,10,GETDATE()),112),CONVERT(CHAR(8),GETDATE()-1,112),'T',NULL, @email)
                    insert AccountPlay (Account, PlayDate)
                    select @account, convert(int, convert(char(8), getdate(), 112))
                
                    if @@error <> 0
                    begin
                        rollback tran
                        select -1
                    end
                    else
                    begin
                        commit tran
                        select 1
                    end
                    COMMIT TRAN;
                END
                ELSE
                BEGIN
                    SELECT 0;
                END
            END;
        ";

        DB::connection('account')->unprepared($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::connection('account')->unprepared("DROP PROCEDURE IF EXISTS [dbo].[usp_CreateNewAccountInfinityWeb]");
    }
};
