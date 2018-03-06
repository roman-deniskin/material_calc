<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## О проекте

Простой калькулятор расчёта стоимости продукции. Позволяет
- Рассчитывать стоимость продукции, материалов и деталей.
- Вести учёт продукции и деталей.
- Добавлять, изменять и удалять продукцию и деталей.

## Автор

Денискин Varezzz1 Роман. Никаких прав на данную программу нет, возможно использование программы в качестве каркаса к более серьёзным производственным калькуляторам, будущим CRM или как проект чьей то дипломной работы. :)

## Установка
1. В командной строке открываем папку с проектом и прописываем: git clone https://github.com/roman-deniskin/material_calc/ (должен быть установлен git);
2. В корне проекта находим файл .env.example, переименовываем его в .env и выполняем команду php artisan key:generate;
3. В файле .env настраиваем соединение с БД;
4. Выполняем команду php artisan migrate.