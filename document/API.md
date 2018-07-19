----------

# BUGUB API 文档

----------

## API 调用地址

    http://api.2video.cn/v1

----------

## 用户

----------

### 注册

----------

**请求地址**

```
POST	/register
```

**传入参数：**

~~~json
{
    "name": "用户名",
    "email": "电子邮件地址",
    "password": "密码",
}
~~~

**失败返回数据：**

~~~json
{
    "errno": 1,
    "errmsg": "失败时的错误信息",
}
~~~

**成功返回数据：**

~~~json
{
    "errno": 0,
    "successmsg": "成功时的信息",
    "token": "注册成功时返回登录令牌",
    "id":"用户ID"
}
~~~


----------


### 登录

~~~
POST	/login
~~~

**传入参数：**

```json
{
    "name": "用户名",
    "password": "密码",
}
```

**失败返回数据：**

~~~json
{
    "errno": 1,
    "errmsg": "失败时的错误信息",
}
~~~

**成功返回数据：**

~~~json
{
    "errno": 0,
    "successmsg": "成功时的信息",
    "token": "登录成功时返回登录令牌",
    "id":"用户ID"
}
~~~


----------


### 个人主页

~~~
GET 	/user
~~~

**请求参数**

```json

    "name":"用户名",
    "num(为空：15条)":{
        "all":"所有的文章和评论",
        "num":"指定条数",
    }
```


**失败返回数据：**

~~~json
{
    "errno": 1,
    "errmsg": "失败时的错误信息",
}
~~~

**成功返回数据：**

```json

{
    "errno": 0,
    "successmsg": "获取成功",
    "user": {
        "name": "Xavier",
        "sex": 1,
        "group_id": 1,
        "avatar": "http://q2.qlogo.cn/headimg_dl?bs=939331534&dst_uin=939331534&src_uin=939331534&fid=939331534&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
        "level": 1,
        "vip": 0,
        "city": "北京",
        "credits": 0,
        "authentication": 0,
        "signature": 0,
        "created_at": "2018-06-14 11:23:33",
        "articles": [
            {
                "id": "文章ID",
                "title": "文章标题",
                "created_at": "2018-07-16 09:21:57",
                "hits": "点击数",
                "comments": "评论数",
                "elite":"是否加精"
            },

            "..."
        ],
        "comments": [
            {
                "id": 2,
                "article_id": 1,
                "article_title": "试试",
                "content": "这是一个回复的评论",
                "parent_id": 1,
                "to_user": "Xavier"
            },

           "..."
        ]
    }
}

```

----------

### 修改头像

~~~
POST 	/user/avatar
~~~

**传入参数：**

~~~json
{
	  "oldpassword":"旧密码",
	  "password":"新密码",
}
~~~

**设置Header**

    Authorization : Bearer 这里是token

**实例**

```javascript
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://api.2video.cn/v1/changepassword",
  "method": "POST",
  "headers": {
    "Content-Type": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMnZpZGVvLmNuXC92MVwvbG9naW4iLCJpYXQiOjE1MzEzODEwNTEsImV4cCI6MTUzMjY3NzA1MSwibmJmIjoxNTMxMzgxMDUxLCJqdGkiOiJTc2hMSzBwQWRkbTF5Umx2Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.TFRdn8BBsFRpEHvqBNQqAEhPMxycc2ZLeZbeIWfS7G4",
    "Cache-Control": "no-cache",
    "Postman-Token": "290703b8-0301-4581-9581-3dff37d4a862"
  },
  "processData": false,
  "data": "{\r\n\t  \"oldpassword\":\"123456\",\r\n\t  \"password\":\"12345678\"\r\n}"
}

$.ajax(settings).done(function (response) {
  console.log(response);
});

```


```php

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.2video.cn/v1/changepassword",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\t  \"oldpassword\":\"123456\",\r\n\t  \"password\":\"12345678\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMnZpZGVvLmNuXC92MVwvbG9naW4iLCJpYXQiOjE1MzEzODEwNTEsImV4cCI6MTUzMjY3NzA1MSwibmJmIjoxNTMxMzgxMDUxLCJqdGkiOiJTc2hMSzBwQWRkbTF5Umx2Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.TFRdn8BBsFRpEHvqBNQqAEhPMxycc2ZLeZbeIWfS7G4",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

```

