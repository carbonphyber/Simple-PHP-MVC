========
Simple PHP MVC
========

A simple MVC framework (designed and documented to work with ``PHP 5`` and ``Apache 2``).
Designed to work with UTF-8 (a flexible and standard character encoding) by default.


Installation
============

Requirements
------------
``Apache 2.x`` with ``mod_rewrite``
``PHP 5.2`` or newer


Configuration
------------

Apache configuration. Add this directive to your httpd.conf, .htaccess, or
other Apache configuration file::

    <Location />
        RewriteEngine on
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule !\.(js|ico|gif|jpg|png|css)$ /index.php
    </Location>

This assumes that you have Apache running as your web server with
``mod_rewrite`` installed and active.  This directive will rewrite any URI
in the HTTP request to the ``index.php`` file in the root of the ``public``
directory.  This ``index.php`` file is the "bootstrap file" and is configured
to find, load, and initialize the MVC package.


Additional useful and recommended ``Apache`` + ``php.ini`` values::
    php_value default_charset "UTF-8"
    SetEnv APPLICATION_ENVIRONMENT development
    php_value session.save_path "/path/to/repo/session"
    php_value session.auto_start 0
    php_value output_buffering 1
    php_value expose_php Off
    php_value magic_quotes_gpc 0
    php_value magic_quotes_runtime 0


Package License
===========

The MIT License
------------
Copyright (c) 2011 David Wortham

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.