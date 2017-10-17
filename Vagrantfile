# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

Vagrant.configure(2) do |config|
  config.vm.box = "debian/contrib-jessie64"
  config.vm.network "private_network", type: "dhcp"

  config.vm.synced_folder ".", "/var/www/project", id: "project-root",
    :nfs => true,
    :nfs_udp => false,
    :mount_options  => ['nolock,tcp,actimeo=2,rw,fsc,async']

  config.vm.provision :shell, inline: <<SCRIPT
apt-get update

apt-get -y install curl git

# Install extras as config files use more_headers module.
apt-get install -y nginx nginx-extras

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password vagrant'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password vagrant'
apt-get install -y mariadb-server mariadb-client

apt-get install -y \
  php5-fpm \
  php5-mysqlnd \
  php5-imagick \
  php5-memcached \
  php5-intl \
  php5-curl

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

curl -Ls https://github.com/atelierdisko/hoi/releases/download/v0.5.0/hoi_0.5.0-2-amd64.deb -o hoi.deb
dpkg --install hoi.deb
sed -i -e "s|useLegacy = false|useLegacy = true|g" /etc/hoi/hoid.conf
sed -i -e "s|user = \"hoi\"|user = \"root\"|g" /etc/hoi/hoid.conf
sed -i -e "s|password = \"s3cret\"|password = \"vagrant\"|g" /etc/hoi/hoid.conf
systemctl enable hoid
systemctl start hoid
SCRIPT
end
