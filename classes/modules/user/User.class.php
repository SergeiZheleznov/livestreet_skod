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
class PluginSkod_ModuleUser extends PluginSkod_Inherit_ModuleUser {

	public function getSkodKarma($oUser) {
		$karma = $this->oMapper->GetSkodKarmaByUserId($oUser->getId());

		$karma = number_format(round( ($karma['skod_count']*$karma['skod_karma'])/1000 ,2), 2, '.', ''); // Это формула по которой высчитывается карма.
		return $karma;
	}

	public function canViewSkod($oUserTarget,$oUserCurrent) {
		if ($oUserCurrent->isAdministrator()) return true;
		if ( Config::Get('plugin.skod.admin_only') or
			($oUserCurrent->getRating() < Config::Get('plugin.skod.min_rating')) or
			($oUserTarget->getId()==$oUserCurrent->getId() and !Config::Get('plugin.skod.show_self'))
			) return false;

		return true;
	}

}
?>