라라벨 서비스프로바이더에 바인드된 로직은 언제 실행될까요?

```bash
~ $ git clone git@github.com:appkr/laravel-service-provider-test.git
~ $ cd laravel-service-provider-test
~/laravel-service-provider-test $ composer install && cp .env.example .env && php artisan key:generate
~/laravel-service-provider-test $ php artisan serve
```

```bash
# on terminal #1
~ $ tail -f laravel-service-provider-test/storage/logs/laravel.log
# "called INSIDE OF the bind() method" 로그가 찍히는 지 확인

# on terminal #2
~ $ curl -s http://localhost:8000/injection/ok
~ $ curl -s http://localhost:8000/resolve/ok
```