# simple_guestbook
主要目的是为了学习mvc框架，熟悉一些开发的流程

# 功能介绍
## 两个个主要控制器
- index
- user

## 控制器中的方法/页面
### index
- index (主页面，用于显示全部留言)
- page (留言详情页）
- add (新增留言)
- save (添加留言功能页)
- del (删除留言功能页)
- commentadd (添加评论功能页)
- commentdel (删除评论功能页)

### user
- index (个人信息页)
- login (登录页面)
- logout (登出页面)
- register (注册页面)
- uploadavatar (上传头像功能页面)

# 后续
## 一些功能特色
- sql查询使用pdo的预编译形式，防止sql注入
- 权限分离，在进行操作前会进行权限认证
- 自编写xss_escape对注册的变量进行递归html编码
- 对上传的文件进行重命名，并对上传类型进行限制

## 学到的一些东西
- 文件上传处理
- sql预编译
- 权限认证

## 总结
算是对mvc框架有了一定的认知  
从框架到实现，算是真正的从零自己动手写了一个php的站（虽然前端页面丑的不想话说）  
对文件的处理，以及数据的查询动手操作之后也有更深入的理解  

## 后期学习计划
开始代码审计吧~
