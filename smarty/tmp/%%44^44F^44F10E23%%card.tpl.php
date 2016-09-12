<?php /* Smarty version 2.6.30, created on 2016-09-12 07:13:56
         compiled from card.tpl */ ?>

<?php $_from = $this->_tpl_vars['deck']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_faces'] => $this->_tpl_vars['_cards']):
?>
    <?php echo $this->_tpl_vars['_faces']; ?>

    <?php echo $this->_tpl_vars['_cards']; ?>

<?php endforeach; endif; unset($_from); ?>