<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/Lichtfarbenspiel/lfs-app.git');

set('http_user', 'acc890505466');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('production')
    ->set('labels', ['stage' => 'production'])
    ->set('hostname', 'home13500868.1and1-data.host')
    ->set('branch', 'release') // the git branch to deploy
    ->set('remote_user', 'acc890505466')
    ->set('deploy_path', '~/lichtfarbenspiel');



// compile our production assets
task('npm:build', function () {
    run('cd {{release_path}} && {{bin/npm}} install');
    run('cd {{release_path}} && {{bin/npm}} run build');
    run('cd {{release_path}} && {{bin/npm}} install --omit=dev');
})->desc('Compile npm files locally');
after('deploy:vendors', 'npm:build');

// Hooks
after('deploy:failed', 'deploy:unlock');


// after a deploy, clear our cache and run optimisations
after('deploy:cleanup', 'artisan:cache:clear');
after('deploy:cleanup', 'artisan:optimize');

// handle queue restarts
after('deploy:success', 'artisan:queue:restart');
after('rollback', 'artisan:queue:restart');