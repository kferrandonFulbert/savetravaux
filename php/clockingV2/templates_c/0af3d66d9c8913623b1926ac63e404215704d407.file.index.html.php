<?php /* Smarty version Smarty-3.1.7, created on 2011-12-23 11:30:04
         compiled from ".\templates\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:96244ef373cc324735-94035202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af3d66d9c8913623b1926ac63e404215704d407' => 
    array (
      0 => '.\\templates\\default\\index.html',
      1 => 1324638797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96244ef373cc324735-94035202',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4ef373cc376bc',
  'variables' => 
  array (
    'Titre' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ef373cc376bc')) {function content_4ef373cc376bc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('default/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <body>
     <script type="text/javascript">
     $(document).ready(function() {
         
     });
    
</script>

     <div class="prepend-5 span-23 conteneur">
     <div class="contenue"><h2><?php echo $_smarty_tpl->tpl_vars['Titre']->value;?>
</h2>
     </div>
         
     </div>
</body>
</html><?php }} ?>