**失败返回数据：**

~~~json
{
    "errno": 1,
    "errmsg": "失败时的错误信息",
}
~~~

**成功返回数据：**

```json

{
    "errno": 0,
    "successmsg": "成功信息",
    "token":"token"
}

```

----------

### 修改密码

~~~
POST 	/changepassword
~~~

**传入参数：**

~~~json
{
	  "oldpassword":"旧密码",
	  "password":"新密码",
}
~~~

**设置Header**

    Authorization : Bearer 这里是token

**实例**

```javascript
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://api.2video.cn/v1/changepassword",
  "method": "POST",
  "headers": {
    "Content-Type": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMnZpZGVvLmNuXC92MVwvbG9naW4iLCJpYXQiOjE1MzEzODEwNTEsImV4cCI6MTUzMjY3NzA1MSwibmJmIjoxNTMxMzgxMDUxLCJqdGkiOiJTc2hMSzBwQWRkbTF5Umx2Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.TFRdn8BBsFRpEHvqBNQqAEhPMxycc2ZLeZbeIWfS7G4",
    "Cache-Control": "no-cache",
    "Postman-Token": "290703b8-0301-4581-9581-3dff37d4a862"
  },
  "processData": false,
  "data": "{\r\n\t  \"oldpassword\":\"123456\",\r\n\t  \"password\":\"12345678\"\r\n}"
}

$.ajax(settings).done(function (response) {
  console.log(response);
});

```


```php

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.2video.cn/v1/changepassword",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\t  \"oldpassword\":\"123456\",\r\n\t  \"password\":\"12345678\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuMnZpZGVvLmNuXC92MVwvbG9naW4iLCJpYXQiOjE1MzEzODEwNTEsImV4cCI6MTUzMjY3NzA1MSwibmJmIjoxNTMxMzgxMDUxLCJqdGkiOiJTc2hMSzBwQWRkbTF5Umx2Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.TFRdn8BBsFRpEHvqBNQqAEhPMxycc2ZLeZbeIWfS7G4",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

```

**失败返回数据：**

~~~json
{
    "errno": 1,
    "errmsg": "失败时的错误信息",
}
~~~

**成功返回数据：**

```json

{
    "errno": 0,
    "successmsg": "成功信息",
    "token":"token"
}

```

----------

### 找回密码

1. 发送密钥到邮箱

~~~
POST 	/reset/email
~~~

**传入参数：**

~~~json
{
	  "email":"邮箱地址"
}
~~~

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
      "errno":0,
      "successmsg":"成功信息"
}
~~~


2. 重置密码

~~~
POST 	/reset/password
~~~

**传入参数：**

~~~json
{
      "email":"邮箱地址",
      "key":"找回密码所需要的密钥",
      "password":"新密码"
}
~~~

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
      "errno":0,
      "successmsg":"成功信息",
}
~~~

----------

### 关注用户

~~~
POST 	/user/follow
~~~

**传入参数：**

~~~json
{
	  "name":"被关注者ID",
}
~~~

**设置Header**

    Authorization : Bearer 这里是token

**Jquery 示例**

```javascript

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://127.0.0.1:8080/v1/user/follow",
  "method": "POST",
  "headers": {
    "Content-Type": "application/json",
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvdjFcL2xvZ2luIiwiaWF0IjoxNTMxNzg2Mzk4LCJleHAiOjE1MzMwODIzOTgsIm5iZiI6MTUzMTc4NjM5OCwianRpIjoiamhrc015WFc1UWtpV012ViIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.TABGvWNQntGiPRGLSh2gi-G_qc8ZPHUfxpfR_oIUfXc",
    "Cache-Control": "no-cache"
  },
  "processData": false,
  "data": "{\n\t\"name\":\"蓝喵丶\"\n}"
}

$.ajax(settings).done(function (response) {
  console.log(response);
});

```

**PHP 示例**

