.. include:: /Includes.txt
.. include:: /Images.txt

.. _introduction:

Introduction
============

.. only:: html

	:ref:`what` | :ref:`screenshots` | :ref:`quickstart` | :ref:`changelog` |

.. _what:

What does it do?
----------------

If you want to render some TypoScript as a Content Element, you can use this plugin.
This plugin is really a small plugin without any deeper logic, but should help you with your daily work.

.. _screenshots:

Screenshots
-----------

|hmenu|

Showing some TypoScript Object in Frontend (e.g. a HMENU)

|flexform|

You can add a TypoScript-Path in Plugin Edit View

|setup|

This is another Example Setup to render the current Year in Frontend

|extension_manager|

Decide if the plugin view is cached in general or not in extension manager settings

.. _quickstart:

Quickstart
----------

- Import Extension from TER
- Add some TypoScript to the current (or the root) page (e.g. lib.temp)
- Add the plugin to a page
- Write lib.temp into the FlexForm Field
- Done

.. _changelog:

Changelog
---------

All changes are documented on `http://forge.typo3.org/projects/extension-typoscript2ce <http://forge.typo3.org/projects/extension-typoscript2ce>`_

.. t3-field-list-table::
 :header-rows: 1

 - :Version:
      Version
   :Date:
      Release Date
   :Changes:
      Release Description

 - :Version:
      1.0.0
   :Date:
      2014-07-28
   :Changes:
      Refactored to Extbase and Namespaces

      TYPO3 6.0 or higher required now

      Breaking Change to 0.1.0: The FlexForm Field has changed, so you have to add the TypoScript Path again after updating

 - :Version:
      0.1.0
   :Date:
      2009-03-31
   :Changes:
      Initial Upload to TER