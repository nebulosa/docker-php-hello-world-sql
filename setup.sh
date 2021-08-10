#!/bin/sh
CURRENT_DIR="$(cd "$(dirname "${0}")" && pwd)"


cd "${CURRENT_DIR}"
SECS="3"

case ${1} in
    mysql)
        DB_ENG="mysql"
        DB_HOST="mysql:3306"
        ;;
    postgres*)
        DB_ENG="pgsql"
        DB_HOST="postgres:5432"
        ;;
    *)
        >&2 echo "Choose one of: mysql, postgres"
        exit 1
        ;;
esac

if [ $# -eq 2 ] && [ -f ${2} ]; then
    set -o allexport
    . "$(dirname ${2})/$(basename ${2})"
    set +o allexport
elif [ ! -z ${2} ]; then
    >&2 echo "Env file ${2} not found"
fi

export DB_ENG
export DB_HOST

while :; do
    COMPOSE_PROFILES=${1} docker-compose build && \
    COMPOSE_PROFILES=${1} docker-compose up
    printf "%s\\n" "respawing in ${SECS} secs ..."
    sleep "${SECS}"
done
