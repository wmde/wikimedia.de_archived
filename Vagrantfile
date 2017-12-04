# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

Vagrant.configure(2) do |config|
  config.vm.box = "debian/contrib-stretch64"
  config.vm.network "private_network", type: "dhcp"

  config.vm.synced_folder ".", "/var/www/project", id: "project-root",
    :nfs => true,
    :nfs_udp => false,
    :mount_options  => ['nolock,tcp,actimeo=2,rw,fsc,async']

  config.vm.provision :shell, inline: <<SCRIPT
apt-get update

apt-get -y install curl git unzip

# Install extras as config files use more_headers module.
apt-get install -y nginx nginx-extras

apt-get install -y memcached

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password vagrant'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password vagrant'
apt-get install -y mariadb-server mariadb-client

apt-get install -y \
  php7.0-fpm \
  php7.0-mysqlnd \
  php7.0-imagick \
  php7.0-memcached \
  php7.0-intl \
  php7.0-xml \
  php7.0-curl

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

curl -Ls https://github.com/atelierdisko/hoi/releases/download/v0.7.0-alpha/hoi_0.7.0-alpha-1-amd64.deb -o hoi.deb
dpkg --install hoi.deb
patch -p1 /etc/hoi/hoid.conf <<EOF
diff --git i/conf/hoid.conf w/conf/hoid.conf
index 00ec881..58308a8 100644
--- i/conf/hoid.conf
+++ w/conf/hoid.conf
@@ -103,7 +103,7 @@ MySQL {
 	# Thy MySQL host and optional port to connect to, if port is not given
 	# will use default port. To use a unix socket, provide the absolute path
 	# to it here.
-	host = "localhost:3306"
+	host = "/var/run/mysqld/mysqld.sock"
 
 	# Username and password to account that will manage databases 
 	# and users. Note that hoi will never drop databases or users. 
@@ -123,8 +123,8 @@ MySQL {
 	#		INDEX,        -- -"-
 	#   ON *.* 
 	#   TO 'hoi'@'localhost'
-	user = "hoi"
-	password = "s3cret"
+	user = "root"
+	password = "vagrant"
 
 	# MySQL >= 5.7.6 or MariaDB >= 10.1.3 are required to use more efficient
 	# queries. By enabling this option older versions may be used.
@@ -133,7 +133,7 @@ MySQL {
 
 volume {
 	# Enables the volume runner.
-	enabled = true
+	enabled = false
 
 	# Temporary volumes will be bind mounted subdirectories of this directory.
 	temporaryRunPath = "/var/tmp"
EOF
systemctl enable hoid
systemctl start hoid
SCRIPT
end
