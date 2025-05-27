<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * @package     block_uteluqchatbot
 * @copyright   2025 Universié TÉLUQ
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Full name of the plugin (type_name) - Here, a block named "uteluqchatbot".
$plugin->component = 'block_uteluqchatbot';

// Human-readable version - Recommended format: major.minor.patch.
$plugin->release = '0.5.3';

// Internal version number - Format YYYYMMDDXX (year, month, day, increment).
// Here: March 6, 2025, version 06 of the day.
$plugin->version = 2025052001;

// Minimum required version of Moodle (here Moodle 4.1 - November 2022).
// This corresponds to Moodle 4.1.
$plugin->requires = 2022112800;

// Plugin maturity level - Four possible options:
// MATURITY_ALPHA: Very early version, actively under development with incomplete features.
//                 May contain significant bugs and is not recommended for production.
// MATURITY_BETA: Testing version with all major features implemented.
//                May still contain bugs and requires further testing.
// MATURITY_RC: "Release Candidate" - Nearly finalized version in final testing phase.
//              Features are complete, and most bugs are resolved.
// MATURITY_STABLE: Stable version, tested and ready for production use.
//                  Recommended for general use.
$plugin->maturity = MATURITY_ALPHA;
