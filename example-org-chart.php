<?php
/**
 * Example: Creating Tree Structure of an Organization in PHP
 * 
 * Author: Asim Ishaq
 * License: GPL v2 or later
 * 
 */
require_once 'TreeNode.php';

// First we create the top-most node of tree Board of Director
$root = new TreeNode ( "Board of Director" );

// Add two children to Board of Diretcor
$root->addChildNode ( new TreeNode ( "Technical Diretcor" ) );
$root->addChildNode ( new TreeNode ( "Managing Diretcor" ) );

// Add children to Technical director
$TechnicalDirector = $root->getChildNodeByIndex ( 0 );
$TechnicalDirector->addChildNode ( new TreeNode ( "Logistic Coordinator" ) );
$TechnicalDirector->addChildNode ( new TreeNode ( "Production Manager" ) );
$TechnicalDirector->addChildNode ( new TreeNode ( "Quality Supervisor" ) );

// Add Child to Logistic Coordinator
$LogisticCoordinator = $TechnicalDirector->getChildNodeByIndex ( 0 );
$LogisticCoordinator->addChildNode ( new TreeNode ( "Logistic Supervisor" ) );

// Add Child to Production Manager
$ProductionManager = $TechnicalDirector->getChildNodeByIndex ( 1 );
$ProductionManager->addChildNode ( new TreeNode ( "Production Coordinator" ) );

// Add Child to Quality Supervisor
$QualitySupervisor = $TechnicalDirector->getChildNodeByIndex ( 2 );
$QualitySupervisor->addChildNode ( new TreeNode ( "QC Supervisor" ) );

// Add Child to Logistic Supervisor
$LogisticSupervisor = $LogisticCoordinator->getChildNodeByIndex ( 0 );
$LogisticSupervisor->addChildNode ( new TreeNode ( "General Worker" ) );

// Add Child to Production Coordinator
$ProductionCoordinator = $ProductionManager->getChildNodeByIndex ( 0 );
$ProductionCoordinator->addChildNode ( new TreeNode ( "Senior Supervisor" ) );

// Add Child to Senior Supervisor
$SeniorSupervisor = $ProductionCoordinator->getChildNodeByIndex ( 0 );
$SeniorSupervisor->addChildNode ( new TreeNode ( "Shift Worker" ) );
$SeniorSupervisor->addChildNode ( new TreeNode ( "Semi Skilled Worker" ) );

// Now Create the Hierarchy of Managing Director
$ManagingDirector = $root->getChildNodeByIndex ( 1 );
$ManagingDirector->addChildNode ( new TreeNode ( "Financial Manager" ) );
$ManagingDirector->addChildNode ( new TreeNode ( "Human Resource Manager" ) );
$ManagingDirector->addChildNode ( new TreeNode ( "Exim Department" ) );

// Add Child to Financial Manager
$FinancialManager = $ManagingDirector->getChildNodeByIndex ( 0 );
$FinancialManager->addChildNode ( new TreeNode ( "Accounting Executive" ) );

// Add Child to Human Resource Manager
$HumanResourceManager = $ManagingDirector->getChildNodeByIndex ( 1 );
$HumanResourceManager->addChildNode ( new TreeNode ( "ADM Executive" ) );

// Add Child to Accounting Executive
$AccountingExecutive = $FinancialManager->getChildNodeByIndex ( 0 );
$AccountingExecutive->addChildNode ( new TreeNode ( "General Clerk" ) );

//Print the Tree
$root->dump ();

