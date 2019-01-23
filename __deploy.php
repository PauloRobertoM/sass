<?php
namespace Deployer;

require 'recipe/codeigniter.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:PauloRobertoM/sass.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('69.163.238.75')
    ->user('dh_p3kbez')
    ->set('deploy_path', '/home/dh_p3kbez/soulphia2.dreamhosters.com');
);
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);