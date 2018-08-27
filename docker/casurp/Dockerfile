FROM php:7.1-apache
ARG BRANCH=develop
MAINTAINER Sonja Hohlfeld <development@sonja-hohlfeld.de>

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb http://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
&& apt-get install -yq nodejs git postgresql-client libpq-dev unzip vim libdbd-pg-perl liblog-log4perl-perl yarn jq cron\
&& rm -rf /var/lib/apt/lists/* \
&& docker-php-ext-install pdo pdo_pgsql zip \
&& a2enmod rewrite \
&& docker-php-source delete

RUN git clone --branch ${BRANCH} --recursive https://github.com/sonjahohlfeld/casurp.git /casurp
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /casurp; composer install --no-interaction
RUN cd /casurp; yarn install --non-interactive
RUN cd /casurp; ./node_modules/.bin/encore dev

RUN rm -rf /var/www/html && ln -fs /casurp/public/build /var/www/html
RUN chown -R www-data:www-data /casurp/var

RUN echo "export LC_ALL=C.UTF-8" >>/etc/apache2/envvars
RUN echo "export LANG=C.UTF-8" >>/etc/apache2/envvars
