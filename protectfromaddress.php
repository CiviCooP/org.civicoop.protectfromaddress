<?php

require_once 'protectfromaddress.civix.php';

function protectfromaddress_civicrm_preProcess($formName, &$form) {
  switch ($formName) {
    case 'CRM_Contact_Form_Task_Email':
    case 'CRM_Activity_Form_Task_Email':
    case 'CRM_Event_Form_Task_Email':
    case 'CRM_Member_Form_Task_Email':
    case 'CRM_Contribute_Form_Task_Email':
      $form->_emails = array();
      $emails = array();
      $domainEmails = CRM_Contact_Form_Task_EmailCommon::domainEmails();
      foreach ($domainEmails as $domainEmail => $email) {
        $form->_emails[$domainEmail] = $domainEmail;
      }
      $form->_fromEmails = CRM_Utils_Array::crmArrayMerge($emails, $domainEmails);
      $form->_fromEmails = array_filter($form->_fromEmails);
      if (is_numeric(key($form->_fromEmails))) {
        // Add signature
        $defaultEmail = civicrm_api3('email', 'getsingle', array('id' => key($form->_fromEmails)));
        $defaults = array();
        if (!empty($defaultEmail['signature_html'])) {
          $defaults['html_message'] = '<br/><br/>--' . $defaultEmail['signature_html'];
        }
        if (!empty($defaultEmail['signature_text'])) {
          $defaults['text_message'] = "\n\n--\n" . $defaultEmail['signature_text'];
        }
        $form->setDefaults($defaults);
        break;
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function protectfromaddress_civicrm_config(&$config) {
  _protectfromaddress_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function protectfromaddress_civicrm_xmlMenu(&$files) {
  _protectfromaddress_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function protectfromaddress_civicrm_install() {
  _protectfromaddress_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function protectfromaddress_civicrm_uninstall() {
  _protectfromaddress_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function protectfromaddress_civicrm_enable() {
  _protectfromaddress_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function protectfromaddress_civicrm_disable() {
  _protectfromaddress_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function protectfromaddress_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _protectfromaddress_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function protectfromaddress_civicrm_managed(&$entities) {
  _protectfromaddress_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function protectfromaddress_civicrm_caseTypes(&$caseTypes) {
  _protectfromaddress_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function protectfromaddress_civicrm_angularModules(&$angularModules) {
_protectfromaddress_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function protectfromaddress_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _protectfromaddress_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function protectfromaddress_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function protectfromaddress_civicrm_navigationMenu(&$menu) {
  _protectfromaddress_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'org.civicoop.protectfromaddress')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _protectfromaddress_civix_navigationMenu($menu);
} // */
