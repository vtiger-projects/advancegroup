<?php /* Smarty version Smarty-3.1.7, created on 2018-06-08 20:17:58
         compiled from "/var/www/html/crm/includes/runtime/../../layouts/v7/modules/Contacts/DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4852905615b1ae47602ec90-16742824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0a297301512f26db57c6d8b3f0d877838be6789' => 
    array (
      0 => '/var/www/html/crm/includes/runtime/../../layouts/v7/modules/Contacts/DetailViewSummaryContents.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4852905615b1ae47602ec90-16742824',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b1ae476035f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1ae476035f1')) {function content_5b1ae476035f1($_smarty_tpl) {?>

<form id="detailView" class="clearfix" method="POST" style="position: relative"><div class="col-lg-12 resizable-summary-view"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></form><?php }} ?>