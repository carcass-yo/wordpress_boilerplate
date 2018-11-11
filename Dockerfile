FROM spaceonfire/nginx-php-fpm:1.0.0-beta.3

ENV SOF_PRESET=wordpress \
	PAGER=more

ARG APPLICATION_ENV

COPY app/mu-plugins app/plugins app/themes ./app/
COPY composer.json composer.lock ./
RUN composer-update
COPY ./ ./
