<?php

    use b2db\Core,
        b2db\Criteria,
        b2db\Criterion;

    /**
     * @Table(name="team_group")
     */
    class UserTeamGroupTable extends TBGB2DBTable{
        
        const B2DB_TABLE_VERSION = 1;
        const B2DBNAME = 'team_group';
        const ID = 'team_group.id';
        const NAME = 'team_group.name';
        const DESCRIPTION = 'team_group.description';

        
        protected function _initialize()
        {
            parent::_setup(self::B2DBNAME, self::ID);
            parent::_addVarchar(self::NAME,255,'',true);
            parent::_addBlob(self::DESCRIPTION);
        }
        
    }

?>
