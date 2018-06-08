## DEBUG

### TODO

- [x] 登录
- [x] 注册
- [ ] 文章
    - [ ] 发布文章
    - [ ] 编辑文章
- [ ] 个人资料修改
    - [ ] 修改邮箱
    - [ ] 修改密码
- [ ] 搜索
- [ ] 主页数据显示
    - [ ] 自动加载
    - [ ] 分类排序
- [ ] 获取社区运行状况

### 编辑器

编辑器图片默认会上传到 public/uploads/content 目录下；

编辑器相关功能配置位于 config/wang-editor.php 文件中。

#### 实例
    <div class="wangEdit">
        {!! we_css() !!}
        {!! we_js() !!}
        {!! we_field('wangeditor', 'content', '这里是事先写在里面的') !!}
        {!! we_config('wangeditor') !!}
    </div>
