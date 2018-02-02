<?php
use Cake\ORM\TableRegistry;

$reports = TableRegistry::get('questions_users');

// Start a new query.
$query = $reports->find();
?>