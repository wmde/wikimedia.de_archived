# Copyright 2016 Atelier Disko. All rights reserved.
#
# Use of this source code is governed by a BSD-style
# license that can be found in the LICENSE file.

Vagrant.configure(2) do |config|
  config.vm.box = "debian/jessie64"
  config.vm.network "private_network", type: "dhcp"

  config.vm.synced_folder ".", "/var/www/project", id: "project-root",
    :nfs => true,
    :nfs_udp => false,
    :mount_options  => ['nolock,tcp,actimeo=2,rw,fsc,async']

  config.vm.provision :shell, inline: <<SCRIPT
apt-get update

# Install extras as config files use more_headers module.
apt-get install -y nginx nginx-extras

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password vagrant'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password vagrant'
apt-get install -y mariadb-server mariadb-client

apt-get install -y php5-fpm

curl https://github.com/atelierdisko/hoi/releases/download/v0.5.0/hoi_0.5.0-1-amd64.deb -o hoi.deb
dpkg --install hoi.deb
sed -i -e "s|useLegacy = false|useLegacy = true|g" /etc/hoi/hoid.conf
sed -i -e "s|user = \"hoi\"|user = \"root\"|g" /etc/hoi/hoid.conf
sed -i -e "s|password = \"s3cret\"|password = \"vagrant\"|g" /etc/hoi/hoid.conf
SCRIPT
end
