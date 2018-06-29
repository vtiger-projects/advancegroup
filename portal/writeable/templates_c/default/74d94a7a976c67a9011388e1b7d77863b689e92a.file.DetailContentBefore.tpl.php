<?php /* Smarty version Smarty-3.1.19, created on 2018-06-14 23:09:06
         compiled from "/var/www/html/crm/portal/layouts/default/templates/Quotes/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18395278315b22d972158f99-31548891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74d94a7a976c67a9011388e1b7d77863b689e92a' => 
    array (
      0 => '/var/www/html/crm/portal/layouts/default/templates/Quotes/partials/DetailContentBefore.tpl',
      1 => 1520247616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18395278315b22d972158f99-31548891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b22d9721623e3_96844908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b22d9721623e3_96844908')) {function content_5b22d9721623e3_96844908($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}</a>
      </span>
    </detail-navigator>
      {{record[header]}}
    <button ng-if="quoteAccepted" translate="Accept Quote" class="btn btn-success close-ticket" ng-click="acceptQuote();"></button>
  </h3>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
  <script type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"></script>
  <?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
