#  niftyAdmin
[niftyAdmin](http://nifty.dwyjr.cn/)  基于Laravel5.5框架和[Nifty](http://wrapbootstrap.com/preview/WB0048JF7)前端组建的 基础管理系统框架
[demo地址](http://nifty.dwyjr.cn/)  

## 介绍
* Larave5.5,[nifty](http://wrapbootstrap.com/preview/WB0048JF7)后台管理模板,php >=7.0.0
* barryvdh/laravel-debugbar: ^3.1  调试器
* maatwebsite/excel:^2.1  excel,csv,pdf等文件处理
* php-amqplib/php-amqplib: ^2.7  rabbitmq队列处理,只需要配置一下参数 ,使用方法封装在Libraries/MQ中.
* yajra/laravel-datatables-oracle  lavel datatables 集成使用很方便.
* 集成Passpord实现Oauth2的验证，也可以用密码授权令牌快速开发Api安全认证
* 已经集成登陆,注册和用户管理模块
* 已经集成Permission 用于RBAC权限管理，认证中间件可以根据自己的喜好改
* 菜单选中激活扩展：hieu-le/active

## 安装步骤
1. git clone 
2. composer install
3. cp .env.example .env 复制配置文件
4. php artisan key:generate 创建新的应用程序密钥
5. 编辑 .env 文件配置数据库
      - DB_HOST=YOUR_DATABASE_HOST
      - DB_DATABASE=YOUR_DATABASE_NAME
      - DB_USERNAME=YOUR_DATABASE_USERNAME
      - DB_PASSWORD=YOUR_DATABASE_PASSWORD
6. php artisan migrate  数据库迁移
7. php artisan db:seed  数据库填充
8. windows可以直接使用 php artisan serve  http://localhost:8000访问, 使用nginx配置需要注意 try_files $uri $uri/ /index.php?$query_string;
9. 如果要使用passport  需要 php artisan passport:install [详解](https://learnku.com/laravel/t/22586 )
10. App\Http\Middleware\PermissionMiddleware 这个类是自定义的权限中间件，可以自定义修改
