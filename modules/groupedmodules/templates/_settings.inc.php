<div id="tab_teams_pane" style="padding-top: 0; width: 750px;">
    <div class="rounded_box yellow borderless" style="margin-top: 5px; padding: 7px;display:block;" id="add_team_div">
        <form id="create_team_form" action="<?php echo make_url('configure_users_add_team'); ?>" method="post" accept-charset="<?php echo TBGSettings::getCharset(); ?>" onsubmit="TBG.Config.Team.add('<?php echo make_url('configure_users_add_team'); ?>');return false;">
            <label for="team_name"><?php echo __('Create a new team'); ?></label>
            <input type="text" id="team_name" name="team_name">
            <input type="submit" value="<?php echo __('Create'); ?>">
        </form>
    </div>
    <table cellpadding=0 cellspacing=0 style="display: none; margin-left: 5px; width: 300px;" id="create_team_indicator">
        <tr>
            <td style="width: 20px; padding: 2px;"><?php echo image_tag('spinning_20.gif'); ?></td>
            <td style="padding: 0px; text-align: left;"><?php echo __('Adding team, please wait'); ?>...</td>
        </tr>
    </table>
    <ol id="teamconfig_list" style="margin:0;padding: 0;">
        <?php foreach ($teams as $team): ?>
            <?php include_template('groupedmodules/teambox', array('team' => $team)); ?>
        <?php endforeach; ?>
    </ol>
</div>

<script type="text/javascript">
    TIC.urls.saveTeamGrouping = '<?php //echo make_url('saveGroups'); ?>';
    TIC.objects.push(new TIC.classes.TeamGrouping(jQuery('#teamconfig_list')));
</script>

<style>.placeholder {
            border: 1px dashed #4183C4;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }</style>