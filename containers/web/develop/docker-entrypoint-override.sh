#!/usr/bin/env bash

OLD_GROUP_ID=$(id -g nginx)
OLD_USER_ID=$(id -u nginx)

groupmod -o -g ${GROUP_ID} nginx
usermod -o -u ${USER_ID} nginx

find / -xdev -gid ${OLD_GROUP_ID} | xargs -r chown -h :nginx
find / -xdev -uid ${OLD_USER_ID} | xargs -r chown -h nginx

exec /docker-entrypoint.sh "$@"
