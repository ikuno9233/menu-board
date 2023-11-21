#!/usr/bin/env bash

OLD_GID=$(id -g mysql)
OLD_UID=$(id -u mysql)

groupmod -o -g ${GID} mysql
usermod -o -u ${UID} mysql

find / -xdev -gid ${OLD_GID} | xargs -r chown -h :mysql
find / -xdev -uid ${OLD_UID} | xargs -r chown -h mysql

exec /usr/local/bin/docker-entrypoint.sh "$@"
