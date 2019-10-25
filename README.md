# ALÔ ALERJ

### Atualizando a aplicação

- Entrar na `<pasta-onde-o-site-foi-instalado>`
- Baixar as atualizações de código fonte usando Git (git pull ou git fetch + git merge, isso depende de como operador prefere trabalhar com Git)
- Executar, no mínimo, os comandos:

```
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
php artisan migrate --force
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

- Reiniciar o horizon

### Supervisor:
- Configurar o supervisor para manter rodando o Horizon a partr `php artisan horizon`