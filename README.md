## DEBUG


### **编辑器**

- 编辑器图片默认会上传到 public/uploads/content 目录下；
- 编辑器相关功能配置位于 config/wang-editor.php 文件中。
- 使用之前，先 php artisan vendor:publish --force

##### 实例
    <div class="wangEdit">
        {!! we_css() !!}
        {!! we_js() !!}
        {!! we_field('wangeditor', 'content', '这里是事先写在里面的') !!}
        {!! we_config('wangeditor') !!}
    </div>
    
----------

### **全文索引 + 分词搜索**

- 用的TNTSearch + jieba分词
- 具体参看 https://baijunyao.com/article/154

#### 依赖以下PHP扩展

- pdo_sqlite
- sqlite3
- mbstring

#### 如何使用
- 生成索引

        php artisan scout:import "App\Models\Article"
    
- 把要搜索的词给 Article::search() 处理

#### 实例 搜索 'php'
        Route::get('/search', function () {
           return Article::search('php')->get();
        });
        
        
----------

### **后台**

#### 后台用的是laravel admin
- 安装详情参见 [laravel admin][1]


  [1]: http://laravel-admin.org/docs/#/zh/installation
