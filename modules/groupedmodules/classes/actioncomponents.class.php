<?php

	/**
	 * action components for the groupedmodules module
	 */
	class groupedmodulesActionComponents extends TBGActionComponent
	{

        public function componentSettings(){
            $this->teams = TBGTeam::getAll();
        }
        
	}

