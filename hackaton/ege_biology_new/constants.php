<?php
      /** База данных MySQL */
define('DB_HOST', 'localhost');                      /** Имя сервера MySQL */
define('DB_USER', 'root');                           /** Имя пользователя MySQL */
define('DB_PASSWORD', '');                           /** Пароль к базе данных MySQL */
define('DB_NAME', 'ege');                        /** Имя базы данных */
define('DB_CHARSET', 'utf8');                        /** Кодировка базы данных для создания таблиц. */
define('DB_COLLATE', '');                            /** Схема сопоставления. */

define('MY_FULLNAME', 'Дмитрий Викторович НЕСТЕРОВ');
define('MY_FNAME', 'Нестеров');
define('MY_NAME', 'Дмитрий Викторович');
define('MY_NAME_IN', 'Д.В.');
define('MY_PHONE', '+7 (981) 834-37-21');
define('MY_EMAIL', 'repetitor@dmnesterov.ru');

define('PAGE_TITLE', 'Биология ЕГЭ');                            /** Заголовок страницы */
define('EGE_YEAR', '2017');                            /** Заголовок страницы */
error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

?>