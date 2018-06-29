<?php /* Smarty version Smarty-3.1.19, created on 2018-06-14 23:09:06
         compiled from "/var/www/html/crm/portal/layouts/default/templates/Portal/partials/DetailRelatedContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20130795745b22d97216cf65-85136386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5bdf630b01ecc0cedf3418d2f9f7ddf88e7bcc9' => 
    array (
      0 => '/var/www/html/crm/portal/layouts/default/templates/Portal/partials/DetailRelatedContent.tpl',
      1 => 1520247616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20130795745b22d97216cf65-85136386',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b22d97217cf16_88352775',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b22d97217cf16_88352775')) {function content_5b22d97217cf16_88352775($_smarty_tpl) {?>

<div ng-if="splitContentView" class="col-lg-7 col-md-7 col-sm-12 col-xs-12 rightEditContent">
    
        <ul tabset>
            <tab ng-repeat="relatedModule in relatedModules" select="selectedTab(relatedModule.name)" ng-if="relatedModule.value" heading={{relatedModule.name}} active="tab.active" disabled="tab.disabled">
                <tab-heading><strong translate="{{relatedModule.uiLabel}}">{{relatedModule.uiLabel}}</strong><tab-heading>
						</ul>
                    
                    <br>
                    <div class="tab-content">
                        <div ng-show="selection==='ModComments'">
                            <?php echo $_smarty_tpl->getSubTemplate ("Portal/partials/CommentContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='History'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Portal/partials/UpdatesContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='ProjectTask'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Project/partials/ProjectTaskContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='ProjectMilestone'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Project/partials/ProjectMilestoneContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                        <div ng-hide="selection!=='Documents'"> 
                            <?php echo $_smarty_tpl->getSubTemplate ("Documents/partials/RelatedDocumentsContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                        </div>
                    </div>
                    </div>
<?php }} ?>
