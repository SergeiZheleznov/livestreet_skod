<?php

class PluginSkod_ModuleUser_MapperUser extends PluginSkod_Inherit_ModuleUser_MapperUser
{
    public function GetSkodKarmaByUserId($sUserId)
    {
        $sql = "
                    SELECT
                        SUM(v.vote_direction) as skod_karma,
                        count(*) as skod_count                                          
                    FROM                        
                        ".Config::Get('db.table.vote')." as v
                    WHERE                           
                        v.user_voter_id = ?d                           
        ";

        if ($aRow=$this->oDb->selectRow($sql,$sUserId)) {
            return array(
                'skod_count'=>$aRow['skod_count'],
                'skod_karma'=>$aRow['skod_karma']
            );
        }
        return false;
    }

}