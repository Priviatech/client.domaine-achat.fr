<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/Priviatech/client.domaine-achat.fr.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('prodclientdomaineachat.privianet.com')
    ->set('remote_user', 'deployer')
    ->set('port', '1402')
    ->set('deploy_path', '~/client.domaine-achat.fr')
    ->set('branch', 'main');
    ->setLabels([
        'env' => 'prod',
    ]);
host('devclientdomaineachat.privianet.com')
    ->set('remote_user', 'deployer')
    ->set('port', '1402')
    ->set('deploy_path', '~/client.domaine-achat.fr')
    ->set('branch', 'dev');
    ->setLabels([
        'env' => 'dev',
    ]);

// Hooks

after('deploy:failed', 'deploy:unlock');
