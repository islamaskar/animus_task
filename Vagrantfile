VAGRANTFILE_API_VERSION = "2"
REQUIRED_PLUGINS        = %w(vagrant-vbguest vagrant-librarian-chef-nochef)

plugins_to_install = REQUIRED_PLUGINS.select { |plugin| not Vagrant.has_plugin? plugin }
if not plugins_to_install.empty?
  puts "Installing required plugins: #{plugins_to_install.join(' ')}"
  if system "vagrant plugin install #{plugins_to_install.join(' ')}"
    exec "vagrant #{ARGV.join(' ')}"
  else
    abort "Installation of one or more plugins has failed. Aborting. Please read the Bike Index README."
  end
end

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/xenial64"

  # Configure the virtual machine to use 1.5GB of RAM
  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1536"]
    #vb.gui = true
  end

  # Forward the Symfony server default port to the host
  config.vm.network :forwarded_port, guest: 8000, host: 8000
  # Forward the ReactJS App default port to the host
  config.vm.network :forwarded_port, guest: 3000, host: 3000
  # Mount the source code directory
  config.vm.synced_folder '.', '/home/ubuntu/animus', nfs: true
  config.vm.network "private_network", ip: "192.168.33.10"
  # Use Chef Solo to provision our virtual machine
  config.vm.provision :chef_solo do |chef|
    chef.cookbooks_path = ["cookbooks"]

    chef.add_recipe "apt"
    chef.add_recipe "build-essential"
    chef.add_recipe "system::install_packages"
    chef.add_recipe "php"
    chef.add_recipe "mariadb"
    chef.add_recipe 'git'
    chef.add_recipe 'nodejs'
    chef.add_recipe 'apache2'
    chef.add_recipe 'yarn'

    chef.json = {
      "system" => {
        "packages" => {
          "install" => ["curl","libapache2-mod-php", "php-mcrypt", "php7.0-mysql", "php7.0-curl"]
        }
      },
      "mariadb" => {
        "server_root_password": "animus"
      },
      "nodejs": {
        "npm_packages": [
          {
            "name": "create-react-app"
          }
        ]
      }
    }
    #chef.log_level = :debug
    config.vm.provision "shell", path: "./provisioner"
  end
end
