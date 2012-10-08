<?php

    use b2db\Core,
        b2db\Criteria,
        b2db\Criterion;

    /**
     * @Table(name="team_groups")
     */
    class UserTeamGroupsTable extends TBGB2DBTable{
        
        const B2DB_TABLE_VERSION = 1;
        const B2DBNAME = 'team_groups';
        const ID = 'team_groups.id';
        const TEAM_ID = 'team_groups.team_id';
        const GROUP_ID = 'team_groups.group_id';

        
        protected function _initialize()
        {
            parent::_setup(self::B2DBNAME, self::ID);
            parent::_addForeignKeyColumn(self::TEAM_ID, TBGTeamsTable::getTable(), TBGTeamsTable::ID);
            parent::_addForeignKeyColumn(self::GROUP_ID, UserTeamGroupTable::getTable(), UserTeamGroupTable::ID);
        }
        
    }

?>
