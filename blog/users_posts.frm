TYPE=VIEW
query=select `blog`.`users`.`id` AS `user_id`,`blog`.`users`.`name` AS `name`,`blog`.`users`.`img` AS `img`,`blog`.`posts`.`id` AS `post_id`,`blog`.`posts`.`description` AS `description`,`blog`.`posts`.`post_img` AS `post_img`,`blog`.`posts`.`post_at` AS `post_at` from (`blog`.`users` join `blog`.`posts` on(`blog`.`users`.`id` = `blog`.`posts`.`user_id`))
md5=dea96aba05816dd629dba8f99daf55a7
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-26 22:19:55
create-version=2
source=SELECT users.id as user_id, users.name,users.img,posts.id as post_id,posts.description,posts.post_img,posts.post_at\nFROM users\nJOIN posts\nON users.id = posts.user_id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `blog`.`users`.`id` AS `user_id`,`blog`.`users`.`name` AS `name`,`blog`.`users`.`img` AS `img`,`blog`.`posts`.`id` AS `post_id`,`blog`.`posts`.`description` AS `description`,`blog`.`posts`.`post_img` AS `post_img`,`blog`.`posts`.`post_at` AS `post_at` from (`blog`.`users` join `blog`.`posts` on(`blog`.`users`.`id` = `blog`.`posts`.`user_id`))
mariadb-version=100203
