TYPE=VIEW
query=select `blog`.`users`.`id` AS `user_id`,`blog`.`users`.`name` AS `name`,`blog`.`users`.`img` AS `img`,`blog`.`comments`.`post_id` AS `post_id`,`blog`.`comments`.`content` AS `content`,`blog`.`comments`.`comment_at` AS `comment_at`,`blog`.`comments`.`id` AS `comment_id` from (`blog`.`users` left join `blog`.`comments` on(`blog`.`users`.`id` = `blog`.`comments`.`user_id`))
md5=0c98464fdf2e462dbdd71a12d4258610
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-27 12:15:07
create-version=2
source=SELECT users.id as user_id, users.name,users.img,comments.post_id as post_id, comments.content,comments.comment_at, comments.id as comment_id\nFROM comments\nRIGHT JOIN users\nON users.id = comments.user_id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `blog`.`users`.`id` AS `user_id`,`blog`.`users`.`name` AS `name`,`blog`.`users`.`img` AS `img`,`blog`.`comments`.`post_id` AS `post_id`,`blog`.`comments`.`content` AS `content`,`blog`.`comments`.`comment_at` AS `comment_at`,`blog`.`comments`.`id` AS `comment_id` from (`blog`.`users` left join `blog`.`comments` on(`blog`.`users`.`id` = `blog`.`comments`.`user_id`))
mariadb-version=100203
