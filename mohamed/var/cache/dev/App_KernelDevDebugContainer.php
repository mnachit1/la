<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOXsEr9L\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOXsEr9L/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOXsEr9L.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOXsEr9L\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOXsEr9L\App_KernelDevDebugContainer([
    'container.build_hash' => 'OXsEr9L',
    'container.build_id' => 'dbeaeeea',
    'container.build_time' => 1687389403,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOXsEr9L');