```json

"bugub":{
	"users":{
        "id":"用户ID",
        "name":"用户名",
        "email":"用户邮箱",
        "password":"用户密码",
        "avatar":"用户头像URL地址",
        "phone":"用户手机",
        "level":"用户等级",
        "vip":"用户VIP等级",
        "credits":"用户积分",
        "realName":"用户真实姓名",
        "IDCard":"用户身份证",
        "sex":"用户性别",
        "signature":"用户签名",
        "job":"用户职业",
        "intro":"用户自我介绍",
        "city":"用户目前居住城市",
        "hometown":"用户家乡城市",
        "group_id":"用户所在群组ID",
        "authentication":"用户认证信息",
        "ip":"上次登录的IP",
        "remember_token":"用户token",
        "token_time":"token过期时间",
        "created_at":"创建时间",
        "updated_at":"更新时间",
    },




    "user_groups":{
        "id":"群组id",
        "name":"群组名称",
        "created_at":"创建时间",
        "updated_at":"更新时间",
    },


    "articles":{

        "id":"文章id",
        "user_id":"发表文章的用户ID",
        "title":"文章标题",
        "content":"文章内容",
        "column":"文章所在专栏",
        "tag":"文章所含标签",
        "hits":"点击数",
        "cost":"文章悬赏多少积分",
        "comments":"评论数",
        "stick":"是否置顶",
        "elite":"是否精华",
        "comment_status":"是否禁止评论",
        "last_comments":"最后评论时间",
        "created_at":"创建时间",
        "updated_at":"更新时间",

    },


    "column":{
        "id":"专栏ID",
        "name":"专栏名称",
        "group_id":"指定用户组权限",
        "created_at":"创建时间",
        "updated_at":"更新时间"
    },



    "comments":{
            "id":"评论id",
            "user_id":"发表评论的用户ID",
            "article_id":"文章ID",
            "content":"评论内容",
            "parent_id":"父级评论id",
            "to_user":"评论目标用户名",
            "adopted":"是否被采纳",
            "likes":"评论点赞数",
            "created_at":"创建时间",
            "updated_at":"更新时间"
        },


    "follow":{
        "user_id":"用户ID",
        "follw_id":"被关注者ID"
    },


    "clockons":{
        "id":"用户ID",
        "days":"连续签到天数",
        "updated_at":"最新签到时间",
        "created_at":"第一次签到时间"
    },



}


```