```php

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8080",
  CURLOPT_URL => "http://127.0.0.1:8080/v1/user/follow",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"name\":\"蓝喵丶\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvdjFcL2xvZ2luIiwiaWF0IjoxNTMxNzg2Mzk4LCJleHAiOjE1MzMwODIzOTgsIm5iZiI6MTUzMTc4NjM5OCwianRpIjoiamhrc015WFc1UWtpV012ViIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.TABGvWNQntGiPRGLSh2gi-G_qc8ZPHUfxpfR_oIUfXc",
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: b7b02b2b-e2ca-4bea-90c9-73e8c42aafd9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

```

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
      "errno":0,
      "successmsg":"成功信息",
}
~~~

----------

### 打卡签到

```
POST     /user/clockon
```

**签到规则**

```php

if($days < 15)
    $credits = 2;
if($days >= 365)
    $credits = 15;
if($days >= 100)
    $credits = 10;
if($days >= 30)
    $credits = 6;
if($days >= 15)
    $credits = 4;

```

**请求参数**

```
    设置请求头
    
    Authorization : Bearer 这里是token

```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息",
}
```

**成功返回:**

~~~json
{
    "errno":0,
    "successmsg":"成功信息",
    "user_id":"当前用户ID",
    "days":"当前用户连续签到天数",
    "credits":"用户当前积分"
}
~~~

----------

### 是否签到

```
POST     /user/isclockon
```

**请求参数**

```
    设置请求头
    
    Authorization : Bearer 这里是token

```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息"
}
```

**成功返回:**

~~~json
{
    "errno":0,
    "successmsg":"成功信息"
}
~~~

----------

### 签到活跃榜

```
GET     /user/clockon/rank
```


**请求参数**

```json

    "by（可选，默认最新签到）":{
        "newest":"最新签到",
        "earliest":"最早签到",
        "rank":"连续签到榜"
    }

    "num(可选 默认返回20个)":"要返回的数量"

```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息",
}
```

**成功返回:**

~~~json
{
    "errno":0,
    "successmsg":"成功信息",
    "users":{
        "name":"用户名",
        "avatar":"用户头像",
        "days":"连续签到天数",
        "updated_at":"最近一次签到时间"
    }
}
~~~

----------


## 文章

----------

### 获取置顶文章

~~~
GET 	/article/sticky
~~~


**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "articles": [
        {
            "id": 1,
            "title": "helloworld，这是一个超级牛逼的文章的文章的文章的文章的文章",
            "comments": "评论数",
            "cost": "悬赏积分",
            "elite": "是否精华",
            "finished": "是否已结",
            "column": "专栏名称",
            "created_at": "2018-07-16 14:11:16",
            "user_id": 22,
            "user_name": "蓝喵丶",
            "user_avatar": "http://q2.qlogo.cn/headimg_dl?bs=2585770368&dst_uin=2585770368&src_uin=2585770368&fid=2585770368&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
            "user_vip": 7,
            "user_authentication": "lanmiaoCN"
        }
        "..."
    ]
}
~~~

----------

### 获取分类文章

~~~
GET 	/article
~~~

**传入参数**

```json

    "by(可选：默认按时间排行)":{
        "comments":"按评论排行",
        "created_at":"按时间排行"
    },

    "type(可选：默认返回所有文章)":{
        "综合":"返回所有文章",
        "已结":"返回已解决文章",
        "未结":"返回未解决文章",
        "精华":"返回精华文章"
    },

    "column":"专栏名称(可选，默认返回全部专栏数据)",

```

**调用示例**

    http://api.2video.cn/v1/article?by=comments&type=未结&pagenum=1

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "articles": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "title": "esfasdfasdf",
                "comments": 321,
                "cost": 2,
                "elite": 1,
                "finished": 0,
                "column": "分享",
                "created_at": "2018-07-17 16:11:13",
                "user_id": 22,
                "user_name": "蓝喵丶",
                "user_avatar": "http://q2.qlogo.cn/headimg_dl?bs=2585770368&dst_uin=2585770368&src_uin=2585770368&fid=2585770368&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
                "user_vip": 7,
                "user_authentication": "lanmiaoCN"
            },
            "..."
        ],
        "first_page_url": "http://127.0.0.1:8080/v1/article?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8080/v1/article?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8080/v1/article",
        "per_page": 30,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    }
}
~~~

----------

### 获取文章专栏

~~~
GET 	/column
~~~

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "column": [
        {
            "id": 1,
            "name": "分享",
            "group_id": "属于群组ID",
            "disabled": "是否禁用",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "提问",
            "group_id": "属于群组ID",
            "disabled": "是否禁用",
            "created_at": null,
            "updated_at": null
        },

        "..."
    ]
}
~~~

----------

### 获取本周热议

**请求地址**

~~~
GET 	/article/week
~~~

**请求参数**

```json

    "num":"要获取的条数（默认 15）"

