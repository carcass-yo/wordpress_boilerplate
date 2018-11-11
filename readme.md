# blog

Описание проекта (одно предложение).

## Начало работы

Эти инструкции помогут тебе получить копию проекта на локальную машину для разработки и/или тестирования. Смотри, как развернуть проект в живой системе, в разделе "Деплой".

### Необходимые условия окружения

Для запуска проекта в системе должны быть установлены:

- Docker
- Node.js
- [Docker Proxy](http://git.zolotoykod.ru/zk/docker-proxy-letsencrypt)

### Установка

Клонируем репозиторий, собираем фронтэнд и запускаем приложение

```bash
git clone git@gitlab.com:spaceonfire/services/blog.git && cd blog
yarn install
make frontend
npm run start
```

## Запуск тестов

Объясните, как запускать автоматические тесты для этой системы, что тестируют эти тесты и почему

```bash
make test
```

### Проверка стиля кода

Линтеры проверяют код на соответствие [стилю кода](http://git.zolotoykod.ru/zk/developer-guide/blob/master/1-standards/readme.md).
Запуск линтеров производится автоматически перед коммитом или командой:

```bash
npm run lint
```

## Деплой

Для проекта настроен автоматический деплой средствами Gitlab CI на кластер Docker Swarm с Docker Flow Proxy.

- Docker
- [Docker Flow Proxy](http://git.zolotoykod.ru/zk/docker-proxy-letsencrypt)

### Переменные окружения

Для конфигурации приложения используются переменные окружения. Перед деплоем приложения необходимо задать их в настройках проекта *[Settings > CI & CD > Secret variables](http://git.zolotoykod.ru/help/ci/variables/README#secret-variables)*.

Имя переменной | Описание | Значение по-умолчанию | Пример
--- | --- | --- | ---
`NODE_ENV` | окружение Node.js | `development` | `production` 
`ENVIRONMENT` | название окружения в котором запускается приложение | `development` | `(development|staging|production)`
`PRODUCTION_DOMAIN` | доменное имя продакшн хоста | |
`MYSQL_PASSWORD` | пароль пользователя MySQL | |
`MYSQL_ROOT_PASSWORD` | пароль root пользователя MySQL | |
`DB_NAME` | имя базы данных | `wordpress` |
`DB_USER` | имя пользователя базы данных | `wordpress` |
`DB_PASSWORD` | пароль пользователя базы данных | `${MYSQL_PASSWORD}` |
`DB_HOST` | хост базы данных | `mysql` |
`WP_HOME` | | `http://${DOMAIN}` |
`AUTH_KEY` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`SECURE_AUTH_KEY` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`LOGGED_IN_KEY` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`NONCE_KEY` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`AUTH_SALT` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`SECURE_AUTH_SALT` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`LOGGED_IN_SALT` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`
`NONCE_SALT` | настройки безопасности WordPress (64 символа). [Генератор](https://api.wordpress.org/secret-key/1.1/salt/) | | `8626276f99834111d7670f359994eb46c10590c0881a4e6cf923a4fbf7e5a095`

## Разработано с использованием

* [WordPress](https://wordpress.org/) - Popular CMS
* [Env](https://github.com/oscarotero/env) - Simple library to read environment variables and convert to simple types
* [Angular](https://angular.io/) - Frontend framework
* [UIkit](https://getuikit.com/) - A lightweight and modular front-end framework for developing fast and powerful web interfaces.
