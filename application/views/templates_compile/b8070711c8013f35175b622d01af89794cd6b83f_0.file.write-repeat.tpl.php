<?php
/* Smarty version 3.1.39, created on 2021-05-17 23:00:11
  from '/var/www/html/codehayho.com/application/views/templates/pages/words/write-repeat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60a2930b3b40f8_45986099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8070711c8013f35175b622d01af89794cd6b83f' => 
    array (
      0 => '/var/www/html/codehayho.com/application/views/templates/pages/words/write-repeat.tpl',
      1 => 1621267208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a2930b3b40f8_45986099 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_182531476560a2930b38b793_11482287', 'title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_64642750260a2930b38edd3_92650282', 'head');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_46972119460a2930b3a1257_09496076', 'body');
?>
}
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block 'title'} */
class Block_182531476560a2930b38b793_11482287 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_182531476560a2930b38b793_11482287',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Write repeat<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_64642750260a2930b38edd3_92650282 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_64642750260a2930b38edd3_92650282',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
public/css/repeat.css" />
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
public/js/repeat-word.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_46972119460a2930b3a1257_09496076 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_46972119460a2930b3a1257_09496076',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="words-repeat" style="width: 100%;">
		<div class="toast" role="alert" data-delay="1000" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 10px; right: 10px; min-width: 300px;z-index: 10000;">
			<div class="toast-header">
				Thông báo
			</div>
			<div class="toast-body">
				Thêm từ vựng thành công
			</div>
		</div>
		<div class="row">
			<div class="col-md-8" style>
				<div class="words-main">
					<form action="" method="post" class="form-repeat">
						<input type="text" name="" id="ip-repeat" autocomplete="off" placeholder="Input repeat" class="input-repeat"><br>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
					<section>
						<h1 id="title-words-main">Chicken soup for the soul</h1>
						<div class="words-list">
							<div class="word-item" id="word-" data-name="">
								<span>Temporary</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Night</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Lack</span>
							</div>
							<div class="word-item" id="word-" data-name="">
								<span>Kuck</span>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
<?php
}
}
/* {/block 'body'} */
}
