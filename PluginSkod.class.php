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
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginSkod extends Plugin {
    public $aInherits = array(
        'module' => array(
            'ModuleUser'
        ),
        'mapper' => array(
            'ModuleUser_MapperUser'
        ),
    );
    public function Activate() {
        return true;
    }
    public function Deactivate(){
        return true;
    }
    public function Init() {
        $this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__)."/css/style.css");
    }
}
?>
