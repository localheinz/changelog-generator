# README 

[![Build Status](https://travis-ci.org/localheinz/github-changelog.svg?branch=master)](https://travis-ci.org/localheinz/github-changelog) 
[![Code Climate](https://codeclimate.com/github/localheinz/github-changelog/badges/gpa.svg)](https://codeclimate.com/github/localheinz/github-changelog) 
[![Test Coverage](https://codeclimate.com/github/localheinz/github-changelog/badges/coverage.svg)](https://codeclimate.com/github/localheinz/github-changelog)
[![Dependency Status](https://www.versioneye.com/user/projects/55c71992653762002000364c/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55c71992653762002000364c)

## CLI Tool

### Global installation

Install globally:

```bash
$ composer global require localheinz/github-changelog:^0.1
```

Create your changelogs anywhere:

```bash
$ github-changelog pull-request localheinz github-changelog 0.1.1 0.1.2
```

Enjoy the changelog:

```
- Fix: Catch exceptions in command (#37)
- Fix: Request 250 instead of 30 commits (#38)
```

### Local installation

Install locally:

```bash
$ composer require --dev --sort-packages localheinz/github-changelog:^0.1
```

Create your changelog from within in your project:

```bash
$ vendor/bin/github-changelog pull-request localheinz github-changelog ae63248 master
```

Enjoy the changelog:

```
- Enhancement: Create ChangeLog command (#31)
- Fix: Assert exit code is set to 0 (#32)
- Enhancement: Add console application (#33)
- Fix: Readme (#34)
- Fix: Autoloading for console script (#35)
- Fix: Version foo with rebasing and whatnot (#36)
- Fix: Catch exceptions in command (#37)
- Fix: Request 250 instead of 30 commits (#38)
```

## Userland Code

Install locally:

```bash
$ composer require --sort-packages localheinz/github-changelog:^0.1
```

Retrieve pull requests between references in your application:

```php
<?php

require 'vendor/autoload.php';

use Github\Client;
use Github\HttpClient\CachedHttpClient;
use Localheinz\GitHub\ChangeLog\Entity;
use Localheinz\GitHub\ChangeLog\Repository;

$client = new Client(new CachedHttpClient());
$client->authenticate(
    'your-token-here',
    Client::AUTH_HTTP_TOKEN
);

$repository = new Repository\PullRequest(
    $client->pullRequests(),
    new Repository\Commit($client->repositories()->commits())
);

$pullRequests = $repository->items(
    'localheinz',
    'github-changelog',
    '0.1.1',
    '0.1.2'
);

array_walk($pullRequests, function (Entity\PullRequest $pullRequest) {
    echo sprintf(
        '- %s (#%s)' . PHP_EOL,
        $pullRequest->title(),
        $pullRequest->id()
    );
});

```

Enjoy the changelog:

```
- Fix: Catch exceptions in command (#37)
- Fix: Request 250 instead of 30 commits (#38)
```

## Hints

:bulb: You can use anything for a reference, e.g., a tag, a branch, a commit!
