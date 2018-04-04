FROM benhutchins/mediawiki:1.30
MAINTAINER Bertrand Dumenieu <bertrand.dumenieu@ehess.fr>

RUN apt-get update && apt-get install -y \
		libpng-dev \
		zip \
		git \
		wget

#Get GD and Composer, used to install and deploy Semantic MediaWiki
RUN docker-php-ext-install gd && \
    php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" && \
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('/tmp/composer-setup.php'); } echo PHP_EOL;" && \
    php /tmp/composer-setup.php --filename=composer --install-dir=/bin --version=1.6.2

#Load the script to customize the installation of MediaWiki on container startup
COPY startup-config.sh /startup-config.sh
RUN chmod +x /startup-config.sh

#Load the configuration of the internal Apache2
COPY mediawiki.conf /etc/apache2/mediawiki.conf


#Load the configuration of the internal Apache2
COPY CustomSettings.php /var/www/data/CustomSettings.php


#Run the customization script as CMD so it is called immediatly after the installation of MediaWiki
CMD ["sh","-c","/startup-config.sh ; apache2-foreground"]
