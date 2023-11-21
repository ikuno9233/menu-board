#!/usr/bin/env bash

OLD_GID=$(id -g www-data)
OLD_UID=$(id -u www-data)

groupmod -o -g ${GID} www-data
usermod -o -u ${UID} www-data

find / -xdev -gid ${OLD_GID} | xargs -r chown -h :www-data
find / -xdev -uid ${OLD_UID} | xargs -r chown -h www-data

exec /usr/local/bin/docker-php-entrypoint "$@"
