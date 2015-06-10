<?php
$password = md5($this->fields['email']['value'].'_ecr_forum_key');
$this->fields['password']['value'] = $password;
?>