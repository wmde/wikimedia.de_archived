# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by the AGPL v3
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

apt-get -y install curl git unzip

# Install extras as config files use more_headers module.
apt-get install -y nginx nginx-extras

apt-get install -y memcached

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
patch -p1 /etc/hoi/hoid.conf <<EOF
diff --git i/conf/hoid.conf w/conf/hoid.conf
index b6bf64a..670cde9 100644
--- i/conf/hoid.conf
+++ w/conf/hoid.conf
@@ -32,7 +32,7 @@ NGINX {
 	# Certain features (i.e. logging to syslog/journald) are only available
 	# in more recent versions (>= 1.7.1). Hoi will workaround these issues
 	# if this option is enabled.
-	useLegacy = false
+	useLegacy = true
 }
 
 SSL {
@@ -60,7 +60,7 @@ cron {
 
 worker {
 	# Enables the worker runner.
-	enabled = true 
+	enabled = false 
 }
 
 systemd {
@@ -72,7 +72,7 @@ systemd {
 	# with enable and disable, better cron anti-congestion features are not
 	# available in older systemd versions (at least 215). When useLegacy is
 	# enabled, hoi will workaround these missing features.
-	useLegacy = false
+	useLegacy = true
 }
 
 database {
@@ -102,17 +102,17 @@ MySQL {
 	#		INDEX,        -- -"-
 	#   ON *.* 
 	#   TO 'hoi'@'localhost'
-	user = "hoi"
-	password = "s3cret"
+	user = "root"
+	password = "vagrant"
 
 	# MySQL >= 5.7.6 or MariaDB >= 10.1.3 are required to use more efficient
 	# queries. By enabling this option older versions may be used.
-	useLegacy = false
+	useLegacy = true
 }
 
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
