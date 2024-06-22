# Тестовое задание

Исполнитель: Артём Давыдов

## Информация по реализации

https://localhost/client - Клиенты (создание клиента, выдача кредита клиенту)

В форме выдачи кредита можно проверить соответствует ли параметры клиента условиям выдачи.
В той же форме можно сразу выдать кредит (кредит будет создан).
На создание кредита подписан App\Client\EventListener\CreditCreatedEventListener,
который по нереализованной логике должен добавить в очередь уведомление клиента.

## Тестирование

`php bin/phpunit`

## Docker

`docker compose build --no-cache`

`docker compose up --pull always -d --wait`

Открыть `https://localhost` в браузере

`docker compose down --remove-orphans`

## Стек

- Caddy web server
- PHP 8.2
- PostgresQl
