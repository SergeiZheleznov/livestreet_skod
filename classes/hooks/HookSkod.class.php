<?php
/*-------------------------------------------------------
*
*   Plugin "Skod. Карма пользователя в профиле"
*   Author: Zheleznov Sergey (skif)
*   Site: livestreet.ru/profile/skif/
*   Contact e-mail: sksdes@gmail.com
*
---------------------------------------------------------
*/
class PluginSkod_HookSkod extends Hook {

    protected $oUserCurrent;

    public function RegisterHook() {

        $this->oUserCurrent=$this->User_GetUserCurrent();
        if (!$this->oUserCurrent and (!Config::Get('plugin.skod.show_guest') or Config::Get('plugin.skod.admin_only')) )
            return;
        $this->AddHook('template_profile_top_begin', 'insert_skod_karma');
    }

    public function insert_skod_karma($aData)
    {
        $this->oUserCurrent=$this->User_GetUserCurrent();
        if ($this->oUserCurrent and !$this->User_canViewSkod($this->oUserCurrent,$aData['oUserProfile'])) return false;
        $iUserId = $aData['oUserProfile']->getId();       
        $this->Viewer_Assign('sSkodKarma',$this->User_getSkodKarma($aData['oUserProfile']));
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'hook_insert_skod_karma.tpl');
    }
}
?>
