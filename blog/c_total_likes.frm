TYPE=VIEW
query=select count(`blog`.`comments_likes`.`id`) AS `like_num`,`blog`.`comments_likes`.`user_id` AS `user_id`,`blog`.`comments`.`id` AS `post_id` from (`blog`.`comments_likes` left join `blog`.`comments` on(`blog`.`comments_likes`.`post_id` = `blog`.`comments`.`id`)) group by `blog`.`comments`.`id`
md5=7f48537e3fb870a058692567335d106e
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2025-04-29 23:51:54
create-version=2
source=SELECT COUNT(comments_likes.id) as like_num,comments_likes.user_id as user_id,comments.id as post_id\nFROM comments \nRIGHT JOIN comments_likes\nON comments_likes.post_id = comments.id\nGROUP BY comments.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select count(`blog`.`comments_likes`.`id`) AS `like_num`,`blog`.`comments_likes`.`user_id` AS `user_id`,`blog`.`comments`.`id` AS `post_id` from (`blog`.`comments_likes` left join `blog`.`comments` on(`blog`.`comments_likes`.`post_id` = `blog`.`comments`.`id`)) group by `blog`.`comments`.`id`
mariadb-version=100203
