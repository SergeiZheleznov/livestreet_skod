<?php

class PluginSkod_ModuleUser_EntityUser extends PluginSkod_Inherit_ModuleUser_EntityUser {

	/**
	 * Возвращает карму
	 *
	 * @return string
	 */
	public function getSkodKarma() {
		$karma = $this->oMapper->GetSkodKarmaByUserId($this->getId());
		return number_format(round($karma,2), 2, '.', '');
	}

}
?>