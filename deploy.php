<?php
namespace Deployer;

// require 'recipe/laravel.php';

// Project name
set('application', 'Sass');

// Project repository
set('repository', 'git@github.com:PauloRobertoM/sass.git');

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);

// Hosts
host('177.12.164.79:21')
    ->user('mozzarellapizzas')
    ->set('deploy_path', '/www/teste');  
    
// Tasks
task('permissions:reset', function () {
    run('cd {{deploy_path}}');
    run('sudo chown -R root:www-data {{deploy_path}}');
    run('sudo find {{deploy_path}} -type f -exec chmod 644 {} \;');
    run('sudo find {{deploy_path}} -type d -exec chmod 755 {} \;');    
    
    // run('sudo chgrp -R www-data {{deploy_path}}/storage {{deploy_path}}/bootstrap/cache');
    // run('sudo chmod -R ug+rwx {{deploy_path}}/storage {{deploy_path}}/bootstrap/cache');
})->desc('Fix permissions');

task('deploy:git', function () {
    run('cd {{deploy_path}} && git reset --hard && git pull');
})->desc('Fix permissions');

// task('deploy:composer', function () {
//     // run('cd {{deploy_path}} && composer install && composer dumpautoload');
//     run('cd {{deploy_path}}');
//     // run('cd /var/www/fbs_final/public && rm storage && cd /var/www/fbs_final && php artisan storage:link');
// });

task('deploy', [
    'deploy:git',
    'permissions:reset',

]);