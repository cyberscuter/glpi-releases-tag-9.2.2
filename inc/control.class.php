<?php
/**
 * ---------------------------------------------------------------------
 * GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2015-2018 Teclib' and contributors.
 *
 * http://glpi-project.org
 *
 * based on GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2003-2014 by the INDEPNET Development Team.
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * GLPI is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access this file directly");
}

/**
 * Control class
 *
 * @since 0.85
**/
class Control extends CommonGLPI {


   static function getTypeName($nb = 0) {
      return _n('Check', 'Checks', $nb);
   }


   static function canView() {
      return Session::haveRight('config', READ);
   }


   /**
    * @see CommonGLPI::getAdditionalMenuOptions()
   **/
   static function getAdditionalMenuOptions() {

      if (static::canView()) {
         $options['FieldUnicity']['title']           = __('Fields unicity');
         $options['FieldUnicity']['page']            = FieldUnicity::getSearchURL();
         $options['FieldUnicity']['links']['add']    = FieldUnicity::getFormURL();
         $options['FieldUnicity']['links']['search'] = FieldUnicity::getSearchURL();

         return $options;
      }
      return false;
   }
}
