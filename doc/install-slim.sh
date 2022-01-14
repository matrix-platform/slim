folder='vendor/matrix-platform/slim'

cp -R ${folder}/www .
cp ${folder}/doc/htaccess www/.htaccess
cp ${folder}/index.php .

for path in $(cat ${folder}/doc/gitignore) ; do
    grep -qxF "$path" .gitignore || echo "$path" >> .gitignore
done