```

**失败返回:**

~~~json
{
      "errno":1,
      "errmsg":"失败信息",
}
~~~

**成功返回:**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "articles": [
        {
            "id": "文章ID",
            "title": "文章标题",
            "comments": "文章评论数",
        },

        "..."
    ]
}
~~~

----------

### 获取回帖周榜

```
GET /week/comment
```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息",
}
```

**成功返回**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "users": [
        {
            "name": "Xavier",
            "avatar": "http://q2.qlogo.cn/headimg_dl?bs=939331534&dst_uin=939331534&src_uin=939331534&fid=939331534&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
            "comments": 9
        },
        {
            "name": "蓝喵丶",
            "avatar": "http://q2.qlogo.cn/headimg_dl?bs=2585770368&dst_uin=2585770368&src_uin=2585770368&fid=2585770368&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
            "comments": 1
        }
        "..."
    ]
}
~~~

----------

### 获取文章内容

```
GET /article/content
```

**参数**

```json

    "id":"文章ID"

```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息",
}
```

**成功返回**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
    "article": {
        "id": 1,
        "title": "helloworld，这是一个超级牛逼的文章的文章的文章的文章的文章",
        "content": "<h1>helloworld，这是一个超级牛逼的文章</h1>",
        "column": "提问",
        "tag": "PHP",
        "cost": "文章悬赏值",
        "hits": "文章点击数",
        "comments": "文章评论数",
        "stick": "文章是否置顶",
        "elite": "文章是否精华",
        "finished": "文章是否已结",
        "comment_status": "文章是否禁止评论",
        "last_comments": "文章最后评论时间",
        "created_at": "2018-07-16 14:11:16"
    },
    "user": {
        "name": "蓝喵丶",
        "avatar": "http://q2.qlogo.cn/headimg_dl?bs=2585770368&dst_uin=2585770368&src_uin=2585770368&fid=2585770368&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
        "vip": 7,
        "authentication": "lanmiaoCN",
        "group_id": 3
    },
    "comments": [
        {
            "id": 1,
            "content": "hello",
            "parent_id": "父级评论ID",
            "to_user": "指定回复用户",
            "adopted": "是否被采纳",
            "likes":"评论点赞数",
            "user_name": "蓝喵丶",
            "user_avatar": "http://q2.qlogo.cn/headimg_dl?bs=2585770368&dst_uin=2585770368&src_uin=2585770368&fid=2585770368&spec=100&url_enc=0&referer=bu_interface&term_type=PC",
            "user_vip": 7,
            "users_authentication": "lanmiaoCN",
            "user_group_id": 3
        },
        
       "..."
    ]
}
~~~


----------

### 文章加精置顶删除

```
POST /article/manage
```

**Header**

    Authorization : Bearer 这里是token



**参数**

```json

    "id":"文章id",
    "action":{
        "置顶":"进行置顶操作",
        "加精":"进行加精操作",
        "删除":"进行删除操作",
    }

```

**失败返回**

```json
{
      "errno":1,
      "errmsg":"失败信息",
}
```

**成功返回**

~~~json
{
    "errno": 0,
    "successmsg": "获取成功",
}
~~~

----------

## 评论

----------

### 评论点赞删除采纳

**请求地址**

    POST /comment/manage

**请求参数**

```json

    "id":"文章ID",

    "action":{

        "like":"点赞",
        "del":"删除",
        "adopt":"采纳"
    }

```


**失败返回**

```json
{
     "errno":1,
     "errmsg":"错误信息"
}
```



**成功返回**

```json
{
     "errno":0,
     "successmsg":"成功信息"
}
```


## 上传

-------

### 图片上传

**请求地址**

    POST /upload/img

**成功返回**

```json
{
    "errno": 0,
    "data": [
        "图片1地址",
        "图片2地址",
    ]
}
```