folder='vendor/matrix-platform/core'

[ ! -f config.php ] && cp ${folder}/doc/config-sample.php .

mkdir -p cfg class controller/backend data doc files i18n logs menu table view/{native,twig} www/files
chmod 777 data files logs www/files

touch .gitignore

for path in $(cat ${folder}/doc/gitignore) ; do
    grep -qxF "$path" .gitignore || echo "$path" >> .gitignore
done
