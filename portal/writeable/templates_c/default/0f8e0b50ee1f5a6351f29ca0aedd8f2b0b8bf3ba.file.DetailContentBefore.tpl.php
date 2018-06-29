<?php /* Smarty version Smarty-3.1.19, created on 2018-06-14 23:32:03
         compiled from "/var/www/html/crm/portal/layouts/default/templates/Portal/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5754812265b22ded301d903-03719823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f8e0b50ee1f5a6351f29ca0aedd8f2b0b8bf3ba' => 
    array (
      0 => '/var/www/html/crm/portal/layouts/default/templates/Portal/partials/DetailContentBefore.tpl',
      1 => 1520247616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5754812265b22ded301d903-03719823',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b22ded3029b94_71275134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b22ded3029b94_71275134')) {function content_5b22ded3029b94_71275134($_smarty_tpl) {?>


    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7 detail-header detail-header-row">
      <h3 class="fsmall">
        <detail-navigator>
          <span>
            <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
            </a>
            </span>
        </detail-navigator>{{record[header]}}
        <button ng-if="isEditable" class="btn btn-primary attach-files-ticket" ng-click="editRecord(module,id)">{{'Edit'|translate}} {{ptitle}}</button>
      </h3>
    </div>
</div>

<hr class="hrHeader">
<div class="container-fluid">

<?php }} ?>
