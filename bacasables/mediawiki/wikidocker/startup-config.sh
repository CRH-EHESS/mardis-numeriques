#!/bin/bash -e

cd /var/www/html

echo 'Setting images dir permissions'
chmod 700 /var/www/data/images

echo 'Installing Semantic MediaWiki v~2.5 and Maps v~5.0'
#Maps >5.0 is available only for PHP 7.0+
composer require mediawiki/semantic-media-wiki "~2.5" --update-no-dev && \
composer require mediawiki/maps "~5.0" --update-no-dev && \
php maintenance/update.php --skip-external-dependencies

echo 'Installing DataTransfer v0.6'
git clone https://gerrit.wikimedia.org/r/p/mediawiki/extensions/DataTransfer /var/www/html/extensions/DataTransfer

echo 'Installing WikiEditor'  && \
wget     https://extdist.wmflabs.org/dist/extensions/WikiEditor-REL1_30-dc5f855.tar.gz && \
tar -xzf WikiEditor-REL1_30-dc5f855.tar.gz -C /var/www/html/extensions && \
rm WikiEditor-REL1_30-dc5f855.tar.gz

echo 'Installing Cite' 
wget https://extdist.wmflabs.org/dist/extensions/Cite-REL1_30-e2ebd23.tar.gz && \
tar -xzf Cite-REL1_30-e2ebd23.tar.gz -C /var/www/html/extensions && \
rm  Cite-REL1_30-e2ebd23.tar.gz



exec "$@"

