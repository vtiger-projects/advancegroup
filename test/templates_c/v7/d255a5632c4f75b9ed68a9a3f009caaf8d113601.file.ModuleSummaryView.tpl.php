<?php /* Smarty version Smarty-3.1.7, created on 2018-06-08 19:55:57
         compiled from "/var/www/html/crm/includes/runtime/../../layouts/v7/modules/Accounts/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9578227205b1adf4db0b927-04083403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd255a5632c4f75b9ed68a9a3f009caaf8d113601' => 
    array (
      0 => '/var/www/html/crm/includes/runtime/../../layouts/v7/modules/Accounts/ModuleSummaryView.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9578227205b1adf4db0b927-04083403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b1adf4db1450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1adf4db1450')) {function content_5b1adf4db1450($_smarty_tpl) {?>

<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>