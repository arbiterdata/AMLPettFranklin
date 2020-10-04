<?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;
session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

$form = new Form('test-form', 'horizontal', 'novalidate');
$form->addInput('text', 'user-name', '', 'Name:', 'required, placeholder=Name');
$form->addRadio('is-all-ok', 'Yes', 1);
$form->addRadio('is-all-ok', 'No', 0);
$form->printRadioGroup('is-all-ok', 'Is all ok?', false, 'required');
$form->addPlugin('icheck', 'input', 'default', array('%theme%' => 'square', '%color%' => 'red'));
$form->addBtn('submit', 'submit-btn', 1, 'Send', 'class=btn btn-success');

?>

<!DOCTYPE html>
<html>
<head>
<title>Test Form</title>
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<?php $form->printIncludes('css'); ?>

</head>
<body>
<h1>My first form</h1>
<!-- Latest compiled and minified jQuery -->
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<!-- Latest compiled and minified Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<?php
if (isset($sent_message)) {
echo $sent_message;
}
$form->render();
?>

<?php
    $form->printIncludes('js');
    $form->printJsCode();
?>

</body>
</html>