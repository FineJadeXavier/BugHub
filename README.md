## 环境准备
- 一个可以运行 laravel 的环境
- 以及以下PHP扩展
    - pdo_sqlite
    - sqlite3
    - mbstring

## 如何使用
- 克隆项目到本地

        git clone https://github.com/FineJadeXavier/debug.git

- 安装扩展包依赖

        composer install
        
- 生成配置文件
        
        cp .env.example .env

- 配置数据库 .env
- 增加配置项 .env

        SCOUT_DRIVER=tntsearch
        TNTSEARCH_TOKENIZER=jieba
        
- 给日志目录读写权限
    
        chmod -R 777 storage

- 给上传图片目录读写权限

        chmod -R 777 public/uploads/content
        
- 生成新key

        php artisan key:generate
        
- 完成安装

## 其他说明

#### 编辑器

- 编辑器图片默认会上传到 public/uploads/content 目录下
- 编辑器相关功能配置位于 config/wang-editor.php 文件中
- 其他详细说明参看 [lravel-wang-deitor][1]

----------

#### 中文分词搜索引擎
- TNTSearch + jieba分词
- 其他详细说明参看 [白俊遥博客][3]
        
----------

#### 后台系统
- 后台地址：/admin
- 账号：admin
- 密码：admin
- 其他详细说明参看 [laravel admin][2]


  [1]: https://github.com/douyasi/laravel-wang-editor/blob/master/README.md
  [2]: http://laravel-admin.org/docs/#/zh/installation
  [3]: https://baijunyao.com/article/154
