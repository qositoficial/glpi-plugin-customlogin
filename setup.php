<?php

define('PLUGIN_CUSTOM_LOGIN_VERSION', '1.0.3');

$folder = basename(dirname(__FILE__));

if ($folder !== "customlogin") {
   $msg = sprintf("Por favor, renomeie a pasta dso plugin de \"%s\" para \"customlogin\"", $folder);
   Session::addMessageAfterRedirect($msg, true, ERROR);
}

function plugin_init_customlogin() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['customlogin'] = true;
   $PLUGIN_HOOKS['display_login']['customlogin'] = "plugin_customlogin_display_login";

   Plugin::registerClass(
      'PluginCustomloginConfig', [
         'addtabon' => [
            'Config'
         ]
      ]
   );
}

function plugin_version_customlogin() {
   return [
      'name'           => 'Custom Login',
      'version'        =>  PLUGIN_CUSTOM_LOGIN_VERSION,
      'author'         => 'QoS',
      'license'        => 'GLPv3',
      'homepage'       => 'https://www.qosit.cloud',
      'requirements'   => [
        'glpi'   => [
           'min' => '9.5.11',
        ],
        'php'    => [
           'min' => '7.0'
        ]
     ]
   ];
}

function plugin_customlogin_check_prerequisites() {
   return true;
}

function plugin_customlogin_check_config($verbose = false) {
   return true;
}

function plugin_customlogin_options() {
   return [
      Plugin::OPTION_AUTOINSTALL_DISABLED => true,
   ];
}